<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $Title
 *
 * @property Productcategory[] $productcategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title'], 'required'],
            [['Title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[Productcategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductcategories()
    {
        return $this->hasMany(Productcategory::className(), ['CategoryId' => 'id']);
    }
}
