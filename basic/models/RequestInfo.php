<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RequestInfo is the model that retrieves all data for the front end.
 */
class RequestInfo extends Model
{
    public $ip;

    /**
     * Retrieves a list of hits by location from the db and returns them to the front end
     * @return an array of hits by location
     */
    public function getHits()
    {
        return Yii::$app->db->createCommand('SELECT location, COUNT(*) FROM logData GROUP BY location')
            ->queryAll();
    }

    /**
     * Retrieves a list hits from the db for a specific location and their info
     * @return an array of hit info
     */
    public function getLocationHitInfo($location)
    {
        return Yii::$app->db->createCommand('SELECT * FROM logData WHERE location=:location')
            ->bindValue(':location', $location)
            ->queryAll();
    }

    /**
     * Retrieves an array of correctly structured hits per location for a bar graph
     * @return an array of hit info for a graph
     */
    public function getChartData()
    {
        $hits = $this->getHits();
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
        return Yii::$app->db->createCommand('SELECT * FROM logData WHERE ip=:ip')
            ->bindValue(':ip', $ip)
            ->queryAll();
    }


    /**
     * Retrieves an array of access info based on a specific ip
     * @return an array of hit info for a graph
     */
    public function getFullIPData($ip)
    {
        $request = 'http://api.ipstack.com/'. $ip .'?access_key=de0094862dc3cd7e0c06591cb1b40aac';
        $response  = file_get_contents($request);
        $data = json_decode($response, true);
        $ipData['continent_name'] = $data['continent_name'];
        $ipData['country_name'] = $data['country_name'];
        $ipData['city'] = $data['city'];
        $ipData['capital'] = $data['location']['capital'];
        $ipData['latitude'] = $data['latitude'];
        $ipData['longitude'] = $data['longitude'];
        $ipData['Language'] = $data['location']['languages'][0]['name'];
        return  array($ipData);
    }

}
