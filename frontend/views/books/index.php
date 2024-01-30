<?php

use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var \frontend\models\Books $dataProvider
 * @var \frontend\models\search\BooksSearch $searchModel
 */

echo Html::a('Add book', ['/books/create'], ['class' => 'btn btn-success mb-3 mt-3']);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        'price',
        [
            'attribute' => 'author_id',
            'value' => function ($model) {
                return $model->author->name;
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ]
    ],
]);
