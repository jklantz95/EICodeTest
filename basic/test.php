<?php
/**
 * Created by PhpStorm.
 * User: Jacob
 * Date: 11/26/2018
 * Time: 10:53 PM
 */

use yii\grid\GridView;
use yii\data\SqlDataProvider;

$count = Yii::$app->db->createCommand('
    SELECT COUNT(*) FROM locations')->queryScalar();

$dataProvider = new SqlDataProvider([
    'sql' => 'SELECT * FROM locations ',
    'totalCount' => $count,
    'sort' => [
        'attributes' => [
            'age',
            'name' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Name',
            ],
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);

// get the user records in the current page
$models = $dataProvider->getModels();
echo print_r($models);

