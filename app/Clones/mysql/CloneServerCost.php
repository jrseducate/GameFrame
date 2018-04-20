<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneServerCost
{
    public static $tableName = 'server_cost';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'cost_name' => 'disk_temptable_create_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ],[
                    'cost_name' => 'disk_temptable_row_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ],[
                    'cost_name' => 'key_compare_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ],[
                    'cost_name' => 'memory_temptable_create_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ],[
                    'cost_name' => 'memory_temptable_row_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ],[
                    'cost_name' => 'row_evaluate_cost',
                    'cost_value' => '',
                    'last_update' => '2018-02-13 21:59:49',
                    'comment' => ''
                ]
            ];
        $columns            = ['cost_name','cost_value','last_update','comment'];
        $nullableColumns    = collect(['cost_value','comment']);

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