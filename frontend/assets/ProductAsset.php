<?php
namespace frontend\assets;

use yii\web\AssetBundle;
use frontend\assets\AppAsset;

class ProductAsset extends AssetBundle
{
    public $jsOptions = [
        'async' => 'async',
        'defer' => 'defer'
    ];
    public $css = [
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}