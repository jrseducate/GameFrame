<?php
namespace App\Clones\gamedev;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class ClonePasswordResets
{
    public static $tableName = 'password_resets';

    public function exec()
    {
        $chunkSize      = 50;
        $connection     = 'gamedev';
        $database       = 'gamedev';
        $tableName      = self::$tableName;
        $records        = [];
        $columns        = ['id','email','token','created_at'];

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
            $values = implode("'),('", array_map(function($record)
            {
                return implode("','", $record);
            }, $recordChunk));

            $insertQuery = "INSERT INTO `$database`.`$tableName` ($columnList) VALUES ('$values') ON DUPLICATE KEY UPDATE $updateDuplicates";

            DB::connection($connection)->statement($insertQuery);
        }
    }
}