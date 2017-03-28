<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\portfolio\Category;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\portfolio\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-8"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Не обязательно']) ?></div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'category_id')
                ->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Выберите категорию ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'date')->textInput(['maxlength' => true, 'placeholder' => 'Не обязательно']) ?>
        </div>
    </div>

    <?= $form->field($model, 'anons')->textArea(['maxlength' => true]) ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Далее' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
