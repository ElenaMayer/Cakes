<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Order;
use common\models\Payment;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Заказ #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <div id="order_id" data-id="<?=$model->id?>"></div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return isset(Order::getStatuses()[$model->status]) ? Order::getStatuses()[$model->status] : $model->status;
                },
            ],
            'fio',
            'phone',
            'email:email',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>
    <?= $this->render('_items_form', [
        'model' => $model,
    ]) ?>
</div>
