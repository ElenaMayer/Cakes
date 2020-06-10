<?php
use \yii\helpers\Html;
use common\models\ProductDiversity;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$this->title = 'Корзина';

$cart = \Yii::$app->cart;
$positions = $cart->getPositions();

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['']];
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

<!--================Cart Table Area =================-->
<section class="cart_table_area p_100">
    <div class="container">
        <?php if($cart->getCount() > 0):?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Товар</th>
                        <th scope="col">Цена</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($positions as $position):?>
                        <?php $product = $position->getProduct();?>
                        <?php if($product->getIsActive()):?>
                            <?php
                            $quantity = $position->getQuantity();
                            ?>
                            <tr>
                                <td>
                                    <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>">
                                        <?= Html::img($product->images[0]->getUrl('small'), ['width' => '100', 'height' => '100', 'alt'=>$product->title]);?>
                                    </a>
                                </td>
                                <td class="item-title">
                                    <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>">
                                        <?= Html::encode($product->title)?>
                                    </a>
                                </td>
                                <td><?= (int)$product->price ?><i class="fa fa-ruble"></i></td>
                                <td class="product-remove"><a data-id="<?= $position->getId() ?>" id="remove_cart_item" class="remove">X</a></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach; ?>
                    <tr>
                        <td>
                            <a class="pest_btn" href="/catalog">Продолжить покупки</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <?= Html::a('Оформить заказ',
                                ['cart/order'],
                                ['class' => 'checkout-button pest_btn'])?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="data_total">
                <?= $this->render('_total', [
                    'subtotal' => $cart->getCost(),
                    'total' => $cart->getCost(true),
                    'discount' => $cart->getDiscount(),
                    'discountPercent' => $cart->getDiscountPercent(),
                ]); ?>
            </div>
        <?php else:?>
            <div class="commerce commerce-cart noo-shop-main">
                <div class="container">
                    <div class="row">
                        <div class="noo-main col-md-12">
                            <p class="cart-empty">
                                Ваша корзина в данный момент пуста.
                            </p>
                            <p class="return-to-shop">
                                <a class="button wc-backward" href="/catalog">
                                    Вернуться к покупкам
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
</section>
<!--================End Cart Table Area =================-->