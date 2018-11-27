<?php
/**
 * Created by PhpStorm.
 * User: Jacob
 * Date: 11/26/2018
 * Time: 10:53 PM
 */


$log_file = "logs/access_log.txt";
$pattern = '/^([^ ]+) ([^ ]+) ([^ ]+) (\[[^\]]+\]) "(.*)" ([0-9\-]+) ([0-9\-]+) "(.*)" "(.*)"$/';

$file = fopen($log_file,'r') or die($php_errormsg);

while (! feof($file)) {
    $line = fgets($file);
    preg_match($pattern,$line,$matches);
    if($matches){
        print(print_r($matches));
    }

}
fclose($file) or die($php_errormsg);


