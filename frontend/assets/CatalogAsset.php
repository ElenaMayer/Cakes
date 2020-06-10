<?php
namespace frontend\assets;

use yii\web\AssetBundle;
use frontend\assets\AppAsset;

class CatalogAsset extends AssetBundle
{
    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
        'async' => 'async',
        'defer' => 'defer'
    ];
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}