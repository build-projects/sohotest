<?php

use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var \frontend\models\Authors $dataProvider
 * @var \frontend\models\search\AuthorsSearch $searchModel
 */
?>
<?php
echo Html::a('Add author', ['/authors/create'], ['class' => 'btn btn-success mb-3 mt-3']);

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'biography',
        'created_at:datetime',
        'updated_at:datetime',
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ]
    ],
]) ?>
