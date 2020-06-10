<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>

<?php //if($model->getIsInStock()): ?>
    <div class="col-lg-4 col-md-4 col-6">
        <div class="cake_feature_item">
            <a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">
                <div class="cake_img">
                        <?php
                        $images = $model->images;
                        if (isset($images[0])) {
                            echo Html::img($images[0]->getUrl('medium'), ['alt' => $model->title]);
                        }
                        ?>
                </div>
            </a>
            <div class="cake_text cd-customization">
                <h4><span class="amount"><?= (int)$model->price ?><i class="fa fa-ruble"></i></span></h4>
                <h3><a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>"><?= Html::encode($model->title) ?></a></h3>
                <button data-id ="<?=$model->id?>" type="button" class="add-to-cart button add_to_cart_button pest_btn">
                    <em>В корзину</em>
                    <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php //endif;?>