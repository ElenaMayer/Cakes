<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Category;
use common\models\Recipe;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рецепты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить рецепт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $columns = [
                [
                'format' => 'image',
                'value'=>function($model) { return isset($model->images[0])?$model->images[0]->getUrl('small'):''; }
            ],
            'id',
            'title',
            [
                'attribute'=>'category_id',
                'value' => function ($model) {
                    return empty($model->category_id) ? '-' : $model->category->title;
                },
                'filter' => Category::getCategoryList()
            ],
            'price',
            [
                'attribute'=>'is_active',
                'value' => function ($model) {
                    return $model->is_active ? 'Да' : 'Нет';
                },
                'filter' => [1 => 'Да', 0 => 'Нет']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ]];
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>

</div>
