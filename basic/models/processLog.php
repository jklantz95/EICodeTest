<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * processLog processes input data from the front end
 */
class processLog extends Model
{
    public $filename;

    /**
     * Retrieves a list of hits by location from the db and returns them to the front end
     * @return An array of hits by location
     */
    public function process($file_index)
    {

        Yii::$app->db->createCommand('DELETE FROM logData')->execute();

        $logfiles = $this->getLogs();

        /**
         *  The Next Section of code was sampled from https://docstore.mik.ua/orelly/webprog/pcook/ch11_14.htm
         */
        $log_file = "../logs/" . $logfiles[$file_index];
        $pattern = '/^([^ ]+) ([^ ]+) ([^ ]+) (\[[^\]]+\]) "(.*)" ([0-9\-]+) ([0-9\-]+) "(.*)" "(.*)"$/';
        $file = fopen($log_file,'r') or die($php_errormsg);

        $locations = Yii::$app->db->createCommand('SELECT * FROM locations ')->queryAll();

        $location_count = 0;
        foreach($locations as $location){
            $locations[$location_count]['ip'] = strtok($location['ip'], '*');
            $location_count++;
        }

        while (! feof($file)) {
            $line = fgets($file);
            preg_match($pattern,$line,$matches);
            if($matches){
                if($matches[6] != "404") {

                    $loc = "N/A";
                    $locSize = 0;

                    foreach($locations as $location){
                        if((strpos($matches[1], $location['ip']) !== false) && strlen($location['ip']) > $locSize){
                            $loc = $location['location'];
                            $locSize = strlen($location['ip']);
                        }
                    }

                    Yii::$app->db->createCommand()->insert('logData', [
                        'location' => $loc,
                        'ip' => $matches[1],
                        'date' => $matches[4],
                        'request' => $matches[5],
                        'status' => $matches[6],
                        'referer' => $matches[8],
                        'user_agent' => $matches[9],
                    ])->execute();
                }
            }

        }
        fclose($file) or die($php_errormsg);

    }

    /**
     * Retrieves a list of log file names from the log directory
     * @return array of log filenames
     */
    public function getLogs(){
        return array_diff(scandir("../logs"), array('..', '.'));
    }



}
