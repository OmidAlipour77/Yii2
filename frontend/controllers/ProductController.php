<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Order;
use frontend\models\OrderItems;
use frontend\models\Product;
use frontend\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yz\shoppingcart\ShoppingCart;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;


class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                
                'rules' => [
                    // deny all POST requests
                    [
                        'actions'=>['show','comment','add-to-cart'],
                        'allow' => true,
                        
                    ],
                    // allow authenticated users
                    [
                        'actions'=>['checkout','history','hisdet'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ]
        ];
    }

    public function actionShow($id)
    {
        $model = Product::findOne($id);
        return $this->render('show', ['model' => $model]);
    }
    public function actionComment()
    {
        $model = new Comment();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['show', 'id' => $model->ProductId]);
        }
    }
   
}
