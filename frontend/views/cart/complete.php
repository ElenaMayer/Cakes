<?php

if($order->payment_method != 'online') {
    $this->title = 'Заказ успешно создан!';
} else {
    if($order->payment == 'succeeded') {
        $this->title = 'Оплата прошла успешно!';
    } else {
        $this->title = 'Ошибка оплаты';
    }
}
?>

<section class="contact_form_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Спасибо за заказ!</h2>
            <h5>После оплаты заказанные рецепты будут доступны в личном кабинете.</h5>
        </div>
    </div>
</section>