<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $columns = ['id'];
        if(Yii::$app->params['components']['product_subcategories']) {
            array_push($columns, ['attribute' => 'parent_id',
            'value' => function ($model) {
                return empty($model->parent_id) ? '-' : $model->parent->title;
            }]);
        }
        array_push($columns, 'title');
        array_push($columns, [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'create' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', $url);
                }
            ],
        ]);
//        print_r($columns);die();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns
    ]); ?>

</div>
