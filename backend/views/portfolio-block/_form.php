<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\portfolio\Block */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord) {
    $action = ['/portfolio-block/create'];
} else {
    $action = ['/portfolio-block/update', 'id' => $model->id];
}
?>

<div class="block-form">

    <?php $form = ActiveForm::begin(['action' => Url::toRoute($action)]); ?>

    <?= $form->field($model, 'item_id')->hiddenInput()->label(false) ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
