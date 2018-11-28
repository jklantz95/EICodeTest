<?php

/* @var $this yii\web\View */

use scotthuangzl\googlechart\GoogleChart;

$this->title = 'EtailInsight Code Test';

$hits = $model->hits();
$chartData = $model->chartData();
$chart =  GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => $chartData,
    'options' => array('title' => 'Hits Per Location')));

?>
<div class="site-index">
    <?php foreach($hits as $hit){ ?>
        <div>
            <?= $hit['location'] ?>:<?= $hit['COUNT(*)'] ?>
        </div>
    <?php }
    echo $chart;
    ?>

</div>
