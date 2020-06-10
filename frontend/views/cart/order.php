<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \common\models\Order;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['']];

$cache = Yii::$app->cache;
$location = $cache->get('location');

$shippingMethods = Order::getShippingMethods();

?>

<!--================End Main Header Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_text">
            <h3><?= $this->title ?></h3>
            <?= Breadcrumbs::widget([
                'itemTemplate' => "<li>{link}</li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' =>  [
                    'class' =>  ' ',
                ]]) ?>
        </div>
    </div>
</section>
<!--================End Main Header Area =================-->

<!--================Billing Details Area =================-->
<section class="billing_details_area p_100">
    <div class="container">
        <?php if (Yii::$app->user->isGuest):?>
        <?php Yii::$app->user->setReturnUrl('/cart/order');?>
            <div class="return_option">
                <h4>Чтобы продолжить оформление необходимо <a href="/user/login">войти</a></h4>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6">
                <?php if (!Yii::$app->user->isGuest):?>
                    <div class="main_title">
                        <h2>Ваша данные</h2>
                    </div>
                    <div class="billing_form_area">
                        <?php
                        /* @var $form ActiveForm */
                        $form = ActiveForm::begin([
                            'id' => 'order-form',
                            'options' => ['class' => 'billing_form row'],
                        ]);?>
                        <?= $form->field($order, 'fio', ['options' => ['class' => 'form-group col-md-12']])->textInput(['placeholder' => 'Мария', 'class' => 'form-control']); ?>

                        <?= $form->field($order, 'phone', ['options' => ['class' => 'form-group col-md-6']])->textInput(['placeholder' => '+7900-000-00-00', 'class' => 'form-control']); ?>

                        <?= $form->field($order, 'email', ['options' => ['class' => 'form-group col-md-6']])->textInput(['placeholder' => 'my@mail.ru', 'class' => 'form-control']); ?>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-lg-6">
                <div class="order_box_price">
                    <div class="main_title">
                        <h2>Ваш заказ</h2>
                    </div>
                    <div class="payment_list">

                        <div class="price_single_cost">
                            <?php foreach ($positions as $position):?>
                                <?php $product = $position->getProduct();?>
                                <?php if($product->getIsActive()):?>
                                    <?= $this->render('_products', [
                                        'position' => $position,
                                        'product' => $product,
                                        'cart' => $cart,
                                    ]); ?>
                                <?php endif;?>
                            <?php endforeach ?>
                            <h3>Итого <span><?=$cart->getCost(true)?><i class="fa fa-ruble"></i></span></h3>
                        </div>
                        <div id="accordion" class="accordion_area">
                        </div>
                        <?php if (!Yii::$app->user->isGuest):?>
                            <?= Html::submitButton('Отправить заказ', ['class' => 'btn pest_btn']) ?>

                            <?php ActiveForm::end() ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Billing Details Area =================-->