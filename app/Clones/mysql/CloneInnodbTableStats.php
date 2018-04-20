<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneInnodbTableStats
{
    public static $tableName = 'innodb_table_stats';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'last_update' => '2018-02-18 11:38:28',
                    'n_rows' => '0',
                    'clustered_index_size' => '1',
                    'sum_of_other_index_sizes' => '1'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'last_update' => '2018-04-19 19:59:27',
                    'n_rows' => '1',
                    'clustered_index_size' => '1',
                    'sum_of_other_index_sizes' => '1'
                ],[
                    'database_name' => 'mysql',
                    'table_name' => 'gtid_executed',
                    'last_update' => '2018-02-13 21:59:49',
                    'n_rows' => '0',
                    'clustered_index_size' => '1',
                    'sum_of_other_index_sizes' => '0'
                ],[
                    'database_name' => 'sys',
                    'table_name' => 'sys_config',
                    'last_update' => '2018-02-13 21:59:50',
                    'n_rows' => '6',
                    'clustered_index_size' => '1',
                    'sum_of_other_index_sizes' => '0'
                ]
            ];
        $columns            = ['database_name','table_name','last_update','n_rows','clustered_index_size','sum_of_other_index_sizes'];
        $nullableColumns    = collect([]);

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
                $values = implode("),(", array_map(function($record) use(&$nullableColumns)
                {
                    $record = collect($record)->map(function($value, $column) use(&$nullableColumns)
                    {
                        return !empty($value) ? "'$value'" : ($nullableColumns->search($column) !== false ? 'NULL' : "0");
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