<?php
use yii\helpers\Html;
use common\models\RecipeIngredient;
?>

<hr>

<div class="ingredients">
    <?= Html::a('Добавить', 'javascript:void(0);', [
        'id' => 'product-new-price-button',
        'class' => 'btn btn-default btn-xs'
    ])?>
    <?php
    $ingredient = new RecipeIngredient();
    $ingredient->loadDefaultValues(); ?>

    <table id="product-prices" class="table table-condensed table-prices">
        <thead>
        <tr>
            <th><?=$ingredient->getAttributeLabel('title')?></th>
            <th><?=$ingredient->getAttributeLabel('count')?></th>
            <td>&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->ingredients as $key => $_ingredient):?>
            <tr>
                <?= $this->render('_form-ingredient', [
                    'key' => $_ingredient->isNewRecord ? (strpos($key, 'new') !== false ? $key : 'new' . $key) : $_ingredient->id,
                    'form' => $form,
                    'ingredient' => $_ingredient,
                ]);?>
            </tr>
        <?php endforeach;?>

        <tr id="product-new-price-block" style="display: none;">
            <?= $this->render('_form-ingredient', [
                'key' => '__id__',
                'form' => $form,
                'ingredient' => $ingredient,
            ]);?>
        </tr>
        </tbody>
    </table>

    <?php ob_start(); // output buffer the javascript to register later ?>
    <script>
        var price_k = <?php echo isset($key) ? str_replace('new', '', $key) : 0; ?>;
        $('#product-new-price-button').on('click', function () {
            price_k += 1;
            $('#product-prices').find('tbody')
                .append('<tr>' + $('#product-new-price-block').html().replace(/__id__/g, 'new' + price_k) + '</tr>');
        });
        $(document).on('click', '.product-remove-price-button', function () {
            $(this).closest('tbody tr').remove();
        });
        <?php
        // OPTIONAL: click add when the form first loads to display the first new row
        if (!Yii::$app->request->isPost && empty($model->ingredients))
            echo "$('#product-new-price-button').click();";
        ?>
    </script>
    <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>
</div>