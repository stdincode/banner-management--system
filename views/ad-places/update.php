<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdPlaces */

$this->title = 'Update Ad Places: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ad Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ad-places-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
