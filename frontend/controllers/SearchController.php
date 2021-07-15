<?php


namespace frontend\controllers;


use frontend\models\Product;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex($q)
    {
        $model=Product::find()
            ->orFilterWhere(['like','Title',$q])
            ->orFilterWhere(['like', 'ShortDescription', $q])
            ->orFilterWhere(['like', 'Text', $q])
            ->all();
        return $this->render('index',['model'=>$model]);

    }
}