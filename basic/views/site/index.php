<?php

/* @var $this yii\web\View */

$this->title = 'EtailInsight Code Test';

$hits = $model->hits();
?>
<div class="site-index">
    <?php foreach($hits as $hit){ ?>
        <div>
            <?= $hit['location'] ?>:<?= $hit['COUNT(*)'] ?>
        </div>
    <?php } ?>

</div>
