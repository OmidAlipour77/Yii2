<?php

namespace backend\models;


use backend\models\Productcategory;
use Yii;
use yii\helpers\ArrayHelper;


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
class Product extends \yii\db\ActiveRecord
{
    public $image;

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
            [['Title'], 'string', 'max' => 350],
            [['CreateDate'], 'safe'],
            [['ShortDescription', 'Tags'], 'string', 'max' => 500],
            [['Text'], 'string', 'max' => 1000],
            [['Price'], 'string', 'max' => 200],
            [['Feature'], 'string', 'max' => 800],
            [['Image'], 'string', 'max' => 100],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg']
        ];
    }

    public function upload()
    {
        $this->image->saveAs(Yii::getAlias('@images') . '/' . $this->image->baseName . '.' . $this->image->extension);
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

    public function getCategory()
    {
        return $this->hasMany(Productcategory::className(), ['ProductId' => 'Id']);
    }

    public function GetAllCategory()
    {
        $all = \backend\models\Category::find()->all();
        return ArrayHelper::map($all, 'id', 'Title');
    }

    public function SelectCategory()
    {
        $selected = [];
        if ($this->isNewRecord != 1) {
            $selected = ArrayHelper::getColumn(Productcategory::findAll(['ProductId' => $this->Id]),
                function ($element) {
                    return $element['CategoryId'];
                });
        }
        return $selected;
    }
    public function afterSave($insert,$changedAttributes)
    {
        $selected= Yii::$app->request->post('ProductCategory');
        Productcategory::deleteAll(['ProductId'=>$this->Id]);
        $insert_data=[];
        foreach ($selected as $v)
        {
            $insert_data[]=[$this->Id,$v];
        }
        Yii::$app->db->createCommand()->batchInsert('Productcategory',
            ['ProductId','CategoryId'],$insert_data)->execute();
    }
}
