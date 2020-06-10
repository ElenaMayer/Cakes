<?php

namespace common\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use frontend\models\MyCartPositionTrait;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property integer $category_id
 * @property integer $price
 * @property integer $is_active
 * @property string $time
 * @property integer $sort
 *
 * @property Image[] $images
 * @property OrderItem[] $orderItems
 * @property Category $category
 * @property RecipeIngredient[] $ingredients
 */
class Recipe extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use MyCartPositionTrait;

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    private $_recipeIngredients;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'text'], 'string'],
            [['category_id', 'is_active', 'price'], 'integer'],
            [['title', 'category_id'], 'required'],
            [['time'], 'safe'],
            [['title'], 'string', 'max' => 40],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Названи',
            'description' => 'Описание',
            'text' => 'Текст',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'is_active' => 'Показывать',
            'time' => 'Дата создания',
            'imageFiles' => 'Фото',
            'ingredients' => 'Ингридиенты'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $key => $file) {
                $image = new Image();
                $image->product_id = $this->id;
                if ($image->save()) {
                    $file->saveAs($image->getPath('origin'));
                    $image->prepareImage();
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    /**
     * @return RecipeIngredient[]
     */
    public function getIngredients()
    {
        return $this->hasMany(RecipeIngredient::className(), ['recipe_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function getPrice($qty = 0, $orderCreated = false)
    {
        if ($this->getIsActive() || $orderCreated) {
//            if ($this->getNewPrice())
//                return $this->getNewPrice();
//            else
                return $this->price;
        } else {
            return 0;
        }
    }

    public function getIsActive()
    {
        $product = Recipe::findOne($this->id);
        return $product->is_active;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    public static function getPopular($limit = 4)
    {
        $popProducts = Recipe::find()
            ->where(['is_active' => 1]);
        $popProducts = $popProducts->limit($limit)->all();
        return $popProducts;
    }

    public static function getProductArr($is_active = false, $is_in_stock = false)
    {
        $model = Product::find()
            ->select(['*', 'CONCAT(article, \' - \', title , \' (\', count,\' шт)\') as description']);

        if ($is_active) {
            $model = $model->andWhere(['is_active' => 1]);
        }
        if ($is_in_stock) {
            $model = $model->andWhere(['is_in_stock' => 1])->andWhere(['>', 'count', '0']);
        }
        $model = $model->all();
        return ArrayHelper::map($model, 'id', 'description');
    }

    public function getCartPosition($params = [])
    {
        return Yii::createObject([
            'class' => 'frontend\models\ProductCartPosition',
            'id' => $this->id,
        ]);
    }

    public static function getItemCountByCategory($category_id)
    {
        return Recipe::find()->where(['category_id' => $category_id])->count();
    }

    public function getRecipeIngredients()
    {
        if ($this->_recipeIngredients === null) {
            $this->_recipeIngredients = $this->isNewRecord ? [] : $this->ingredients;
        }
        return $this->_recipeIngredients;
    }

    private function getRecipeIngredient($key)
    {
        $ingredient = $key && strpos($key, 'new') === false ? RecipeIngredient::findOne($key) : false;
        if (!$ingredient) {
            $ingredient = new RecipeIngredient();
            $ingredient->loadDefaultValues();
        }
        return $ingredient;
    }

    public function setRecipeIngredients($ingredients)
    {
        unset($ingredients['__id__']); // remove the hidden "new RecipeIngredient" row
        $this->_recipeIngredients = [];

        foreach ($ingredients as $key => $ingredient) {
            if (is_array($ingredient)) {
                $this->_recipeIngredients[$key] = $this->getRecipeIngredient($key);
                $this->_recipeIngredients[$key]->setAttributes($ingredient);
            } elseif ($ingredient instanceof RecipeIngredient) {
                $this->_recipeIngredients[$ingredient->id] = $ingredient;
            }
        }
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $this->saveIngredients();
    }

    public function saveIngredients()
    {
        $keep = [];
        foreach ($this->recipeIngredients as $ingredient) {
            if($ingredient->title) {
                $ingredient->recipe_id = $this->id;
                if (!$ingredient->save(false)) {
                    return false;
                }
                $keep[] = $ingredient->id;
            }
        }
        $query = RecipeIngredient::find()->andWhere(['recipe_id' => $this->id]);
        if ($keep) {
            $query->andWhere(['not in', 'id', $keep]);
        }
        foreach ($query->all() as $ingredient) {
            $ingredient->delete();
        }
        return true;
    }

    public function hasInCart(){
        $cart = \Yii::$app->cart;
        $positions =  $cart->getPositions();
        foreach ($positions as $position){
            if($position->id == $this->id)
                return true;
        }
        return false;
    }

    public function isAvailable(){
        if($this->price > 0) {
            if(Yii::$app->user->isGuest){
                return false;
            } else {
                $orders = Order::find()->where(['user_id' => Yii::$app->user->id])->all();
                if($orders) {
                    foreach ($orders as $order){
                        foreach ($order->orderItems as $item){
                            if($item->product_id == $this->id){
                                if($order->status == Order::STATUS_DONE)
                                    return true;
                                else
                                    return 'payment';
                            }
                        }
                    }
                }
                return false;
            }
        } else {
            return true;
        }
    }
}
