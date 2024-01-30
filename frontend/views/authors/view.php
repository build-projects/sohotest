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
        'name',
        'biography:html',
        'created_at:datetime',
        'updated_at:datetime',
    ],
]);

