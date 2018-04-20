<?php

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

class DBCloneHelper
{
    public static $progressBarFormat = ' %current%/%max% [%bar%] %message% %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%';

    public static function commit(ClosureCommand $command, $connection)
    {
        $database = \DB::connection($connection)->getDatabaseName();
        $classNames = [];

        $tabs = [
            1 => str_repeat(' ', 4),
            2 => str_repeat(' ', 8),
            3 => str_repeat(' ', 12),
            4 => str_repeat(' ', 16),
            5 => str_repeat(' ', 20),
        ];

        $tables = collect(DB::select("SELECT `TABLE_NAME` FROM `information_schema`.`tables` t WHERE t.`table_schema` = '$database';"))->pluck('TABLE_NAME')->all();
        $progressBar = new ProgressBar($command->getOutput(), count($tables));
        $progressBar->setFormat(self::$progressBarFormat);
        foreach($tables as $table)
        {
            sleep(1);
            $progressBar->setMessage("Committing `$table`");
            $progressBar->display();
            $records     = DB::select("SELECT * FROM `$database`.`$table`");
            if(!empty($records))
            {
                $records     = '[' . "\r\n$tabs[4]" . implode(',', array_map(function($record) use($tabs)
                    {
                        $record = (array) $record;
                        return '[' . "\r\n$tabs[5]" . implode(",\r\n$tabs[5]", array_map(function($value, $key)
                            {
                                return "'$key' => '$value'";
                            }, $record, array_keys($record))) . "\r\n$tabs[4]" . ']';
                    }, $records)) . "\r\n$tabs[3]" . ']';
            }
            else
            {
                $records = "[]";
            }

            $columns  = collect(DB::select("SELECT `COLUMN_NAME` FROM `information_schema`.`columns` c WHERE c.`table_schema` = '$database' AND c.`table_name` = '$table' ORDER BY c.`ordinal_position`;"))->pluck('COLUMN_NAME')->all();
            $columns  = "['" . implode("','", $columns) . "']";

            $template = Storage::get('templates' . DIRECTORY_SEPARATOR . 'dbclone.php');

            $fileName = $className = "Clone" . str_replace(' ', '', ucwords(str_replace('_', ' ', $table)));
            $fileName .= '.php';

            $namespace = "App\\Clones\\$database";

            $template = str_replace('__NameSpace__', $namespace, $template);
            $template = str_replace('__ClassName__', $className, $template);
            $template = str_replace('__Connection__', "'$connection'", $template);
            $template = str_replace('__Database__', "'$database'", $template);
            $template = str_replace('__TableName__', "'$table'", $template);
            $template = str_replace('__Records__', $records, $template);
            $template = str_replace('__Columns__', $columns, $template);

            Storage::disk('app')->put("Clones/$database/$fileName", $template);

            $classNames[] = $namespace . '\\' . $className;
            $progressBar->advance(1);
        }
        $progressBar->finish();

        $classNames = json_encode($classNames);

        Storage::put("$database/CloneClasses.php", "$classNames");
    }

    public static function update(ClosureCommand $command, $connection)
    {
        $database = \DB::connection($connection)->getDatabaseName();
        $clones = json_decode(Storage::get("$database/CloneClasses.php"));

        $progressBar = new ProgressBar($command->getOutput(), count($clones));
        $progressBar->setFormat(self::$progressBarFormat);

        foreach($clones as $clone)
        {
            sleep(1);
            $clone = new $clone();
            $progressBar->setMessage("Insert or Update `{$clone::$tableName}`");
            $progressBar->display();
            $clone->exec();
            $progressBar->advance(1);
        }
        $progressBar->finish();
    }
}