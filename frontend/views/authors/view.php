<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
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
?>
<h2>Author books</h2>
<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        'price',
        'created_at:datetime',
        'updated_at:datetime',
    ],
]);

