<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!--<div class="col-md-9 col-sm-8 left-side-content">-->
    <section class="last-products">
        <header><h3> جدیدترین محصولات </h3> <a href=""> آرشیو </a></header>
        <article>
            <?php foreach ($model as $value):?>
                <div class="col-md-4 col-sm-6">
                    <div class="border-radius">
                        <img src="/productImages/<?=$value->Image?>" style="width: 150px;height: 150px;margin: auto">
                        <a href="<?=\yii\helpers\Url::to(['product/show','id'=>$value->Id])?>"><h2> <?=$value->Title ?> </h2></a>
                        <h6>افزودن به لیست مقایسه <input type="checkbox"></h6>
                        <span class="col-md-9 col-sm-9 col-xs-9 price-layer">
                                  <label><?=number_format($value->Price,0,",",",") ?>   تومان</label>
                               </span>
                        <!-- <a href="<?=Url::to(['/shopping/addcart']) ?>" name="add" class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 buy-button border-radius">
                            <label><i class="fa fa-shopping-basket"></i></label> 
                         </a> --->
                    <?=Html::a('<label><i class="fa fa-shopping-basket"></i></label>',['shopping/add-to-cart','id'=>$value->Id],['class'=>'col-md-2 col-sm-2 col-xs-2 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 buy-button border-radius'])  ?>
                     <!-- <button type=\"submit\" name=\"add\" class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 buy-button border-radius">
                    <i class="fa fa-shopping-basket"></i>
                    </button>  -->
                    <input type="hidden" name="product_id" value="<?=$value->Id ?>">
                </div>
                </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
        </article>
    </section>




<!--</div>-->



