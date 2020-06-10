<?php
use common\models\OrderItem;
use common\models\Recipe;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
?>


<!--<a class="btn btn-success add-item-link">Добавить позицию</a>-->
<h2>Заказ:</h2>
<div class="add-item-form hide">
    <?php $form = ActiveForm::begin();
    $orderItem = new OrderItem(); ?>
    <div class="col-md-5 col-sm-6">
        <?= $form->field($orderItem, 'product_id')->widget(Select2::classname(), [
            'options' => [
                'placeholder' => Yii::t('app','Выберите товар ...'),
            ],
            'data'=>Recipe::getProductArr(false),
        ])->label(false) ?>
    </div>

    <div class="col-md-1 col-sm-6">
        <?= $form->field($orderItem, 'quantity')->textInput(['step' => 1, 'min' => 1, 'value' => 1])->label(false) ?>
    </div>

    <div class="col-md-2 col-sm-6">
        <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<table class="table table-striped table-bordered detail-view">
    <tr>
        <th>Фото</th><th>Товар</th><th>Цена</th><th></th>
    </tr>
    <?php
    if($model->orderItems):
        foreach ($model->getSortOrderItems() as $item): ?>
            <tr <?php if($item->product->category->slug == 'sale'):?>class="sale"<?php endif;?>>
                <td>
                    <div class="product-image">
                        <?php if($item->product->images):?>
                            <a href="/product/view?id=<?= $item->product->id?>">
                                <?= Html::img($item->product->images[0]->getUrl('small'));?>
                            </a>
                        <?php endif;?>
                    </div>
                </td>
                <td>
                        <?php echo $item->title;?>

                </td>
                <td>
                    <?= (int)($item->price) . ' руб.'?>
                </td>
                <td>
                    <?= Html::a('x', ['delete_item', 'id' => $item->id], [
                        'class' => 'btn btn-danger',
                    ]) ?>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td>
                <p><string>Итого: </string> <?= $model->getSubCost()?> руб.</p>
            </td>
        </tr>
        <?php if($model->discount):?>
        <tr>
            <td>
                <p><string>Скидка: </string> <?= $model->discount?>%</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><string>Итого со скидкой: </string> <?= $model->getCostWithDiscount() ?> руб.</p>
            </td>
        </tr>
    <?php endif;?>
    <?php endif;?>
</table>