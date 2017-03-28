<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'background')->dropDownList(yii::$app->params['slideBackgrounds']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'icon')->dropDownList(yii::$app->params['icons']) ?></div>
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'link_anchor')->textInput(['maxlength' => true]) ?></div>
    </div>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="gallery">
        <?=\pistol88\gallery\widgets\Gallery::widget(
            [
                'model' => $model,
                'previewSize' => '50x50',
                'fileInputPluginLoading' => true,
                'fileInputPluginOptions' => []
            ]
        ); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
