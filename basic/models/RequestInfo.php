<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RequestInfo extends Model
{

    /**
     * Retrieves a list of hits by location from the db and returns them to the front end
     * @return an array of hits by location
     */
    public function hits()
    {
        return Yii::$app->db->createCommand('SELECT * FROM locations')
            ->queryAll();
    }



}
