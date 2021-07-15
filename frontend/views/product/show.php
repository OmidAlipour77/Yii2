<?php
/* @var $this yii\web\View */
use \yii\helpers\Html;
?>
<div class="col-md-9 col-sm-8 left-side-content">
    <section class="single-page">
        <header><h3> <?= $model->Title ?>  </h3></header>
        <article>
            <!-- Detail -->
            <div class="col-md-8 col-sm-12 col-xs-12 pull-left detail-product">
                <div>
                    <span> قیمت : <?=$model->Price  ?> تومان </span>
<!--                    <a href="" class="add-to-card-link border-radius"> افزودن به سبد خرید </a>-->
                    <?=Html::a('افزودن به سبد خرید',['add-to-cart','id'=>$model->Id],['class'=>'add-to-card-link border-radius'])  ?>
                </div>
                <p>
                    <?= $model->ShortDescription ?>
                </p>
            </div>
            <!-- End Detail -->
            <!-- Gallery -->
            <div class="col-md-4 col-sm-12 col-xs-12 pull-right product-gallery">
                <div class="large-image border-radius">
                    <img class="border-radius" src="../productImages/<?= $model->Image ?>">
                </div>
                <div class="thumbnails-image">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4 border-radius"><img class="border-radius"
                                                                                   src="img/1.jpg"></div>
                        <div class="col-md-3 col-sm-3 col-xs-4 border-radius"><img class="border-radius"
                                                                                   src="img/2.jpg"></div>
                        <div class="col-md-3 col-sm-3 col-xs-4 border-radius"><img class="border-radius"
                                                                                   src="img/1.jpg"></div>
                        <div class="col-md-3 col-sm-3 col-xs-4 border-radius"><img class="border-radius"
                                                                                   src="img/2.jpg"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- End Gallery -->
            <div class="clearfix"></div>
        </article>
    </section>


    <div class="tabs-product margin-top-25">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#main-content"> توضیحات کامل </a></li>
            <li><a data-toggle="tab" href="#properties"> ویژگی ها </a></li>
            <li><a data-toggle="tab" href="#comments"> نظرات کاربران </a></li>
        </ul>

        <div class="tab-content ">

            <!-- description -->
            <div id="main-content" class="tab-pane fade in active">
                <p>
                    <?= $model->Text ?>
                </p>
            </div>
            <!-- End description -->

            <!-- Chart -->
            <div id="properties" class="tab-pane fade">
                <h3> ویژگی های محصول : </h3>

                <p>
                    <?= $model->Feature ?>
                </p>
            </div>
            <!-- End Chart -->

            <!-- Comment -->
            <div id="comments" class="tab-pane fade">
                <div class="comment-layer">
                   <?php echo $this->render('comment',['model'=>$model]);?>
                    <ul class="comment-list">
                        <?php foreach ($model->comments as $value): ?>
                            <li>
                                <img src="../img/avatar.jpg" width="65">
                                <div>
                                    <h5>ارسال شده از : <?= $value->Name ?> در تاریخ : <?= $value->CreateDate ?> </h5>
                                    <p>
                                        <?= $value->Comment ?>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
            <!-- End Comment -->


        </div>
    </div>

    <section class="border-radius tags-layer">
        <a href="">کلمات کلیدی</a>
        <a href="">کلمات کلیدی</a>
        <a href="">کلمات کلیدی</a>
        <a href="">کلمات کلیدی</a>
        <a href="">کلمات کلیدی</a>
        <a href="">کلمات کلیدی</a>
    </section>


</div>
