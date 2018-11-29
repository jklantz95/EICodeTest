<?php

/* @var $this yii\web\View */
/* @var $model processLog */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Log Helper';
$this->params['breadcrumbs'][] = $this->title;
$logs = $model->getLogs();

?>
<div>
    <h2>Log File Processor</h2>
    <?php $form = ActiveForm::begin(['id' => 'process-form']); ?>
    <div style="max-width: 12em">
        <?= $form->field($model, 'filename')->dropdownList($logs); ?>
    </div>

    <p>** This will replace current processed log data **</p>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Process-Log']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
