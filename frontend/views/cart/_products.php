<?php
use \yii\helpers\Html;
use common\models\ProductDiversity;

$diversity = ProductDiversity::findOne($position->diversity_id);
if($diversity && $diversity->id) {
    $isInStock = $product->getIsInStock($diversity->id);
} else {
    $isInStock = false;
}
?>

<?php $quantity = $position->getQuantity()?>
<?php $count = ($diversity) ? $diversity->count : $product->count; ?>
<h5>
    <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>" title="<?= Html::encode($product->title)?>">
        <?= $product->title;?>
    </a> x <?= $quantity?> <span><?= (int)$position->getCost() * $quantity ?><i class="fa fa-ruble"></i></span>
</h5>