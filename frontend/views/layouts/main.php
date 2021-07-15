<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;


\frontend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="top-nav">
    <div class="container">
        <div class="col-md-6 col-sm-7 col-xs-7 right-nav">
            <!-- Clientarea and Basket -->
            <div class="clientarea">
                <ul>
                    <?php if(Yii::$app->user->isGuest){?>
                    <li><a href="<?php echo \yii\helpers\Url::to(['/user/registration/register'])?>"><i class="fa fa-user-plus"></i> <label>عضویت</label> </a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['/user/security/login'])?>"><i class="fa fa-user"></i> <label></label>ورود به سایت</a></li>
                    <?php
                    }else{?>
                        <li><a href="<?php echo \yii\helpers\Url::to(['out'])?>"><i class="fa fa-user"></i> <label><?php echo 'خروج'.' '.'('.  Yii::$app->user->identity->username .')'; ?></label> </a></li>
                    <?php
                    }?>



                    <li><a href="<?php echo \yii\helpers\Url::to(['/shopping/history'])?>"><i class="fa fa-shopping-bag"></i> سبد خرید</a></li>
                </ul>
            </div>
            <!-- End Clientarea and Basket -->
        </div>
        <div class="col-md-6 col-sm-5 col-xs-5 left-nav">
            <!-- Social -->
            <div class="socials">
                <ul>
                    <li><a href="" class="social-icon" data-balloon=" اینستاگرام " data-balloon-pos="down"><i
                                    class="fa fa-instagram"></i></a></li>
                    <li><a href="" class="social-icon" data-balloon=" لینکداین " data-balloon-pos="down"><i
                                    class="fa fa-linkedin"></i></a></li>
                    <li><a href="" class="social-icon" data-balloon=" فیس بوک " data-balloon-pos="down"><i
                                    class="fa fa-facebook"></i></a></li>
                    <li><a href="" class="social-icon" data-balloon=" تلگرام " data-balloon-pos="down"><i
                                    class="fa fa-paper-plane"></i></a></li>
                    <li><a href="" class="social-icon" data-balloon=" توئیتر " data-balloon-pos="down"><i
                                    class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <!-- End Social -->
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- site Header -->
<header class="header-site">
    <div class="container">
        <div class="col-md-7 col-sm-7 logo-layer">
            <h1>فروشگاه <span>آنلایــــــن</span></h1>
        </div>
        <div class="col-md-5 col-sm-5 left-header-site">

        </div>
        <div class="clearfix"></div>
    </div>
</header>
<!-- End site Header -->
<!-- Mega Menu -->
<nav class="mega-menu">
    <div class="container">
        <span class="responsive-list"><i class="fa fa-th-list"></i></span>
        <ul>
            <li><a href="/"> صفحه اصلی </a></li>
            <li><a href=""> محصولات </a></li>
        </ul>

        <!-- Search -->
        <div class="form-search">
            <span><i class="fa fa-search"></i></span>
            <form action="/search/index" method="get">
                <input type="text" name="q" placeholder=" جستجو کنید ..." class="border-radius">
                <button type="submit" class="border-radius"> بگرد</button>
            </form>
        </div>

    </div>
</nav>
<!-- End Mega Menu -->


<div class="container margin-top-25">
    <aside class="col-md-3 col-sm-4 right-side-content">
        <!-- Category -->
        <section class="border-radius category-side">
            <header><h3> دسته بندی ها </h3></header>
            <article>
                <?php echo $this->render('../product/category') ?>
            </article>
        </section>
        <!-- End Category -->
        <!-- Category -->

        <!-- End Category -->
    </aside>
    <div class="col-md-9 col-sm-8 left-side-content">
    <?= $content ?>
    </div>
    <div class="clearfix"></div>
</div>

<footer>
    <div class="top-footer">
        <div class="container">
            <section class="col-lg-4 col-md-4 permalink-section">
                <header><h3> دسترسی سریع </h3></header>
                <article>
                    <ul>
                        <li><a href=""> صفحه اصلی </a></li>
                        <li><a href=""> ورود به سایت </a></li>
                        <li><a href=""> عضویت در سایت </a></li>
                        <li><a href=""> قوانین سایت </a></li>
                        <li><a href=""> راهنمای خرید </a></li>
                        <li><a href=""> سوالات متداول </a></li>
                        <li><a href=""> ورود به سایت </a></li>
                        <li><a href=""> عضویت در سایت </a></li>
                    </ul>
                </article>
            </section>
            <section class="col-lg-4 col-md-4 permalink-section">
                <header><h3> لینک های مفید </h3></header>
                <article>
                    <ul>
                        <li><a href="">پرسش های متداول پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول پرسش های متداول </a></li>
                        <li><a href="">پرسش های متداول </a></li>
                    </ul>
                </article>
            </section>
            <section class="col-lg-4 col-md-4 contact-section">
                <header><h3> تماس با ما </h3></header>
                <article>
                    <p><i class="fa fa-map-o"></i> نشانی : تهران ، خیابان شریعتی ، ابتدای خیابان ملک ، کوچه ایرانیاد ،
                        پلاک 1 ، آموزشگاه برنامه نویسان</p>
                    <p><i class="fa fa-volume-control-phone"></i> 021-88454816 </p>
                    <p><i class="fa fa-envelope"></i> info@barnamenevisan.com</p>
                    <p><i class="fa fa-fax"></i> 021-88454816 </p>
                </article>
            </section>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <div class="col-lg-8 col-md-8 col-sm-6">
                <ul>
                    <li><a href=""> خانه </a></li>
                    <li><a href="">قوانین سایت </a></li>
                    <li><a href=""> درباره ما </a></li>
                    <li><a href=""> تماس با ما </a></li>
                </ul>
                <p>Ⓒ تمام حقوق مادی ومعنوی این سایت متعلق به " <a href=""> آموزشگاه برنامه نویسان </a> " می باشد.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="social-layer">
                    <a href="" class="border-radius"><i class="fa fa-facebook"></i></a>
                    <a href="" class="border-radius"><i class="fa fa-linkedin"></i></a>
                    <a href="" class="border-radius"><i class="fa fa-twitter"></i></a>
                    <a href="" class="border-radius"><i class="fa fa-google-plus"></i></a>
                    <a href="" class="border-radius"><i class="fa fa-paper-plane"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
    function addCart(id){
        $.get(<?php echo Yii::$app->homeUrl.'shopping/addcart'?>,{'id':id},function(data){
            alert(ok);
        })
    }
</script>
</body>
</html>
<?php $this->endPage() ?>
