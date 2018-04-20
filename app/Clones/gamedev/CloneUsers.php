<?php
namespace App\Clones\gamedev;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneUsers
{
    public static $tableName = 'users';

    public function exec()
    {
        $chunkSize      = 50;
        $connection     = 'gamedev';
        $database       = 'gamedev';
        $tableName      = self::$tableName;
        $records        = [
                [
                    'id' => '1',
                    'is_admin' => '1',
                    'name' => 'Jeremy',
                    'email' => 'jrseducate@gmail.com',
                    'password' => '$2y$10$3kPSFTYgt6FRiYv1EGO7BuQzEpOjq2GERW.mZtnaiIvBcrpPPatZK',
                    'remember_token' => '235sJ8VCTLVIYDA6HKZem4TfqY0PKBtJFzQEDEOiYyTqOhcTQDNIOen0b9Ku',
                    'created_at' => '2018-02-17 22:44:19',
                    'updated_at' => '2018-02-17 22:44:19'
                ]
            ];
        $columns        = ['id','is_admin','name','email','password','remember_token','created_at','updated_at'];

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