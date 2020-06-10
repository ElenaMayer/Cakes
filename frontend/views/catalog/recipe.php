<?php
use yii\helpers\Html;
use \common\models\Recipe;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
$title = $recipe->title;
Yii::$app->view->registerMetaTag(['name' => 'description','content' => $recipe->description]);
$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['/catalog/' . $category->slug]];

$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['']];
$this->title = Html::encode($title);
$images = $recipe->images;
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
        
<!--================Special Area =================-->
<section class="special_area p_100">
    <div class="container">
        <div class="special_item_inner">
            <div class="specail_item">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="s_left_img">
                            <?= Html::img($recipe->images[0]->getUrl(), ['alt'=>$recipe->title, 'class' => 'img-fluid']);?>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="special_item_text cd-customization">
                            <h4><?= Html::encode($recipe->title) ?></h4>
                            <p><?=$recipe->description ?></p>
                            <button data-id ="<?=$recipe->id?>" type="button" class="add-to-cart button add_to_cart_button pink_btn">
                                <em>В корзину</em>
                                <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                    <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="specail_item">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="s_item_left">
                            <div class="main_title">
                                <h2>Ингридиенты</h2>
                            </div>
                            <ul class="list_style">
                                <?php foreach ($recipe->ingredients as $ingredient):?>
                                    <li><a><?= $ingredient->title?>  (<?=$ingredient->count?>)</a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="s_right_img">
                            <?php if(isset($recipe->images[1])):?>
                                <?= Html::img($recipe->images[0]->getUrl('medium'), ['alt'=>$recipe->title, 'class' => 'img-fluid']);?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Special Area =================-->

<!--================Our Bakery Area =================-->
<section class="our_bakery_area making_area">
    <div class="container">
        <div class="main_title">
            <h2>Процесс приготовления</h2>
            <p><?=$recipe->text ?></p>
        </div>
    </div>
</section>
<!--================End Our Bakery Area =================-->
