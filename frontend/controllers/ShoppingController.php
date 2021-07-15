<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Product;
use frontend\models\User;
use yz\shoppingcart\ShoppingCart;
use frontend\models\Order;
use frontend\models\OrderItems;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ShoppingController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                 
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
    public function actionIndex()
    {
        return $this->render('index');
    }
   public function actionAddToCart($id)
   {
       $cart = new ShoppingCart();
       $model = Product::findOne($id);
       if ($model) {
           $cart->put($model, 1);
           $data = $cart->getPositions();
           return $this->render('cart', [
               'data' => $data
           ]);
       }
       // throw new NotFoundHttpException();
   }
   public function actionCheckout()
   {
       $cart = new ShoppingCart();
       $order = new Order;
           $userId = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
           $order->userId = $userId->id;
           $order->date = date('Y-m-d H:i:s');
           $order->save();
           foreach ($cart->getPositions() as $value) {
               $orderItem = new OrderItems;
               $orderItem->orderId = $order->id;
               $orderItem->productId = $value->Id;
               $orderItem->price = $value->Price;
               $orderItem->save();
           }
           $cart->removeAll();
           return $this->redirect(['history']);
   }
   public function actionHistory()
   {
       $userId=User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
       $data=Order::find()->where(['userId'=>$userId->id])->all();
       return $this->render('history', ['data'=>$data]);
   }
   public function actionHisdet($id)
   {
       $data=OrderItems::find()->where(['orderId'=>$id])->all();
       return $this->render('hisdet',['data'=>$data]);
   }
}
