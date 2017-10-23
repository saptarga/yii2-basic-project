<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Reset Password';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Please choose your new password:</p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

        <?= $form
            ->field($model, 'password', $fieldOptions1)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autofocus' => true]) ?>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        <br>
        <?= Html::a('Login Aplikasi', ['site/login'], ['class' => 'profile-link']) ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
