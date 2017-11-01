<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Update Profile: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">
    <div class="profile-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
        	<div class="col-md-6">
        		<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'place_of_birth')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'public_email')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'job_desc')->textInput(['maxlength' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update', ['class' => 'btn btn-primary']) ?>
                </div>
        	</div>
        	<div class="col-md-6">
        		<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'birthdate')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'bio')->textarea(['rows' => 9]) ?>
        	</div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
