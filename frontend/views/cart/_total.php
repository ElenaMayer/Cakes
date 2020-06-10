<?php
use \yii\helpers\Html;
?>

<div class="row cart_total_inner">
    <div class="col-lg-7"></div>
    <div class="col-lg-5">
        <div class="cart_total_text">
            <div class="cart_head">
                Итого
            </div>
            <div class="sub_total">
                <h5>Подитог <span id="amount_subtotal"><?=$subtotal?></span><i class="fa fa-ruble"></i></h5>
            </div>
            <div class="total">
                <h4>Итого <span id="amount_total"><?=$total?></span><i class="fa fa-ruble"></i></h4>
            </div>
            <div class="cart_footer">
                <?= Html::a('Оформить заказ',
                    ['cart/order'],
                    ['class' => 'checkout-button pest_btn'])?>
            </div>
        </div>
    </div>
</div>