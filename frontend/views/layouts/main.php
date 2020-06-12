<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\IeAsset;
use common\models\Category;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
IeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#96cb62"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title . ' - ' . Yii::$app->name ) ?></title>
    <link rel="manifest" href="/manifest.json">
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-16x16.png?1', 'sizes' => '16x16']); ?>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-32x32.png', 'sizes' => '32x32']); ?>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-96x96.png', 'sizes' => '96x96']); ?>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <!--================Main Header Area =================-->

    <header class="main_header_area">
        <div class="top_header_area row m0">
            <div class="container">
                <div class="float-left">
                    <a href="tell:<?= Yii::$app->params['phone'] ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?= Yii::$app->params['phone'] ?></a>
                    <a href="mainto:<?= Yii::$app->params['email'] ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= Yii::$app->params['email'] ?></a>
                </div>
                <div class="float-right">
                    <ul class="h_social list_style">
                        <li><a href="<?= Yii::$app->params['linkInstagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?= Yii::$app->params['linkVk'] ?>"><i class="fa fa-vk"></i></a></li>
                        <li><a href="<?= Yii::$app->params['linkFacebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                    <ul class="h_search list_style">
                        <?php if (Yii::$app->user->isGuest):?>
                            <li>
                                <a href="/user/login" title="Вход">Вход</a>
                            </li>
                        <?php else:?>
                            <li>
                                <a href="/user/settings/profile"><i class="fa fa-user"></i></a>
                            </li>
                            <li>
                                <a href="/user/security/logout" data-method='post'>Выйти</a>
                            </li>
                        <?php endif;?>
                    </ul>
                    <ul class="h_search list_style">
                        <?php $itemsInCart = Yii::$app->cart->getCount(); ?>
                        <li class="shop_cart"><a href="/cart"><span><?= $itemsInCart ?></span><i class="lnr lnr-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_menu_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">
                        <img src="/img/logo.png?2" alt="<?= Yii::$app->name ?>">
                        <img src="/img/logo-2.png?2" alt="<?= Yii::$app->name ?>">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php $categories = Category::find()->where(['is_active' => 1, 'parent_id' => null])->all(); ?>
                            <?php $activeCategory = array_shift($this->context->actionParams) ?>
                            <?php foreach ($categories as $category):?>
                                <li class="dropdown submenu <?= $activeCategory == $category->slug ? "active" : "";?>">
                                    <a class="dropdown-toggle" href="/catalog/<?= $category->slug ?>" role="button" aria-haspopup="true" aria-expanded="false"><?= $category->title ?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                        <ul class="navbar-nav justify-content-end">
                            <li <?= $this->context->action->id == 'about' ? "class='active'" : "";?>><a href="/about">О нас</a></li>
                            <li <?= $this->context->action->id == 'contact' ? "class='active'" : "";?>><a href="/contact">Контакты</a></li>
                            <li <?= $this->context->action->id == 'payment' ? "class='active'" : "";?>><a href="/payment">Как сделать заказ</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================End Main Header Area =================-->

    <?= $content ?>

    <!--================Footer Area =================-->
    <footer class="footer_area">
        <div class="footer_widgets">
            <div class="container">
                <div class="row footer_wd_inner">
                    <div class="col-lg-5 col-10">
                        <aside class="f_widget f_about_widget">
                            <img src="/img/logo-2.png?1" alt="<?= Yii::$app->name ?>">
                            <p><?= Yii::$app->params['companySlogan'] ?></p>
                            <ul class="nav">
                                <li><a href="<?= Yii::$app->params['linkInstagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?= Yii::$app->params['linkVk'] ?>"><i class="fa fa-vk"></i></a></li>
                                <li><a href="<?= Yii::$app->params['linkFacebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-6">
                        <aside class="f_widget f_link_widget">
                            <div class="f_title">
                                <h3>Помощь</h3>
                            </div>
                            <ul class="list_style">
                                <li><a href="/about">О нас</a></li>
                                <li><a href="/contact">Контакты</a></li>
                                <li><a href="/payment">Как сделать заказ</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-6">
                        <aside class="f_widget f_contact_widget">
                            <div class="f_title">
                                <h3>Контакты</h3>
                            </div>
                            <h4><?= Yii::$app->params['phone'] ?></h4>
                            <h5><?= Yii::$app->params['email'] ?></h5>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <div class="container">
                <div class="copyright_inner">
                    <div class="float-left">
                        <h5>Copyright &copy; <?= date('Y') ?> <?= Yii::$app->params['domain'] ?><br/>
                            Developed with <i class="fa fa-heart-o"></i> by <a href="<?= Yii::$app->params['developerSite'] ?>" rel="external"><?= Yii::$app->params['developer'] ?></a>.
                        </h5>
                    </div>
                    <div class="float-right">
                        <a href="#">В начало</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <?= $this->render('_metrika'); ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
