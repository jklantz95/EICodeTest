<?php

/* @var $this yii\web\View */
/* @var $hits array of hit info for a specific location */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\data\ArrayDataProvider;


$this->title = 'Location Info';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider = new ArrayDataProvider([
    'allModels' => $hits,
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

<div class="site-index" style="margin-top: 3em">
    <h2 style="margin-bottom: .5em">Information On Hits For <?=$hits[0]['location']?></h2>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [ 'style' => 'word-wrap: break-word;' ],
        'columns' => [
            [
                'header' => 'Location',
                'attribute' => 'location',
                'contentOptions' => ['style'=>'padding-left: 30px;'],
            ],
            [
                'format' => 'raw',
                'header' => 'IP',
                'value'=>function ($dataProvider) {
                    return Html::a($dataProvider['ip'], '/site/ipinfo?ip=' . $dataProvider['ip']);
                },
            ],
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
