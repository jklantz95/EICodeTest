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
<div class="site-index" style="padding-top: 2em">
    <h2>Information On Hits For <?=$hits[0]['location']?></h2>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,

    ]);
    ?>

</div>
