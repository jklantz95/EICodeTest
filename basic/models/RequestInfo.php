<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RequestInfo extends Model
{
    public $ip;

    /**
     * Retrieves a list of hits by location from the db and returns them to the front end
     * @return an array of hits by location
     */
    public function hits()
    {
        return Yii::$app->db->createCommand('SELECT location, COUNT(*) FROM logData GROUP BY location')
            ->queryAll();
    }

    /**
     * Retrieves a list hits from the db for a specific location and their info
     * @return an array of hit info
     */
    public function locationHitInfo($location)
    {
        return Yii::$app->db->createCommand('SELECT * FROM logData WHERE location=:location')
            ->bindValue(':location', $location)
            ->queryAll();
    }

    /**
     * Retrieves an array of correctly structured hits per location for a bar graph
     * @return an array of hit info for a graph
     */
    public function chartData()
    {
        $hits = $this->hits();
        $count = 0;
        $chartData = [];
        foreach($hits as $hit){
            $chartData[$count++] = array("y" => (int)$hit[ 'COUNT(*)'], "label" => $hit['location']);

        }
        return $chartData;
    }

    /**
     * Retrieves an array of access info based on a specific ip
     * @return an array of hit info for a graph
     */
    public function getIPInfo($ip)
    {

        return $ip;
    }




}
