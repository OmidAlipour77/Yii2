<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "productcomment".
 *
 * @property int $Id
 * @property int $ProductId
 * @property string $Name
 * @property string $Email
 * @property string|null $WebSite
 * @property string $Comment
 * @property string $CreateDate
 *
 * @property Product $product
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productcomment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProductId', 'Name', 'Email', 'Comment'], 'required'],
            [['ProductId'], 'integer'],
            [['CreateDate'], 'safe'],
            [['Name'], 'string', 'max' => 100],
            [['Email'], 'string', 'max' => 200],
            [['WebSite'], 'string', 'max' => 300],
            [['Comment'], 'string', 'max' => 800],
            [['ProductId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['ProductId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'ProductId' => Yii::t('app', 'Product ID'),
            'Name' => Yii::t('app', 'Name'),
            'Email' => Yii::t('app', 'Email'),
            'WebSite' => Yii::t('app', 'Web Site'),
            'Comment' => Yii::t('app', 'Comment'),
            'CreateDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['Id' => 'ProductId']);
    }
}
