<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneDb
{
    public static $tableName = 'db';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'Host' => 'localhost',
                    'Db' => 'performance_schema',
                    'User' => 'mysql.session',
                    'Select_priv' => 'Y',
                    'Insert_priv' => 'N',
                    'Update_priv' => 'N',
                    'Delete_priv' => 'N',
                    'Create_priv' => 'N',
                    'Drop_priv' => 'N',
                    'Grant_priv' => 'N',
                    'References_priv' => 'N',
                    'Index_priv' => 'N',
                    'Alter_priv' => 'N',
                    'Create_tmp_table_priv' => 'N',
                    'Lock_tables_priv' => 'N',
                    'Create_view_priv' => 'N',
                    'Show_view_priv' => 'N',
                    'Create_routine_priv' => 'N',
                    'Alter_routine_priv' => 'N',
                    'Execute_priv' => 'N',
                    'Event_priv' => 'N',
                    'Trigger_priv' => 'N'
                ],[
                    'Host' => 'localhost',
                    'Db' => 'sys',
                    'User' => 'mysql.sys',
                    'Select_priv' => 'N',
                    'Insert_priv' => 'N',
                    'Update_priv' => 'N',
                    'Delete_priv' => 'N',
                    'Create_priv' => 'N',
                    'Drop_priv' => 'N',
                    'Grant_priv' => 'N',
                    'References_priv' => 'N',
                    'Index_priv' => 'N',
                    'Alter_priv' => 'N',
                    'Create_tmp_table_priv' => 'N',
                    'Lock_tables_priv' => 'N',
                    'Create_view_priv' => 'N',
                    'Show_view_priv' => 'N',
                    'Create_routine_priv' => 'N',
                    'Alter_routine_priv' => 'N',
                    'Execute_priv' => 'N',
                    'Event_priv' => 'N',
                    'Trigger_priv' => 'Y'
                ]
            ];
        $columns            = ['Host','Db','User','Select_priv','Insert_priv','Update_priv','Delete_priv','Create_priv','Drop_priv','Grant_priv','References_priv','Index_priv','Alter_priv','Create_tmp_table_priv','Lock_tables_priv','Create_view_priv','Show_view_priv','Create_routine_priv','Alter_routine_priv','Execute_priv','Event_priv','Trigger_priv'];
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