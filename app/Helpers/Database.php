<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/20/2018
 * Time: 8:06 PM
 */

if(!function_exists('getDatabaseFromConnection'))
{
    /**
     * @param string $connection
     * @param null|string $default
     * @return string}mixed
     */
    function getDatabaseFromConnection($connection, $default = null)
    {
        try
        {
            return \DB::connection($connection)->getDatabaseName();
        }
        catch(\Exception $ex)
        {
            return $default;
        }
    }
}