<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $title
 * @property string $price
 * @property integer $product_id
 * @property integer $diversity_id
 * @property double $quantity
 *
 * @property Product $product
 * @property Recipe $recipe
 * @property ProductDiversity $diversity
 * @property Order $order
 */
class OrderItem extends \yii\db\ActiveRecord
{

    public $diversities;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Заказ',
            'title' => 'Описание',
            'price' => 'Цена',
            'product_id' => 'Товар',
            'diversity_id' => 'Расцветка',
            'quantity' => 'Количество',
            'diversities' => 'Расцветка'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiversity()
    {
        return $this->hasOne(ProductDiversity::className(), ['id' => 'diversity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public function getCost()
    {
        $cost = $this->quantity * $this->price;
        return $cost;
    }

    public function getWeight()
    {
        $weight = 0;
        $product = $this->product;
        if(is_object($product))
            $weight = $this->quantity * $this->product->weight;
        return $weight;
    }
}
