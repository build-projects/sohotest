<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var \frontend\models\Books $dataProvider
 */
?>

<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',
        'price',
        'text:html',
        [
            'label' => 'Image',
            'format'=>'raw',
            'value' => function ($model) {
                return Html::img("/uploads/{$model->image}");
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]);

