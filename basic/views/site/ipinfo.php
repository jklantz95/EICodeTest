<?php

/* @var $this yii\web\View */
/* @var $model RequestInfo */
/* @var $ip the ip address the user searched for */

use yii\grid\GridView;
use yii\data\ArrayDataProvider;


$this->title = 'IP Address Info';
$this->params['breadcrumbs'][] = $this->title;

$ipInfo = $model->getIPInfo($ip);
$fullIPData = $model->getFullIPData($ip);

$dataProvider = new ArrayDataProvider([
    'allModels' => $ipInfo,
    'pagination' => [
        'pageSize' => 10,
    ],
]);

$dataProvider2 = new ArrayDataProvider([
    'allModels' => $fullIPData,
    'pagination' => [
        'pageSize' => 10,
    ],
]);

?>

<style>
    td {
        max-width: 25vw;
    }
</style>

<div class="site-ipinfo">

    <h2>Information About IP <?= $ip ?></h2>

    <div style="margin-top: 1em">
        <h3 style="margin-bottom: .5em"></h3>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider2,
            'options' => ['style' => 'word-wrap: break-word;'],


        ]);
        ?>
    </div>

    <div style="margin-top: 3em">
        <h3 style="margin-bottom: .5em">Hits Made By <?= $ip ?></h3>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['style' => 'word-wrap: break-word;'],
            'columns' => [
                [
                    'header' => 'Date',
                    'attribute' => 'date',
                    'contentOptions' => ['style'=>'padding-left: 30px;'],
                ],
                [
                    'header' => 'Request',
                    'attribute' => 'request',
                    'contentOptions' => ['style'=>'padding-left: 30px;'],
                ],
                [
                    'header' => 'Status',
                    'attribute' => 'status',
                    'contentOptions' => ['style'=>'padding-left: 30px;'],
                ],
                [
                    'header' => 'Referer',
                    'attribute' => 'referer',
                    'contentOptions' => ['style'=>'padding-left: 30px;'],
                ],
                [
                    'header' => 'User Agent',
                    'attribute' => 'user_agent',
                    'contentOptions' => ['style'=>'padding-left: 30px;'],
                ],
            ]
        ]);
        ?>
    </div>

</div>
