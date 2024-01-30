<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var \frontend\models\Books $model
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
            'format' => 'raw',
            'value' => function ($model) {
                return ($model->image) ? Html::img("/uploads/{$model->image}") : 'No image';
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]);

