<?php

namespace App\Handlers;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    public static $delay = null;
    public static $progressBarFormat = ' %current%/%max% [%bar%] %message% %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%';

    public static function getDelay()
    {
        return self::$delay = self::$delay ?: secondsToMicroSeconds(0.125);
    }

    public static function commit(ClosureCommand $command, $connection)
    {
        $database = DB::connection($connection)->getDatabaseName();

        $emptyTables = collect(DB::select("SELECT `TABLE_NAME` FROM `information_schema`.`tables` t WHERE t.`table_schema` = '$database' AND t.`table_rows` IS NULL OR t.`table_rows` <= 0;"))->pluck('TABLE_NAME')->all();
        $tables = collect(DB::select("SELECT `TABLE_NAME` FROM `information_schema`.`tables` t WHERE t.`table_schema` = '$database' AND t.`table_rows` IS NOT NULL AND t.`table_rows` > 0;"))->pluck('TABLE_NAME')->all();
        $excludedTables = config("dbclone.excluded-tables.$connection");

        if(!empty($emptyTables))
        {
            $command->info("Empty tables: " . implode(', ', $emptyTables));
        }

        if(!empty($excludedTables))
        {
            $command->info("Excluded tables: " . implode(', ', $excludedTables));

            $tables = array_filter($tables, function($table) use(&$excludedTables)
            {
                return collect($excludedTables)->search($table) === false;
            });
        }

        if(empty($tables))
        {
            $command->warn("No tables to commit in database '$database'");
            return;
        }

        $command->info("Tables to commit: " . implode(', ', $tables));
        if(!$command->confirm("Run dbo:commit on connection '$connection'?"))
        {
            return;
        }

        $progressBar = new ProgressBar($command->getOutput(), count($tables));
        $progressBar->setFormat(self::$progressBarFormat);
        foreach($tables as $table)
        {
            $progressBar->setMessage("Committing `$table`");

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
                $dbClone = toString($dbClone, function($value)
                {
                    if(!is_numeric($value) && is_string($value))
                    {
                        $value = str_replace("\\", "\\\\\\\\", $value);
                        $value = str_replace("''", "'", $value);
                        $value = str_replace("'", "\\'\\'", $value);
                    }

                    return $value;
                });

                Storage::disk('app')->put("CloneClasses/$database/$table.php", "<?php return $dbClone;");
            }

            usleep(self::getDelay());
            $progressBar->advance(1);
        }
        $progressBar->finish();
    }

    public static function update(ClosureCommand $command, $connection)
    {
        $database = DB::connection($connection)->getDatabaseName();
        $clones = array_map(function($clone)
        {
            return array_last(preg_split('~[\\\\/]~', $clone));
        }, Storage::disk('app')->files("CloneClasses/$database"));

        if(empty($clones))
        {
            $command->warn('No CloneClasses found in ' . "'app/CloneClasses/$database'");
            return;
        }

        $command->info("CloneClasses found: " . implode(', ', $clones));
        if(!$command->confirm("Run dbo:update on connection '$connection'?"))
        {
            return;
        }

        $progressBar = new ProgressBar($command->getOutput(), count($clones));
        $progressBar->setFormat(self::$progressBarFormat);

        foreach($clones as $clone)
        {
            try
            {
                $clone = require "App\\CloneClasses\\$database\\$clone";
            }
            catch(\Exception $exception)
            {
                Log::warning($exception->getMessage());
                Log::warning($exception->getTraceAsString());
                dump('Error in ' . __FILE__ . '::exec()');
                dump($exception->getMessage());
                continue;
            }
            $progressBar->setMessage("Insert or Update `{$clone['table']}`");
            self::exec($command, $clone);
            usleep(self::getDelay());
            $progressBar->advance(1);
        }

        $progressBar->finish();
    }

    public static function clear(ClosureCommand $command, $connection)
    {
        $database = DB::connection($connection)->getDatabaseName();
        $files = Storage::disk('app')->files("CloneClasses/$database");

        if(empty($files))
        {
            $command->warn("No files found in 'app/CloneClasses/$database'");
            return;
        }

        $clones = array_map(function($clone)
        {
            return array_last(preg_split('~[\\\\/]~', $clone));
        }, $files);

        $command->warn("CloneClasses pending delete: " . implode(', ', $clones));
        if(!$command->confirm("Run dbo:clear on connection '$connection'?"))
        {
            return;
        }

        Storage::disk('app')->delete($files);

        $command->info("CloneClasses cleared in connection '$connection'");
    }

    public static function exec(ClosureCommand $command, $dbClone)
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

        $recordChunks   = array_chunk($records, $chunkSize, true);

        foreach($recordChunks as $key => $recordChunk)
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
            catch(QueryException $exception)
            {
                $exceptionClass = array_last(preg_split('~[\\\\/]~', get_class($exception)));
                $exceptionMessage = toString($exception->errorInfo);
                $command->warn("Failed to parse CloneClasses/$connection/$tableName.php:['records'][$key], $exceptionClass => $exceptionMessage");
                Log::warning("Failed to parse CloneClasses/$connection/$tableName.php:['records'][$key], $exceptionClass => $exceptionMessage");
            }
        }
    }
}