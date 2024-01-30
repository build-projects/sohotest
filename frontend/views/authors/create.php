<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Authors;

/**
 * @var \frontend\models\Authors $dataProvider
 */
?>

<?php

$form = ActiveForm::begin([
    'id' => 'author-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'biography')->textarea() ?>

<div class="form-group mt-3">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
