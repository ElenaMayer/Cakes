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
        <div class="row">
            <div class="col-lg-7">
                <div class="main_title">
                    <h2>Оформление заказа</h2>
                </div>
                <div class="billing_form_area">
                    <?php
                    /* @var $form ActiveForm */
                    $form = ActiveForm::begin([
                        'id' => 'order-form',
                        'options' => ['class' => 'billing_form row'],
                    ]);?>
                    <?= $form->field($order, 'fio', ['options' => ['class' => 'form-group col-md-12']])->textInput(['placeholder' => 'Мария', 'class' => 'form-control']); ?>

                    <?= $form->field($order, 'email', ['options' => ['class' => 'form-group col-md-6']])->textInput(['placeholder' => 'name@mail.ru', 'class' => 'form-control']); ?>

                    <?= $form->field($order, 'phone', ['options' => ['class' => 'form-group col-md-6']])->textInput(['placeholder' => '+7900-000-00-00', 'class' => 'form-control']); ?>

                    <?= $form->field($order, 'notes', ['options' => ['class' => 'form-group col-md-12']])->textarea(['class' => 'form-control dark', 'rows' => "3"]); ?>

                    <?= $form->field($order, 'shipping_method', ['options' => ['class' => 'form-group col-md-12']])->dropDownList($shippingMethods, ['class' => 'product_select']); ?>

                    <?= $form->field($order, 'address', ['options' => ['class' => 'form-group col-md-12']])->textInput(['placeholder' => 'Новосибирск, ул.Ленина д.1 кв.1', 'class' => 'form-control order-address']); ?>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="order_box_price">
                    <div class="main_title">
                        <h2>Ваш заказ</h2>
                    </div>
                    <div class="payment_list">

                        <div class="price_single_cost">
                            <?php foreach ($positions as $position):?>
                                <?php $product = $position->getProduct();?>
                                <?php if($product->getIsActive($position->diversity_id)):?>
                                    <?= $this->render('_products', [
                                        'position' => $position,
                                        'product' => $product,
                                        'cart' => $cart,
                                    ]); ?>
                                <?php endif;?>
                            <?php endforeach ?>

                            <h4>Подитог <span><?=$cart->getCost()?><i class="fa fa-ruble"></i></span></h4>
                            <h5>Доставка<span class="text_f">Бесплатно</span></h5>
                            <h3>Итого <span><?=$cart->getCost(true)?><i class="fa fa-ruble"></i></span></h3>
                        </div>
                        <div id="accordion" class="accordion_area">
                            <?= $form->field($order, 'payment_method', ['options' => ['class' => 'card']])->radioList(Order::getPaymentMethods()); ?>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Direct Bank Transfer
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Check Payment
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Paypal
                                            <img src="img/checkout-card.png" alt="">
                                        </button>
                                        <a href="#">What is PayPal?</a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= Html::submitButton('Отправить заказ', ['class' => 'btn pest_btn']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Billing Details Area =================-->