<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

$this->title = Yii::t('user', 'Профиль');
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
<section class="profile_form p_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?= $this->render('_menu') ?>
            </div>
            <div class="col-lg-8">
                <div class="billing_form_area">
                    <?php $form = ActiveForm::begin([
                        'id' => 'profile-form',
                        'options' => ['class' => 'billing_form row'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-3 control-label'],
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                    ]); ?>

                    <?= $form->field($model, 'fio', ['options' => ['class' => 'form-group col-md-12']]) ?>
                    <?= $form->field($model, 'phone', ['options' => ['class' => 'form-group col-md-12']]) ?>

                    <div class="form-group col-md-12">
                        <div class="col-lg-9">
                            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn pest_btn']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Contact Form Area =================-->

