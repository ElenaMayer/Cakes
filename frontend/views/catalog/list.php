<?php
use yii\helpers\Html;
use common\models\StaticFunction;
use yii\widgets\LinkPager;
use frontend\assets\CatalogAsset;
use yii\widgets\Breadcrumbs;

CatalogAsset::register($this);

/* @var $this yii\web\View */
$title = $category === null ? 'Каталог' : $category->title;
Yii::$app->view->registerMetaTag(['name' => 'description','content' => $category === null ? Yii::$app->params['companyDesc'] : $category->description]);
$this->title = Html::encode($title);
if(isset($category->parent)){
    $this->params['breadcrumbs'][] = ['label' => $category->parent->title, 'url' => ['/catalog/' . $category->parent->slug]];
}
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

<!--================Product Area =================-->
<section class="product_area p_100">
    <div class="container">
        <div class="row product_inner_row">
            <div class="col-lg-9">
                <div class="row m0 product_task_bar">
                    <div class="product_task_inner">
                        <div class="float-left">
                            <?php
                            $begin = $pagination->getPage() * $pagination->pageSize + 1;
                            $end = $begin + $pageCount - 1;
                            ?>
                            <span>Товары с <?= $begin ?> по <?= $end ?> из <?= $pagination->totalCount ?></span>
                        </div>
                        <div class="float-right">
                            <h4>Сортировать по :</h4>
                            <select name="orderby" class="short" id="p_sort_by" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'popular') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'popular'):?>data-display="популярности"<?php endif;?>>популярности</option>
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'article') ?>" <?php if(Yii::$app->request->get('order') && Yii::$app->request->get('order') == 'article'):?>data-display="артикулу"<?php endif;?>>артикулу</option>
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'price_lh') ?>" <?php if(Yii::$app->request->get('order') && Yii::$app->request->get('order') == 'price_lh'):?>data-display="возрастанию цены"<?php endif;?>>возрастанию цены</option>
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'price_hl') ?>" <?php if(Yii::$app->request->get('order') && Yii::$app->request->get('order') == 'price_hl'):?>data-display="убыванию цены"<?php endif;?>>убыванию цены</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row product_item_inner">
                    <?php foreach (array_values($models) as $index => $model) :?>
                        <?= $this->render('_product', ['model'=>$model]); ?>
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
            </div>
            <div class="col-lg-3">
                <?= $this->render('_sidebar', [
                    'category' => $category,
                    'menuItems' => $menuItems,
                ]); ?>
            </div>
        </div>
    </div>
</section>
<!--================End Product Area =================-->