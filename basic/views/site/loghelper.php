<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Log Helper';
$this->params['breadcrumbs'][] = $this->title;
$logs = $model->getLogs();

?>
<div>
    <?php $form = ActiveForm::begin(['id' => 'process-form']); ?>

    <?= $form->field($model, 'filename')->dropdownList($logs); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Process-Log']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
