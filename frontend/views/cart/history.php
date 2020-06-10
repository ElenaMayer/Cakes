<?php
use yii\widgets\Breadcrumbs;
use common\models\StaticFunction;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Мои рецепты';
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


<section class="contact_form_area p_100">
    <div class="container">
        <?php if(count($models) > 0):?>
                <?php
                $begin = $pagination->getPage() * $pagination->pageSize + 1;
                $end = $begin + $pageCount - 1;
                ?>
                <div class="row product_item_inner">
                    <?php foreach ($models as $model):?>
                        <?php foreach ($model->orderItems as $item):?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="cake_feature_item">
                                    <a href="/catalog/<?= $item->product->category->slug?>/<?= $item->product->id?>">
                                        <div class="cake_img">
                                            <?php
                                            $images = $item->product->images;
                                            if (isset($images[0])) {
                                                echo Html::img($images[0]->getUrl('medium'), ['alt' => $item->title]);
                                            }
                                            ?>
                                        </div>
                                    </a>
                                    <div class="cake_text cd-customization">
                                        <h3><a href="/catalog/<?= $item->recipe->category->slug?>/<?= $item->recipe->id?>"><?= Html::encode($item->title) ?></a></h3>
                                        <?php if($item->recipe->isAvailable()):?>
                                            <?php if($item->recipe->isAvailable() == 'payment'):?>
                                                <span class="pest_btn"><i class="fa fa-check"></i> Ожидает оплаты</span>
                                            <?php else:?>
                                                <a class="pest_btn" href="/catalog/<?= $item->recipe->category->slug?>/<?= $item->recipe->id?>">Смотреть</a>
                                            <?php endif;?>

                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </div>
                <?php echo LinkPager::widget([
                    'pagination' => $pagination,
                    'options' => [
                        'class' => 'product_pagination',
                    ],
                    'pageCssClass' => 'page-item',
                    'firstPageCssClass' => 'page-item',
                    'lastPageCssClass' => 'page-item',
                    'activePageCssClass' => 'active',
                    'prevPageCssClass' => 'page-item left_btn',
                    'nextPageCssClass' => 'page-item right_btn',
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                    'maxButtonCount' => 6,
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledPageCssClass' => 'hide'
                ]); ?>

        <?php else: ?>
            <div class="commerce commerce-cart noo-shop-main">
                        <div class="container">
                            <div class="row">
                                <div class="noo-main col-md-12">
                                    <p class="cart-empty">
                                        У вас еще нет оплаченных рецептов.
                                    </p>
                                    <p class="return-to-shop">
                                        <a class="pest_btn" href="/catalog">Вернуться к покупкам</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php endif;?>
    </div>
</section>
