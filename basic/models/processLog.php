<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class processLog extends Model
{
    public $name;

    /**
     * Retrieves a list of hits by location from the db and returns them to the front end
     * @return an array of hits by location
     */
    public function process()
    {
        $file = fopen("../config/access_log.txt", "r");

        $line = fgets($file);
        fclose($file);

        return Yii::$app->db->createCommand()->insert('logData', [
            'location' => $line[3],
            'ip' => '5',
            'date' => 'suh',
            'request' => 'yo',
            'status' => '6',
            'referer' => 'ref',
            'user_agent' => 'agent',
        ])->execute();

    }



}
