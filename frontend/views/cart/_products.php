<?php
use \yii\helpers\Html;
use common\models\ProductDiversity;

?>

<h5>
    <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>" title="<?= Html::encode($product->title)?>">
        <?= $product->title;?>
    </a><span><?= (int)$position->getCost() ?><i class="fa fa-ruble"></i></span>
</h5>