<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdPlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ad Places';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-places-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ad Places', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'height',
            'width',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
