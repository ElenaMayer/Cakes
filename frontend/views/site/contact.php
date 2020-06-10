<?php
use frontend\assets\ContactAsset;
use yii\widgets\Breadcrumbs;

ContactAsset::register($this);

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Контакты';
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

<!--================Contact Form Area =================-->
<section class="contact_form_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Контакты</h2>
            <h5>Do you have anything in your mind to let us know?  Kindly don't delay to connect to us by means of our contact form.</h5>
        </div>
        <div class="row">
                <div class="contact_details">
                    <div class="contact_d_item col-lg-12 col-12">
                        <h3>Адрес :</h3>
                        <p><?= Yii::$app->params['address'] ?></p>
                    </div>
                    <div class="contact_d_item col-lg-12 col-12">
                        <h5>Телефон : <a href="tel:<?= Yii::$app->params['phone'] ?>"><?= Yii::$app->params['phone'] ?></a></h5>
                        <h5>Email : <a href="mailto:<?= Yii::$app->params['email'] ?>"><?= Yii::$app->params['email'] ?></a></h5>
                    </div>
            </div>
        </div>
    </div>
</section>
<!--================End Contact Form Area =================-->

<!--================End Banner Area =================-->
<section class="map_area">
    <div id="mapBox" class="mapBox row m0"
         data-lat="<?= Yii::$app->params['googleLat'] ?>"
         data-lon="<?= Yii::$app->params['googleLon'] ?>"
         data-zoom="12"
         data-marker="img/map-marker.png?1"
         data-info="<?= Yii::$app->params['address'] ?>"
         data-mlat="<?= Yii::$app->params['googleLat'] ?>"
         data-mlon="<?= Yii::$app->params['googleLon'] ?>">
    </div>
</section>
<!--================End Banner Area =================-->