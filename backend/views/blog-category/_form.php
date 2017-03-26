<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\blog\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-7"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-5"><?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Не обязательно']) ?></div>
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

    <?=\pistol88\seo\widgets\SeoForm::widget([ 'model' => $model, 'form' => $form, ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
