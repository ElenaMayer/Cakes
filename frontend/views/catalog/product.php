<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use \common\models\Product;
use frontend\assets\ProductAsset;
use yii\widgets\Breadcrumbs;

ProductAsset::register($this);

/* @var $this yii\web\View */
$title = $product->title;
Yii::$app->view->registerMetaTag(['name' => 'description','content' => $product->description]);
$diversityId = ($product->diversity && $diversity && $diversity->id) ? $diversity->id : null;
if($diversityId) $title .= " " . $diversity->title;
$subcategory = $product->getSubcategory();
$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['/catalog/' . $category->slug]];
if($subcategory){
    $this->params['breadcrumbs'][] = ['label' => $subcategory->title, 'url' => ['/catalog/' . $subcategory->slug]];
}

$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['']];
$this->title = Html::encode($title);
$images = $product->images;
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

<!--================Product Details Area =================-->
<section class="product_details_area p_100">
    <div class="container">
        <div class="row product_d_price">
            <div class="col-lg-6">
                <div class="product_img">
                    <?= Html::img($product->images[0]->getUrl(), ['alt'=>$product->title, 'class' => 'img-fluid']);?>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="product_details_text">
                    <h4><?= Html::encode($product->title) ?></h4>
                    <p><?= $product->description ?> </p>
                    <h5>Цена :<span><?= (int)$product->price ?><i class="fa fa-ruble"></i></span></h5>
                    <div class="quantity_box">
                        <label for="quantity">Количество :</label>
                        <input type="text" value="1" id="quantity">
                    </div>
                    <button type="button" class="add-to-cart pink_more" data-id="<?= $product->id ?>" data-diversity_id="<?= $diversityId ?>">
                        <em>В корзину</em>
                        <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                            <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Details Area =================-->

<!--================Similar Product Area =================-->
<section class="similar_product_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Популярное</h2>
        </div>
        <div class="row similar_product_inner">
            <?php foreach (array_values(Product::getPopular()) as $model) :?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <?php
                            $images = $model->images;
                            if (isset($images[0])) {
                                echo Html::img($images[0]->getUrl('medium'), ['alt' => $model->title]);
                            }?>
                        </div>
                        <div class="cake_text">
                            <h4><?= (int)$model->price ?><i class="fa fa-ruble"></i></h4>
                            <h3><?= $model->title ?></h3>
                            <button type="button" class="add-to-cart pest_btn" data-id="<?= $model->id ?>" >
                                <em>В корзину</em>
                                <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                    <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</section>
<!--================End Similar Product Area =================-->

<meta property="og:title" content="<?=$title?>"/>
<meta property="og:description" content="<?=$product->description?>"/>
<meta property="og:image" content="<?=$images[0]->getUrl()?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content= "https://<?=Yii::$app->params['domain']?>/catalog/<?=$category->slug?>/<?=$product->id?>" />
