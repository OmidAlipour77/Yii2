<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        file_put_contents(Yii::getAlias('@images').'/test.txt','test alias');
        return $this->render('index');
    }

}