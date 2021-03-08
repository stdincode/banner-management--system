<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banners */
/* @var $adPlaces app\models\bannerAdPlaces */
/* @var $tags app\models\Tags */

$this->title = 'Create Banners';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'adPlaces' => $adPlaces,
        'tags' => $tags,
    ]) ?>

</div>
