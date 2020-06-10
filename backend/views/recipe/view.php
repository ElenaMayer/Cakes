<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Category;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <h1>
        <a href='http://<?= Yii::$app->params['domain']?>/catalog/<?=$model->category->slug?>/<?=$model->id?>'>
            <?= Html::encode($this->title) ?>
        </a>
        <?php if(!$model->is_active):?>
            <span class="not_active">Не отображается</span>
        <?php endif;?>
    </h1>
    <div class="product-images">
        <?php foreach ($model->images as $image):?>
            <div class="product-image">
                <?= Html::a('x', ['/image/delete', 'id' => $image->id], ['class' => 'image_remove']) ?>
                <?= Html::img($image->getUrl('small'));?>
            </div>
        <?php endforeach;?>
    </div>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверена? Я бы не стала этого делать :)',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        $attributes = [
            'id',
            'is_active',
            'title',
            'description:ntext',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return empty($model->category_id) ? '-' : $model->category->title;
                },
            ],
            'price',
            [
                'attribute'=>'ingredients',
                'format' => 'html',
                'value' => function ($model) {
                    $ingredients = '';
                    foreach ($model->ingredients as $ingredient){
                            $ingredients .= ' ' .$ingredient->title .' - '. $ingredient->count .',' ;
                    }
                    return trim($ingredients, " ,");
                },
            ],
            'text:ntext',
            'time',
        ];
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>
