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

<?php $form = ActiveForm::begin(['id' => 'search-bar']); ?>
<div style="max-width: 15em">
    <?= $form->field($model, 'ip')->input('ip', ['placeholder' => "Search an IP"])->label('') ?>
</div>
<?php ActiveForm::end(); ?>


