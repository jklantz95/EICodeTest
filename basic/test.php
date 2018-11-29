<?php
/**
 * Created by PhpStorm.
 * User: Jacob
 * Date: 11/26/2018
 * Time: 10:53 PM
 */

use app\models\RequestInfo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = New requestInfo();

?>

<?php $form = ActiveForm::begin(['id' => 'process-form']); ?>
<div style="max-width: 12em">
    <?= $form->field($model, 'filename')->input($input); ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Process-Log']) ?>
</div>

<?php ActiveForm::end(); ?>


