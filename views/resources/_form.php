<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Resources */
/* @var $form yii\widgets\ActiveForm */
/* @var $adPlaces app\models\resourceAdPlaces */
?>

<div class="resources-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ad_place_ids')->widget(Select2::classname(),
        [
            'data' => $adPlaces,
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите шаблон ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => true,
            ],
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
