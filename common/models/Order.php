<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $notes
 * @property string $status
 * @property string $fio
 * @property integer $shipping_cost
 * @property string $payment
 * @property string $city
 * @property string $shipping_method
 * @property string $payment_method
 * @property integer $zip
 * @property integer $discount
 * @property string $payment_id
 * @property string $payment_url
 * @property string $payment_error
 * @property string $shipping_number
 *
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 'x_new';
    const STATUS_DONE = 'done';

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'shipping_cost', 'zip', 'discount'], 'integer'],
            [['address', 'notes'], 'string'],
            [['phone', 'email', 'status', 'fio', 'city', 'shipping_method', 'payment_method',
                'payment', 'payment_id', 'payment_url', 'payment_error', 'shipping_number'], 'string', 'max' => 255],
            [['phone', 'fio'], 'required'],
            [['email'], 'trim'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'email' => 'Email',
            'notes' => 'Комментарий',
            'status' => 'Статус',
            'fio' => 'ФИО',
            'shipping_cost' => 'Стоимость доставки',
            'payment' => 'Оплата',
            'city' => 'Город',
            'shipping_method' => 'Способ доставки',
            'payment_method' => 'Способ оплаты',
            'zip' => 'Индекс',
            'discount' => 'Скидка',
            'payment_error' => 'Ошибка оплаты',
            'shipping_number' => 'Трэк/накладная',
            'payment_url' => 'Ссылка на оплату',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->status = self::STATUS_NEW;
            }
            return true;
        } else {
            return false;
        }
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_DONE => 'Оплачено',
        ];
    }

    public static function getShippingMethods()
    {
        return [
            'tk' => 'ТК СДЭК',
            'rp' => 'Почта России',
        ];
    }

    //Самовывозы
    public static function getShippingMethodsFree()
    {
        return [
            //'self' => "Самовывоз (" . Yii::$app->params['address'] . ")",
            'shipping' => 'Доставка',
        ];
    }

    //Самовывозы
    public static function getShippingMethodsNsk()
    {
        return [
            //'self' => "Самовывоз (" . Yii::$app->params['address'] . ")",
            'tk' => 'ТК СДЭК',
//            'courier' => 'Курьер до адреса',
        ];
    }

    public static function getShippingMethodsLite()
    {
        return [
            'tk' => 'СДЭК',
            'rp' => 'Почта',
            'shipping' => 'Доставка',
//            'courier' => 'Курьер',
            'nrg' => 'Энегрия',
//            'self' => 'Самовывоз',
        ];
    }

    //Самовывозы
    public static function getPaymentMethods()
    {
        return [
            'card' => 'Переводом на карту',
        ];
    }

    public static function getPaymentTypes()
    {
        return [
            'pending' => 'Платеж создан',
            'succeeded' => 'Оплачено с сайта',
            'canceled' => 'Платеж отменен',
        ];
    }

    public static function getTkList()
    {
        return [
            'cdek' => 'СДЭК',
            'nrg' => 'Энергия',
            //'dellin' => 'Деловые линии',
        ];
    }

    public function sendOrderEmail()
    {
        $emails = [Yii::$app->params['adminEmail']];
        if($this->email)
            $emails[] = $this->email;
        StaticFunction::sendEmail(
            $this,
            'order',
            $emails,
            'Заказ #' . $this->id . ' создан.');
    }

    public function getSubCost()
    {
        $cost = 0;
        foreach ($this->orderItems as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }

    public function getCost()
    {
        $cost = $this->getCostWithDiscount();
        return $cost + $this->shipping_cost;
    }

    public function getCostWithDiscount()
    {
        $cost = $this->getSubCost();
        if($this->discount > 0)
            return $cost - $cost * $this->discount/ 100;
        else
            return $cost;
    }

    public function getDiscountValue()
    {
        $cost = $this->getSubCost();
        if($this->discount > 0)
            return $cost * $this->discount/ 100;
        else
            return 0;
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        foreach ($this->orderItems as $item) {
            $product = Product::findOne($item->product_id);
            if(Product::cCounting()) {
                $product->changeCount('plus', $item->quantity, $item->diversity_id);
            }
        }

        return true;
    }

    public function getWeight(){
        $weight = 0;
        if($this->orderItems){
            foreach ($this->orderItems as $item) {
                $weight += $item->getWeight();
            }
        } else {
            $cart = \Yii::$app->cart;
            $positions = $cart->getPositions();
            foreach ($positions as $position) {
                $product = $position->getProduct();
                $weight += $product->weight * $position->getQuantity();
            }
        }
        return $weight * 1.1;
    }

    public function getSortOrderItems(){
        return OrderItem::find()
            ->joinWith('product')
            ->where(['order_id' => $this->id])
            ->orderBy('product.article')
            ->all();
    }

    public static function isSameFioExist($fio){
        $orders = Order::find()
            ->where(['fio' => $fio])
            ->all();
        if(count($orders) > 1)
            return true;
        else
            return false;
    }

    public function checkPayment(){
        $payment = new Payment();
        $res = $payment->checkPayment($this->payment_id);
        if(!$this->payment || $this->payment != $res->getStatus()){
            $this->payment = $res->getStatus();
            if($res->getStatus() == 'succeeded'){

                $this->sendPaymentEmail();

                $this->status = self::STATUS_PAID;
            } elseif($res->getStatus() == 'canceled'){
                $this->status = self::STATUS_PAYMENT;
                if($res->getCancellationDetails())
                    $this->payment_error = $res->getCancellationDetails()->getReason();
            }
            $this->save();
        }
    }

    public function sendPaymentEmail()
    {
        $emails = [Yii::$app->params['adminEmail']];
        if($this->email)
            $emails[] = $this->email;
        StaticFunction::sendEmail(
            $this,
            'payment',
            $emails,
            'Заказ #' . $this->id . ' успешно оплачен.');
    }

    public function payment(){

        $payment = new Payment();
        $res = $payment->payment($this);
        $this->payment = $res->getStatus();
        $this->payment_id = $res->getId();
        $paymentUrl = $res->getConfirmation()->getConfirmationUrl();
        $this->payment_url = $paymentUrl;
        $this->save();

        return $paymentUrl;
    }

    public static function getShippingCost($shippingMethod){

        $cart = \Yii::$app->cart;
        $total = $cart->getCost();
        if($total >= Yii::$app->params['freeShippingSum']){
            return 0;
        } else {
            if($shippingMethod == 'tk'){
                $cache = Yii::$app->cache;
                $location = $cache->get('location');
                if($location == 'Новосибирск' || $location == 'Бердск'){
                    return Yii::$app->params['shippingCostNsk'];
                } else {
                    return Yii::$app->params['shippingCost'];
                }
            } else {
                return Yii::$app->params['shippingCost'];
            }
        }
    }
}
