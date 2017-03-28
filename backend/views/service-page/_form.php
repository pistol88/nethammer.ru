<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\service\Page */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord) {
    $url = ['/service-page/create'];
} else {
    $url = ['/service-page/update', 'id' => $model->id];
}
?>

<div class="block-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Url::toRoute($url)]); ?>

    <?= $form->field($model, 'service_id')->hiddenInput()->label(false) ?>

    <div class="row">
        <div class="col-md-7"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-5"><?= $form->field($model, 'sort')->textInput(['maxlength' => true, 'placeholder' => 'Не обязательно']) ?></div>
    </div>

    <?php echo $form->field($model, 'text')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'imageUpload' => \yii\helpers\Url::toRoute(['/tools/upload-imperavi'])
            ]
        ]
    ) ?>

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
