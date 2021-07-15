<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
/**
 * This is the model class for table "product".
 *
 * @property int $Id
 * @property string $Title
 * @property string $ShortDescription
 * @property string $Text
 * @property string $Price
 * @property string|null $Tags
 * @property string $Feature
 * @property string|null $Image
 *
 * @property Productcomment[] $productcomments
 */
class Product extends ActiveRecord implements CartPositionInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'ShortDescription', 'Text', 'Price', 'Feature'], 'required'],
            [['CreateDate'], 'safe'],
            [['Title'], 'string', 'max' => 350],
            [['ShortDescription', 'Tags'], 'string', 'max' => 500],
            [['Text'], 'string', 'max' => 1000],
            [['Price'], 'string', 'max' => 200],
            [['Feature'], 'string', 'max' => 800],
            [['Image'], 'string', 'max' => 100],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'Title' => Yii::t('app', 'Title'),
            'ShortDescription' => Yii::t('app', 'Short Description'),
            'Text' => Yii::t('app', 'Text'),
            'Price' => Yii::t('app', 'Price'),
            'Tags' => Yii::t('app', 'Tags'),
            'Feature' => Yii::t('app', 'Feature'),
            'Image' => Yii::t('app', 'Image'),
            'CreateDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Productcomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['ProductId' => 'Id']);
    }


    public function getPrice()
    {
        return $this->Price;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function getCost($withDiscount = true)
    {
        // TODO: Implement getCost() method.
    }

    public function setQuantity($quantity)
    {
        // TODO: Implement setQuantity() method.
    }

    public function getQuantity()
    {
        // TODO: Implement getQuantity() method.
    }
}
