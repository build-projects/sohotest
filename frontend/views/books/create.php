<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Authors;

/**
 * @var \frontend\models\Books $dataProvider
 */
?>

<?php

$form = ActiveForm::begin([
    'id' => 'books-form',
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
]) ?>
<?= $form->field($model, 'imageFile')->fileInput()->hint('jpg, png') ?>

<?php if(!$model->isNewRecord && $model->image){ ?>
    <h3>Current image</h3>
<?php echo Html::img('/uploads/'.$model->image); ?>
<?php } ?>

<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'price') ?>
<?= $form->field($model, 'text')->textarea() ?>
<?php

echo $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Authors::find()->all(), 'id', 'name'),[
    'prompt' => html_entity_decode('&mdash; Выберите автора &mdash;')
]);
?>
<div class="form-group mt-3">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
