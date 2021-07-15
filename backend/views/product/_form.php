<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="product-form col-md-8">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ShortDescription')->textarea(['maxlength' => true]) ?>

        <?= $form->field($model, 'Text')->textarea(['maxlength' => true]) ?>

        <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Tags')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Feature')->textarea(['maxlength' => true]) ?>

        <?= $form->field($model, 'image')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <div class="col-md-4">
        <h3>گروه ها:</h3>
    <?php
    echo "<pre>";
    echo yii\helpers\Html::checkboxList('ProductCategory',$model->SelectCategory(),$model->GetAllCategory());
    ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>