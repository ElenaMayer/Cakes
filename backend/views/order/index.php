<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \common\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            return ['class' => [$model->status]];
        },
        'columns' => [
            [
                'attribute'=>'id',
                'format' => 'html',
                'value' => function ($model) {
                    $href = '/order/view?id='.$model->id;
                    return '<a href=' . $href . '>' . $model->id . '</a>';
                },
            ],
            [
                'attribute'=>'fio',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->user_id){
                        $href = '/order/index?OrderSearch%5Buser_id%5D='.$model->user_id;
                        return '<a href=' . $href . '>' . $model->fio . '</a>';
                    } else {
                        return $model->fio;
                    }
                },
            ],
            'phone',
            [
                'attribute'=>'status',
                'value' => function ($model) {
                    return isset($model->getStatuses()[$model->status]) ? $model->getStatuses()[$model->status] : $model->status;
                },
                'filter' => Order::getStatuses()
            ],
            [
                'header'=>'Сумма',
                'value' => function ($model) {
                    return $model->getCost();
                }
            ],
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>

</div>
