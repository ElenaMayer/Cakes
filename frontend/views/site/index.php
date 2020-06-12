<?php

use frontend\assets\IndexAsset;
use common\models\Recipe;
use yii\helpers\Html;

IndexAsset::register($this);

/* @var $this yii\web\View */
$this->title = Yii::$app->params['indexTitle'];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->view->registerMetaTag(['name' => 'description','content' => Yii::$app->params['companyDesc']]);

?>
<!--================Slider Area =================-->
<section class="main_slider_area">
    <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
        <ul>
            <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg?2"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="img/home-slider/slider-1.jpg?2"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['175','175','125','165','160']"
                         data-fontsize="['65','65','65','40','30']"
                         data-lineheight="['80','80','80','50','40']"
                         data-width="['800','800','800','500']"
                         data-height="none"
                         data-whitespace="normal"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                         data-textAlign="['left','left','left','left']">Quality Cake ... <br /> with sweet, eggs & breads</div>

                    <div class="tp-caption tp-resizeme secand_text"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['345','345','300','300','250']"
                         data-fontsize="['20','20','20','20','16']"
                         data-lineheight="['28','28','28','28']"
                         data-width="['640','640','640','640','350']"
                         data-height="none"
                         data-whitespace="normal"
                         data-type="text"
                         data-responsive_offset="on"
                         data-transform_idle="o:1;"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia consequuntur magni dolores eos qui ratione
                    </div>

                    <div class="tp-caption tp-resizeme slider_button"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['435','435','390','390','360']"
                         data-fontsize="['14','14','14','14']"
                         data-lineheight="['46','46','46','46']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="main_btn" href="#">See the recipe</a>
                    </div>
                </div>
            </li>
            <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg?2"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="img/home-slider/slider-2.jpg?2"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['175','175','125','165','160']"
                         data-fontsize="['65','65','65','40','30']"
                         data-lineheight="['80','80','80','50','40']"
                         data-width="['800','800','800','500']"
                         data-height="none"
                         data-whitespace="normal"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                         data-textAlign="['left','left','left','left']">Cake Bakery ... <br /> make delicious products</div>

                    <div class="tp-caption tp-resizeme secand_text"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['345','345','300','300','250']"
                         data-fontsize="['20','20','20','20','16']"
                         data-lineheight="['28','28','28','28']"
                         data-width="['640','640','640','640','350']"
                         data-height="none"
                         data-whitespace="normal"
                         data-type="text"
                         data-responsive_offset="on"
                         data-transform_idle="o:1;"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia consequuntur magni dolores eos qui ratione
                    </div>

                    <div class="tp-caption tp-resizeme slider_button"
                         data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']"
                         data-y="['top','top','top','top']" data-voffset="['435','435','390','390','360']"
                         data-fontsize="['14','14','14','14']"
                         data-lineheight="['46','46','46','46']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="main_btn" href="#">See the recipe</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--================End Slider Area =================-->

<!--================Welcome Area =================-->
<section class="welcome_bakery_area">
    <div class="container">
        <div class="welcome_bakery_inner p_100">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Добро пожаловать!</h2>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur uis autem vel eum.</p>
                    </div>
                    <div class="welcome_left_text">
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
                        <a class="pink_btn" href="/about">Узнать больше о нас</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="welcome_img">
                        <img class="img-fluid " src="img/cake-feature/welcome-right.jpg?2" alt="О нас">
                    </div>
                </div>
            </div>
        </div>
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Популярное</h2>
            </div>
            <div class="cake_feature_slider owl-carousel">
                <?php foreach (array_values(Recipe::getFree()) as $model) :?>
                    <div class="item">
                        <div class="cake_feature_item">
                            <a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">
                            <div class="cake_img">
                                    <?php
                                    $images = $model->images;
                                    if (isset($images[0])) {
                                        echo Html::img($images[0]->getUrl('medium'), ['alt' => $model->title]);
                                    }?>
                            </div>
                        </a>
                            <?php if(!$model->isAvailable()):?>
                                <div class="cake_text cd-customization">
                                    <h4><span class="amount"><?= (int)$model->price ?><i class="fa fa-ruble"></i></span></h4>
                                    <h3><a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>"><?= Html::encode($model->title) ?></a></h3>
                                    <?php if($model->hasInCart()):?>
                                        <a class="pest_btn" href="/cart"><i class="fa fa-check"></i> В корзине</a>
                                    <?php else:?>
                                        <button data-id ="<?=$model->id?>" type="button" class="add-to-cart button add_to_cart_button pest_btn">
                                            <em>В корзину</em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                            </svg>
                                        </button>
                                    <?php endif;?>
                                </div>
                            <?php else:?>
                                <div class="cake_text cd-customization">
                                    <h3><a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>"><?= Html::encode($model->title) ?></a></h3>
                                    <?php if($model->isAvailable() == 'payment'):?>
                                        <span class="pest_btn"><i class="fa fa-check"></i> Ожидает оплаты</span>
                                    <?php else:?>
                                        <a class="pest_btn" href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">Смотреть</a>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<!--================End Welcome Area =================-->

<!--================Special Recipe Area =================-->
<section class="special_recipe_area">
    <div class="container">
        <div class="special_recipe_slider owl-carousel">
            <?php foreach (array_values(Recipe::getSpecial()) as $model) :?>
                <div class="item">
                <div class="media">
                    <div class="d-flex">
                        <a href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">
                            <?php
                            $images = $model->images;
                            if (isset($images[0])) {
                                echo Html::img($images[0]->getUrl('medium'), ['alt' => $model->title]);
                            }?>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4><?= Html::encode($model->title) ?></h4>
                        <p><?= Html::encode($model->description) ?></p>
                        <a class="w_view_btn" href="/catalog/<?= $model->category->slug?>/<?= $model->id?>">Подробнее</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!--================End Special Recipe Area =================-->

<!--================Service We offer Area =================-->
<section class="service_we_offer_area p_100">
    <div class="container">
        <div class="single_w_title">
            <h2>Services We offer</h2>
        </div>
        <div class="row we_offer_inner">
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-food-6"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Cookies Cakes</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-food-5"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Tasty Cupcakes</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-food-3"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Wedding Cakes</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Awesome Recipes</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-food-4"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Menu Planner</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="s_we_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="flaticon-transport"></i>
                        </div>
                        <div class="media-body">
                            <a href="#"><h4>Home Delivery</h4></a>
                            <p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Service We offer Area =================-->

<!--================Bakery Video Area =================-->
<section class="bakery_video_area">
    <div class="container">
        <div class="video_inner">
            <h3>Real Taste</h3>
            <p>A light, sour wheat dough with roasted walnuts and freshly picked rosemary, thyme, poppy seeds, parsley and sage</p>
            <div class="media">
                <div class="d-flex">
                    <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="flaticon-play-button"></i></a>
                </div>
                <div class="media-body">
                    <h5>Watch intro video <br />about us</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Bakery Video Area =================-->

<!--================Client Says Area =================-->
<section class="client_says_area p_100">
    <div class="container">
        <div class="client_says_inner">
            <div class="c_says_title">
                <h2>What Our Client Says</h2>
            </div>
            <div class="client_says_slider owl-carousel">
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/client/client-1.png" alt="">
                            <h3>“</h3>
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/client/client-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/client/client-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Client Says Area =================-->

<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Latest Blog</h2>
            <h5>an turn into your instructor your helper, your </h5>
        </div>
        <div class="row latest_news_inner">
            <div class="col-lg-4 col-md-6">
                <div class="l_news_image">
                    <div class="l_news_img">
                        <img class="img-fluid" src="img/blog/latest-news/l-news-1.jpg" alt="">
                    </div>
                    <div class="l_news_hover">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="l_news_item">
                    <div class="l_news_img">
                        <img class="img-fluid" src="img/blog/latest-news/l-news-2.jpg" alt="">
                    </div>
                    <div class="l_news_text">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                        <p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="l_news_item">
                    <div class="l_news_img">
                        <img class="img-fluid" src="img/blog/latest-news/l-news-3.jpg" alt="">
                    </div>
                    <div class="l_news_text">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                        <p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->