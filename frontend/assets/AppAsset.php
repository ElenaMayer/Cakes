<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END,
        'async' => true,
        'defer' => true
    );
    public $css = [
        'css/font-awesome.min.css',
        'vendors/linearicons/style.css',
        'vendors/flat-icon/flaticon.css',
        'css/bootstrap.min.css?3',
        "vendors/revolution/css/settings.css",
        "vendors/revolution/css/layers.css",
        "vendors/revolution/css/navigation.css",
        "vendors/animate-css/animate.css",

        'vendors/owl-carousel/owl.carousel.min.css',
        'vendors/magnifc-popup/magnific-popup.css',

        'css/style.css?16',
        'css/common.css?2',
        'css/responsive.css',

        "vendors/nice-select/css/nice-select.css"
    ];
    public $js = [
        "js/custom.js?3",
        "js/popper.min.js",
        "vendors/revolution/js/jquery.themepunch.tools.min.js",
        "vendors/revolution/js/jquery.themepunch.revolution.min.js",
        "vendors/revolution/js/extensions/revolution.extension.actions.min.js",
        "vendors/revolution/js/extensions/revolution.extension.video.min.js",
        "vendors/revolution/js/extensions/revolution.extension.slideanims.min.js",
        "vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        "vendors/revolution/js/extensions/revolution.extension.navigation.min.js",

        "vendors/owl-carousel/owl.carousel.min.js",
        "vendors/magnifc-popup/jquery.magnific-popup.min.js",
        "vendors/datetime-picker/js/moment.min.js",
        "vendors/datetime-picker/js/bootstrap-datetimepicker.min.js",
        "vendors/nice-select/js/jquery.nice-select.min.js",
        "vendors/jquery-ui/jquery-ui.min.js",
        "vendors/lightbox/simpleLightbox.min.js",
        "js/theme.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];


}
