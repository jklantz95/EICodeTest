<?php

/* @var $this yii\web\View */
/* @var $model RequestInfo */

use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\bootstrap\Tabs;
use yii\helpers\Html;


$this->title = 'EtailInsight Code Test';

$dataProvider = new ArrayDataProvider([
    'allModels' =>  $model->hits(),
]);

$dataPoints = $model->chartData();

?>

<div class="site-index" style="padding-top: 1em">
    <h2>Location Access Info</h2>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'header' => 'Location',
                'attribute' => 'location',
                'contentOptions' => ['style'=>'padding-left:30px;'],

            ],
            [
                'header' => 'Number Of Hits',
                'attribute' => 'COUNT(*)',
                'contentOptions' => ['style'=>'padding-left: 30px;'],

            ],
            [
                'format' => 'raw',
                'header' => 'Additional Information',
                'value'=>function ($dataProvider) {
                    return Html::a('Click Here', '/site/locationinfo');
                },
                'contentOptions' => ['style'=>'padding:0px 0px 0px 30px;vertical-align: middle;'],
            ],
        ]
    ]);
    ?>


    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Bar Graph',
                'content' => '<div id="chartContainer" style="height: 370px; width: 100%;"></div>',
                'active' => true
            ],
            [
                'label' => 'Pie Chart',
                'content' => '<div id="chartContainer2" style="height: 370px; width: 100%;"></div>',
                'headerOptions' => [''],
            ],
        ],
    ]);
    ?>

</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>


    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1",
            title:{
                text: "Hits Per Location"
            },
            axisY: {
                title: "Number Of Hits"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,####",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();


        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "Hits Per Location"
            },

            data: [{
                type: "pie",
                yValueFormatString: "#,##0\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

    }
</script>
