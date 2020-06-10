<?php
use yii\helpers\Html;
?>
<td>
    <?= $form->field($ingredient, 'title')->textInput([
        'id' => "RecipeIngredient_{$key}_title",
        'name' => "RecipeIngredient[$key][title]",
    ])->label(false) ?>
</td>
<td>
    <?= $form->field($ingredient, 'count')->textInput([
        'id' => "RecipeIngredient_{$key}_count",
        'name' => "RecipeIngredient[$key][count]",
    ])->label(false) ?>
</td>
<td>
    <?= Html::a('Удалить ', 'javascript:void(0);', [
        'class' => 'product-remove-price-button btn btn-default btn-xs',
    ]) ?>
</td>