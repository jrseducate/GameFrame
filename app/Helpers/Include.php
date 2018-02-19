<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 2/17/2018
 * Time: 5:52 PM
 */

$files = glob(__DIR__ . '/*.php');
if ($files === false) {
    throw new RuntimeException("Failed to glob for function files");
}
foreach ($files as $file) {
    require_once $file;
}
unset($file);
unset($files);