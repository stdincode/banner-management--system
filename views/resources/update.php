<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resources */
/* @var $adPlaces app\models\resourceAdPlaces */

$this->title = 'Update Resources: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resources-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'adPlaces' => $adPlaces,
    ]) ?>

</div>
