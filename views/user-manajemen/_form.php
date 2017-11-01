<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserManajemen */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
       <?php $form = ActiveForm::begin(); ?>

           <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

           <div class="form-group">
               <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
           </div>

           <?php ActiveForm::end(); ?>

      </div>
    </div>
  </div>
</div>
