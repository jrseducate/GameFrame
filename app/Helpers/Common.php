<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/20/2018
 * Time: 8:23 PM
 */



if(!function_exists('secondsToMicroSeconds'))
{
    /**
     * Seconds To Micro Seconds
     *
     * @param float|string $seconds
     * @return int
     */
    function secondsToMicroSeconds($seconds)
    {
        return intval(floatval($seconds) * 1000000);
    }
}

if(!function_exists('secondsToMicroSeconds'))
{
    /**
     * Get First Set
     *
     * @param mixed $values
     * @return mixed|null
     */
    function getFirstSet(...$values)
    {
        foreach($values as $value)
        {
            if(isset($value))
            {
                return $value;
            }
        }

        return null;
    }
}

if(!function_exists('toString'))
{
    /**
     * To String
     *
     * @param array|object $array
     * @return string
     */
    function toString($array)
    {
        $result = '[';

        if(is_object($array))
        {
            $array = (array)$array;
        }
        if(is_array($array))
        {
            $isFirst = true;
            foreach($array as $key => $value)
            {
                if(!$isFirst)
                {
                    $result .= ', ';
                }

                $key = is_numeric($key) ? $key : "'$key'";

                if(is_array($value) || is_object($value))
                {
                    $result .= "$key => " . toString($value);
                }
                else
                {
                    if(!is_numeric($value))
                    {
//                        preg_replace("/^(?<!\\)'$/", "\\'", $value);
//                        for($i = 0; $i < 4; $i++)
//                        {
//                            $value = str_replace("\\'", "'", $value);
//                        }
//                        $value = str_replace("'", "\\'", $value);
                        $value = "'$value'";
                    }
                    $result .= "$key => $value";
                }

                $isFirst = false;
            }
        }

        $result .= ']';

        return $result;
    }
}