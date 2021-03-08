<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdPlaces */

$this->title = 'Create Ad Places';
$this->params['breadcrumbs'][] = ['label' => 'Ad Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-places-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
