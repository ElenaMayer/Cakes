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
            <div class="total">
                <h4><span id="amount_total"><?=$total?></span><i class="fa fa-ruble"></i></h4>
            </div>
            <div class="cart_footer">
                <?= Html::a('Оформить заказ',
                    ['cart/order'],
                    ['class' => 'checkout-button pest_btn'])?>
            </div>
        </div>
    </div>
</div>