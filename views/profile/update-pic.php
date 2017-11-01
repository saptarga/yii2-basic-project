<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
<div class="row">
	<div class="col-md-6">
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

		    <?= $form->field($model, 'pic')->fileInput()->label('Upload Picture') ?>

		  <div class="form-group">
		      <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		  </div> 
			<?php ActiveForm::end() ?>
	</div>
	<div class="col-md-6" style="text-align: center;">
		<h4>Profile Picture</h4>
		<?= Html::img(Yii::getAlias('@web/').''.$model->pic, ['class'=>'img-thumnail','style'=>'border-radius: 10px;
    border: 3px solid #d2d6de;max-width: 250px;']) ?>
	</div>
</div>