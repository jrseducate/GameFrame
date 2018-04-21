<?php

namespace App\Handlers;

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/19/2018
 * Time: 9:57 PM
 */

class DBCloneHandler
{
    public static $progressBarFormat = ' %current%/%max% [%bar%] %message% %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%';

    public static function commit(ClosureCommand $command, $connection)
    {
        $database = \DB::connection($connection)->getDatabaseName();
        $dbClone = [];

        $tables = collect(DB::select("SELECT `TABLE_NAME` FROM `information_schema`.`tables` t WHERE t.`table_schema` = '$database';"))->pluck('TABLE_NAME')->all();
        $excludedTables = config("dbclone.excluded-tables.$connection");
        if(!empty($excludedTables))
        {
            $tables = array_filter($tables, function($table) use(&$excludedTables)
            {
                return collect($excludedTables)->search($table) === false;
            });
        }

        $progressBar = new ProgressBar($command->getOutput(), count($tables));
        $progressBar->setFormat(self::$progressBarFormat);
        foreach($tables as $table)
        {
            $progressBar->setMessage("Committing `$table`");
            $progressBar->display();

            $records = DB::select("SELECT * FROM `$database`.`$table`");

            if(!empty($records))
            {
                $columns            = collect(DB::select("SELECT `COLUMN_NAME` FROM `information_schema`.`columns` c WHERE c.`table_schema` = '$database' AND c.`table_name` = '$table' ORDER BY c.`ordinal_position`;"))->pluck('COLUMN_NAME')->all();
                $nullableColumns    = collect(DB::select("SELECT `COLUMN_NAME` FROM `information_schema`.`columns` c WHERE c.`table_schema` = '$database' AND c.`table_name` = '$table' AND c.`IS_NULLABLE` = 'YES';"))->pluck('COLUMN_NAME')->all();

                $dbClone = [
                    'connection' => $connection,
                    'database'   => $database,
                    'table'      => $table,
                    'nullable'   => $nullableColumns,
                    'columns'    => $columns,
                    'records'    => $records,
                ];
                $dbClone = toString($dbClone);

                Storage::disk('app')->put("CloneClasses/$database/$table.php", "<?php return $dbClone;");
            }

            $progressBar->advance(1);
        }
        $progressBar->finish();

//        Storage::disk('app')->put("CloneClasses/$database.php", "<?php return $dbClone;");
    }

    public static function update(ClosureCommand $command, $connection)
    {
        $database = \DB::connection($connection)->getDatabaseName();
        $clones = Storage::disk('app')->files("CloneClasses/$database");

        if(!empty($clones))
        {
            $progressBar = new ProgressBar($command->getOutput(), count($clones));
            $progressBar->setFormat(self::$progressBarFormat);

            foreach($clones as $clone)
            {
                $clone = array_last(preg_split('~[\\\\/]~', $clone));
                $clone = require "App\\CloneClasses\\$database\\$clone";
                $progressBar->setMessage("Insert or Update `{$clone['table']}`");
                $progressBar->display();
                self::exec($clone);
                $progressBar->advance(1);
            }

            $progressBar->finish();
        }
        else
        {
            $command->warn('No CloneClasses found in ' . "'app/CloneClasses/$database'");
        }
    }

    public static function exec($dbClone)
    {
        $chunkSize      = 50;
        $connection     = $dbClone['connection'];
        $database       = $dbClone['database'];
        $tableName      = $dbClone['table'];
        $records        = $dbClone['records'];
        $columns        = $dbClone['columns'];
        $nullable       = collect($dbClone['nullable']);

        $columnList         = '`' . implode('`,`', $columns) . '`';
        $updateDuplicates   = '';

        foreach($columns as $column)
        {
            if(!empty($updateDuplicates))
            {
                $updateDuplicates .= ',';
            }
            $updateDuplicates .= "`$column` = VALUES(`$column`)";
        }

        $recordChunks   = array_chunk($records, $chunkSize);

        foreach($recordChunks as $recordChunk)
        {
            try
            {
                $values = implode("),(", array_map(function($record) use(&$nullable)
                {
                    $record = collect($record)->map(function($value, $column) use(&$nullable)
                    {
                        return !empty($value) ? "'$value'" : ($nullable->search($column) !== false ? 'NULL' : "0");
                    })->all();
                    return implode(",", $record);
                }, $recordChunk));

                $insertQuery = "INSERT INTO `$database`.`$tableName` ($columnList) VALUES ($values) ON DUPLICATE KEY UPDATE $updateDuplicates";

                DB::connection($connection)->statement($insertQuery);
            }
            catch(\Exception $exception)
            {
                \Log::warning($exception->getMessage());
                \Log::warning($exception->getTraceAsString());
                dump('Error in ' . __FILE__ . '::exec()');
                dump($exception->getMessage());
            }
        }
    }
}