<?php

namespace frontend\models;

use common\models\Recipe;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CostCalculationEvent;


class ProductCartPosition implements CartPositionInterface
{
    /**
     * @var Product
     */
    protected $_product;
    protected $_quantity;

    public $id;
    public $price;

    public function getId()
    {
        return md5(serialize([$this->id]));
    }

    public function getPrice($qty = 1)
    {
        $product = $this->getProduct();
        if(!$product->getIsActive())
            return 0;
        else
            return $product->getPrice($qty);
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        if ($this->_product === null) {
            $this->_product = Recipe::findOne($this->id);
        }
        return $this->_product;
    }

    public function getQuantity()
    {
        return 1;
    }

    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
    }

    /**
     * Default implementation for getCost function. Cost is calculated as price * quantity
     * @param bool $withDiscount
     * @return int
     */
    public function getCost($withDiscount = true)
    {
        /** @var Component|CartPositionInterface|self $this */
        $cost = $this->getQuantity() * $this->getPrice($this->getQuantity());
        $cost = $this->getPrice();
        $costEvent = new CostCalculationEvent([
            'baseCost' => $cost,
        ]);
        if ($this instanceof Component)
            $this->trigger(CartPositionInterface::EVENT_COST_CALCULATION, $costEvent);
        if ($withDiscount)
            $cost = max(0, $cost - $costEvent->discountValue);
        return $cost;
    }
}