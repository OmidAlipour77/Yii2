<?php

namespace frontend\models;

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
    public $verifyCode;
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
            ['verifyCode','captcha']
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
            'Name' => Yii::t('app', 'نام'),
            'Email' => Yii::t('app', 'ایمیل'),
            'WebSite' => Yii::t('app', 'وب سایت'),
            'Comment' => Yii::t('app', 'متن'),
            'CreateDate' => Yii::t('app', 'Create Date'),
            'verifyCode' => Yii::t('app', 'کد امنیتی'),
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
    public function getProductcomments()
    {
        return $this->hasMany(Productcomment::className(), ['ProductId' => 'Id']);
    }
}
