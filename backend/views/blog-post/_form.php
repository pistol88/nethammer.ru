<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\blog\Category;
use kartik\select2\Select2;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\blog\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

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
        <div class="col-md-2">
            <?= $form->field($model, 'icon')
                ->widget(Select2::classname(), [
                    'data' => yii::$app->params['blogIcons'],
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Выберите иконку ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
        </div>
        <div class="col-md-2"><?= $form->field($model, 'date')->textInput() ?></div>
        <div class="col-md-2">
            <?= $form->field($model, 'author_user_id')
                ->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Выберите автора ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
        </div>
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
