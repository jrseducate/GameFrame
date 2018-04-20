<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneMigrations
{
    public static $tableName = 'migrations';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'id' => '12',
                    'migration' => '2018_02_16_022354_create_gamedev_db',
                    'batch' => '1'
                ],[
                    'id' => '17',
                    'migration' => '2018_02_16_022400_create_users_table',
                    'batch' => '2'
                ],[
                    'id' => '18',
                    'migration' => '2018_02_16_022500_create_password_resets_table',
                    'batch' => '2'
                ],[
                    'id' => '19',
                    'migration' => '2018_02_17_164915_add_is_admin_to_users_table',
                    'batch' => '2'
                ],[
                    'id' => '20',
                    'migration' => '2018_02_17_223226_add_id_to_password_resets_table',
                    'batch' => '2'
                ]
            ];
        $columns            = ['id','migration','batch'];
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