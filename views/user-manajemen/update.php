<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserManajemen */

$this->title = 'Update User Manajemen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Manajemens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-manajemen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
