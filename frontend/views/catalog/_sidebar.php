<?php
use yii\widgets\Menu;
use common\models\StaticFunction;
use \common\models\Product;
use yii\helpers\Html;
?>

<div class="product_left_sidebar">
    <aside class="left_sidebar p_catgories_widget">
        <div class="p_w_title">
            <h3>Категории</h3>
        </div>
        <?= Menu::widget([
            'items' => $menuItems,
            'options' => [
                'class' => 'list_style',
            ],
        ]); ?>
    </aside>
    <aside class="left_sidebar p_sale_widget">
        <div class="p_w_title">
            <h3>Популярное</h3>
        </div>
        <?php foreach (array_values(Product::getPopular()) as $model) :?>
            <div class="media">
                <div class="d-flex">
                    <?php
                    $images = $model->images;
                    if (isset($images[0])) {
                        echo Html::img($images[0]->getUrl('small'), ['alt' => $model->title . ' ' . $model->size. 'см']);
                    }
                    ?>
                </div>
                <div class="media-body">
                    <a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">
                        <h4><?= $model->title ?></h4>
                    </a>
                    <h5><?= (int)$model->price ?><i class="fa fa-ruble"></i></h5>
                </div>
            </div>
        <?php endforeach;?>
    </aside>
</div>