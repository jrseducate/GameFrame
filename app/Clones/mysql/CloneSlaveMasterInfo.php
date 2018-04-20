<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneSlaveMasterInfo
{
    public static $tableName = 'slave_master_info';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [];
        $columns            = ['Number_of_lines','Master_log_name','Master_log_pos','Host','User_name','User_password','Port','Connect_retry','Enabled_ssl','Ssl_ca','Ssl_capath','Ssl_cert','Ssl_cipher','Ssl_key','Ssl_verify_server_cert','Heartbeat','Bind','Ignored_server_ids','Uuid','Retry_count','Ssl_crl','Ssl_crlpath','Enabled_auto_position','Channel_name','Tls_version'];
        $nullableColumns    = collect(['Host','User_name','User_password','Ssl_ca','Ssl_capath','Ssl_cert','Ssl_cipher','Ssl_key','Bind','Ignored_server_ids','Uuid','Ssl_crl','Ssl_crlpath','Tls_version']);

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