<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResourcesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $adPlaces app\models\AdPlaces */

$this->title = 'Resources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resources', ['create'], ['class' => 'btn btn-success']) ?>
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
                    if (!empty($model->resourceAdPlaces)) {
                        $result = ArrayHelper::map($model->getAdPlaceList($model->resourceAdPlaces), 'id', 'name');
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
