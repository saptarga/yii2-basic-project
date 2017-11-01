<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\helpers\RecordHelpers;
use yii\bootstrap\Modal;
use app\widgets\Alert;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$directoryAsset = Yii::getAlias('@web');
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>
<?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => true,
        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>
<div class="row">
  <div class="col-md-3">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-black" style="background: url('<?= $directoryAsset ?>/img/bg_profil.jpg') center center;">
      </div>
      <div class="widget-user-image">
        <?= Html::img('@web/'.$model->pic, ['class' => 'img-circle']); ?>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-12">
            <div class="description-block">
              <h3 class="widget-user-username">
              	<?=	$model->first_name." ".$model->last_name; ?>
              </h3>
              <h5 class="widget-user-desc">
              	<?= $model->job_desc; ?></h5>
              <a href="<?= ($model->fb == '#')? '#':'http://'.$model->fb ?>"><?= Html::img('@web/img/facebook.png', ['style' => 'width:20px;']) ?></a>
              <a href="<?= ($model->ig == '#')? '#':'http://'.$model->ig ?>"><?= Html::img('@web/img/instagram.png', ['style' => 'width:20px;']) ?></a>
              <a href="<?= ($model->ln == '#')? '#':'http://'.$model->ln ?>"><?= Html::img('@web/img/linkedin.png', ['style' => 'width:20px;']) ?></a>
              <a href="<?= ($model->url == '#')? '#':'http://'.$model->url ?>"><?= Html::img('@web/img/website.png', ['style' => 'width:20px;']) ?></a><br><br>
              <?php if (RecordHelpers::userMustBeOwner('profile',$model->id)) { 
                  echo Html::a('<i class="fa fa-camera" aria-hidden="true"></i> Upload New Picture', ['update-pic'], [
                      'class' => 'btn btn-default',
                      'data-toggle'=>"modal",
                      'data-target'=>"#myModal",
                      'data-title'=>"Upload New Picture",
                  ]);
               } ?>
              <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Bio</p>
              <p class="profil-desc"><?= $model->bio; ?></p>
              <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Status</p>
              <p class="profil-desc">
				<?= ($model->user->status == '10')?'Active':'Inactive';?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab" class="title"><i class="fa fa-address-card-o" aria-hidden="true"></i> Profile</a></li>
        <?php if (RecordHelpers::userMustBeOwner('profile',$model->id)) { ?>
        <li><a href="#account" data-toggle="tab" class="title"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Account</a></li>
        <li><a href="#social-media" data-toggle="tab" class="title"><i class="fa fa-globe" aria-hidden="true"></i> Social Media</a></li>
        <li><a href="#danger-zone" data-toggle="tab" class="title danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Danger Zone</a></li>
        <?php   } ?> 
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="profile">
          <div class="row">
          	<div class="col-md-8 col-md-offset-1">
          	   <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> First Name</p>
               <p class="profil-desc"><?= $model->first_name ?></p>
               <hr>
               <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Last Name</p>
               <p class="profil-desc"><?= $model->last_name ?></p>
               <hr>
               <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Place Of Birth</p>
               <p class="profil-desc"><?= $model->place_of_birth ?></p>
               <hr>
               <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Birthdate</p>
               <p class="profil-desc"><?= $model->birthdate ?></p>
               <hr>
               <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Gender</p>
               <p class="profil-desc"><?= $model->gender ?></p>
               <hr>
               <p class="profil-title"><i class="fa fa-link" aria-hidden="true"></i> Public Email</p>
               <p class="profil-desc"><?= $model->public_email ?></p>
          	</div>

          	<div class="col-md-1">
          		<?php if (RecordHelpers::userMustBeOwner('profile',$model->id)) { 
          			echo Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profil', ['update', 'id'=>$model->id], [
          				'class' => 'btn btn-primary',
          				'data-toggle'=>"modal",
                        'data-target'=>"#myModal",
                        'data-title'=>"Profil User",
          				]); } ?> 
          	</div>
          </div>
        </div>
        <?php if (RecordHelpers::userMustBeOwner('profile',$model->id)) { ?>
        <div class="tab-pane" id="account">
        	<div class="row">
				<div class="col-md-10">
          <?php $form = ActiveForm::begin([
                                          'enableAjaxValidation' => true,
                                         'id'=>'changepassword-form',
                                         'validationUrl' => 'validate',
                                         'action' =>['change-password'],
                                         'options'=>['class'=>'form-horizontal'],
                                         'fieldConfig'=>[
                                             'template'=>"{label}\n<div class=\"col-sm-8\">
                                                         {input}</div>\n<div class=\"col-sm-8 col-sm-offset-4\">
                                                         {error}</div>",
                                             'labelOptions'=>['class'=>'col-sm-4 control-label'],
                                         ],
                                     ]); ?>
					<h4 class="profil">Change Password</h4><hr>
					<!-- <form class="form-horizontal profil-text"> -->

            <?= $form->field($modelPassword,'oldpass',['inputOptions'=>[
                            'class' => 'form-control']])->passwordInput() ?>
            <?= $form->field($modelPassword,'newpass',['inputOptions'=>[
                            'class' => 'form-control']])->passwordInput() ?>
            <?= $form->field($modelPassword,'repeatnewpass',['inputOptions'=>[
                            'class' => 'form-control']])->passwordInput() ?>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-10">
					      <button type="submit" class="btn btn-default">Update Password</button>   
					    </div>
					  </div>
					<!-- </form> -->
           <?php ActiveForm::end(); ?>
					<h4 class="profil">Change Username</h4><hr>
					<?php $form = ActiveForm::begin([
                   'id'=>'changeusername-form',
                   'validationUrl' => 'validate',
                   'action' =>['change-username'],
                    'options'=>['class'=>'form-horizontal'],
                    'fieldConfig'=>[
                            'template'=>"{label}\n<div class=\"col-sm-8\">
                            {input}</div>\n<div class=\"col-sm-8 col-sm-offset-4\">
                            {error}</div>",
                            'labelOptions'=>['class'=>'col-sm-4 control-label'],
                    ],
          ]); ?>
					<?= $form->field($modelUser, 'username',['enableAjaxValidation' => true, 'validateOnChange' => false])->textInput() ?>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-10">
					      <button type="submit" class="btn btn-default">Update Username</button>   
					    </div>
					  </div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
        </div>
        <?php } ?>
        <div class="tab-pane" id="social-media">
        	<div class="row">
				<div class="col-md-10">
					<?php $form = ActiveForm::begin([
                   'id'=>'changeusername-form',
                   'action' =>['change-sosmed'],
                    'options'=>['class'=>'form-horizontal'],
                    'fieldConfig'=>[
                            'template'=>"{label}\n<div class=\"col-sm-8\">
                            {input}</div>\n<div class=\"col-sm-8 col-sm-offset-4\">
                            {error}</div>",
                            'labelOptions'=>['class'=>'col-sm-4 control-label'],
                    ],
          ]); ?>
					  <?= $form->field($model, 'fb')->textInput() ?>
					  <?= $form->field($model, 'ig')->textInput() ?>
					  <?= $form->field($model, 'url')->textInput() ?>
					  <?= $form->field($model, 'ln')->textInput() ?>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-10">
					      <button type="submit" class="btn btn-default">Update Social Media</button>   
					    </div>
					  </div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
        </div>
        <div class="tab-pane" id="danger-zone">
        	<div class="row">
				<div class="col-md-12">
					<h4 class="profil danger">Delete Account</h4><hr>
					<p>Once you delete your account, there is no going back. Please be certain.</p>
					<?= Html::a('Delete Account', ['/user-manajemen/inactive', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
Modal::begin([
    'id' => 'myModal',
    'header' => '<h4 class="modal-title">...</h4>',
    'headerOptions'=>[
    	'style'=> 'background : #3c8dbc;color:white;',
    ]
]);
 
echo '...';
 
Modal::end();
?>