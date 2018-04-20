<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneInnodbIndexStats
{
    public static $tableName = 'innodb_index_stats';

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
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '0',
                    'sample_size' => '1',
                    'stat_description' => 'id'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'password_resets_email_index',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '0',
                    'sample_size' => '1',
                    'stat_description' => 'email'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'password_resets_email_index',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'n_diff_pfx02',
                    'stat_value' => '0',
                    'sample_size' => '1',
                    'stat_description' => 'email,id'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'password_resets_email_index',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'password_resets',
                    'index_name' => 'password_resets_email_index',
                    'last_update' => '2018-02-18 11:38:28',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '1',
                    'sample_size' => '1',
                    'stat_description' => 'id'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'users_email_unique',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '1',
                    'sample_size' => '1',
                    'stat_description' => 'email'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'users_email_unique',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'gamedev',
                    'table_name' => 'users',
                    'index_name' => 'users_email_unique',
                    'last_update' => '2018-04-19 19:59:27',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ],[
                    'database_name' => 'mysql',
                    'table_name' => 'gtid_executed',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:49',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '0',
                    'sample_size' => '1',
                    'stat_description' => 'source_uuid'
                ],[
                    'database_name' => 'mysql',
                    'table_name' => 'gtid_executed',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:49',
                    'stat_name' => 'n_diff_pfx02',
                    'stat_value' => '0',
                    'sample_size' => '1',
                    'stat_description' => 'source_uuid,interval_start'
                ],[
                    'database_name' => 'mysql',
                    'table_name' => 'gtid_executed',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:49',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'mysql',
                    'table_name' => 'gtid_executed',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:49',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ],[
                    'database_name' => 'sys',
                    'table_name' => 'sys_config',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:50',
                    'stat_name' => 'n_diff_pfx01',
                    'stat_value' => '6',
                    'sample_size' => '1',
                    'stat_description' => 'variable'
                ],[
                    'database_name' => 'sys',
                    'table_name' => 'sys_config',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:50',
                    'stat_name' => 'n_leaf_pages',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of leaf pages in the index'
                ],[
                    'database_name' => 'sys',
                    'table_name' => 'sys_config',
                    'index_name' => 'PRIMARY',
                    'last_update' => '2018-02-13 21:59:50',
                    'stat_name' => 'size',
                    'stat_value' => '1',
                    'sample_size' => '',
                    'stat_description' => 'Number of pages in the index'
                ]
            ];
        $columns            = ['database_name','table_name','index_name','last_update','stat_name','stat_value','sample_size','stat_description'];
        $nullableColumns    = collect(['sample_size']);

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