<?php

/* @var $this yii\web\View */
/* @var $hits array of hit info for a specific location */

use yii\grid\GridView;
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

    ]);
    ?>

</div>
