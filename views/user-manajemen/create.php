<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserManajemen */

$this->title = 'Create User Manajemen';
$this->params['breadcrumbs'][] = ['label' => 'User Manajemens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manajemen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
