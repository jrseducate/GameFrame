<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneHelpCategory
{
    public static $tableName = 'help_category';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'help_category_id' => '1',
                    'name' => 'Geographic',
                    'parent_category_id' => '',
                    'url' => '0'
                ],[
                    'help_category_id' => '2',
                    'name' => 'Polygon properties',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '3',
                    'name' => 'Numeric Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '4',
                    'name' => 'WKT',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '5',
                    'name' => 'Plugins',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '6',
                    'name' => 'Control flow functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '7',
                    'name' => 'MBR',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '8',
                    'name' => 'Transactions',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '9',
                    'name' => 'Help Metadata',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '10',
                    'name' => 'Account Management',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '11',
                    'name' => 'Point properties',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '12',
                    'name' => 'Encryption Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '13',
                    'name' => 'LineString properties',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '14',
                    'name' => 'Miscellaneous Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '15',
                    'name' => 'Logical operators',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '16',
                    'name' => 'Functions and Modifiers for Use with GROUP BY',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '17',
                    'name' => 'Information Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '18',
                    'name' => 'Storage Engines',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '19',
                    'name' => 'Bit Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '20',
                    'name' => 'Comparison operators',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '21',
                    'name' => 'Table Maintenance',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '22',
                    'name' => 'User-Defined Functions',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '23',
                    'name' => 'Data Types',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '24',
                    'name' => 'Compound Statements',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '25',
                    'name' => 'Geometry constructors',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '26',
                    'name' => 'GeometryCollection properties',
                    'parent_category_id' => '1',
                    'url' => '0'
                ],[
                    'help_category_id' => '27',
                    'name' => 'Administration',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '28',
                    'name' => 'Data Manipulation',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '29',
                    'name' => 'Utility',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '30',
                    'name' => 'Language Structure',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '31',
                    'name' => 'Geometry relations',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '32',
                    'name' => 'Date and Time Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '33',
                    'name' => 'WKB',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '34',
                    'name' => 'Procedures',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '35',
                    'name' => 'Geographic Features',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '36',
                    'name' => 'Contents',
                    'parent_category_id' => '',
                    'url' => '0'
                ],[
                    'help_category_id' => '37',
                    'name' => 'Geometry properties',
                    'parent_category_id' => '35',
                    'url' => '0'
                ],[
                    'help_category_id' => '38',
                    'name' => 'String Functions',
                    'parent_category_id' => '39',
                    'url' => '0'
                ],[
                    'help_category_id' => '39',
                    'name' => 'Functions',
                    'parent_category_id' => '36',
                    'url' => '0'
                ],[
                    'help_category_id' => '40',
                    'name' => 'Data Definition',
                    'parent_category_id' => '36',
                    'url' => '0'
                ]
            ];
        $columns            = ['help_category_id','name','parent_category_id','url'];
        $nullableColumns    = collect(['parent_category_id']);

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