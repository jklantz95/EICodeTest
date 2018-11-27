<?php

/* @var $this yii\web\View */

$this->title = 'EtailInsight Code Test';

?>
<div class="site-index">
    <?php foreach($hits as $hit){ ?>
        <div>
            <?= $hit['ip'] ?>
        </div>
    <?php } ?>

</div>
