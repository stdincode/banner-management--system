<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BannersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tags app\models\Tags */
/* @var $adPlaces app\models\AdPlaces */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Banners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'adplaces',
                'value' => function($model) {
                    if (!empty($model->bannerAdPlaces)) {
                        $result = ArrayHelper::map($model->getAdPlaceList($model->bannerAdPlaces), 'id', 'name');
                        return implode(', ', $result);
                    }
                    return '';
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'adplaces',
                    'data' => $adPlaces,
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Select a value'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                        'multiple' => true,
                    ],
                ]),
            ],
            [
                'attribute' => 'tags',
                'value' => function($model) {
                    if (!empty($model->bannerTags)) {
                        $result = ArrayHelper::map($model->getTagsName($model->bannerTags), 'id', 'name');
                        return implode(', ', $result);
                    }
                    return '';
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'tags',
                    'data' => $tags,
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Select a value'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                        'multiple' => true,
                    ],
                ]),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
