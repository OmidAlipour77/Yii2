<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\captcha\Captcha;
?>

<?php

Pjax::begin();
$comment = new \frontend\models\Comment;
$form = ActiveForm::begin([
    'action' => ['comment'],
    'options' => ['data-pjax' => '']
]); ?>
<input type="hidden" name="Comment[ProductId]" value="<?= $model->Id ?>">
<?= $form->field($comment, 'Name')->textInput(['maxlength' => true]) ?>
<?= $form->field($comment, 'Email')->textInput(['maxlength' => true]) ?>
<?= $form->field($comment, 'WebSite')->textInput(['maxlength' => true]) ?>
<?= $form->field($comment, 'Comment')->textarea(['maxlength' => true]) ?>
<?= $form->field($comment, 'verifyCode')->widget(Captcha::className()) ?>


<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'ثبت'), ['class' => 'btn btn-success']) ?>
</div>

<?php
ActiveForm::end();
Pjax::end();
?>

