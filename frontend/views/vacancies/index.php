<?php
use yii\bootstrap\Alert;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}

?>
<div id="fullpage">

    <section class="container-fluid">
        <div class="col-sm-2 right-logo">
            <a href="/"><img src="/image/svg/logo.svg" alt=""></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <?php if (Yii::$app->session->hasFlash('vacancyFormSubmitted')){ ?>
                        <?php
                        Alert::begin(['options' => ['class' => 'alert-success vacancyFormMess']]);
                        echo Yii::$app->session->getFlash('vacancyFormSubmitted');
                        Alert::end();
                        ?>
                    <?php } ?>
                    <div class="description">
                        <?=$page->text;?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php foreach($vacancies as $vacancy) { ?>
        <div class="modal fade send-resume" id="resume<?=$vacancy->id;?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="#" class="pull-right" data-dismiss="modal" aria-hidden="true"><img src="/image/cross.png" alt=""></a>
                        <?=$vacancy->name;?>
                    </div>
                    <div class="modal-body form-style">
                        <?=nl2br($vacancy->text);?>
                        <?php $form = ActiveForm::begin(); ?>
                            <!--em style="color: #ffa834" class="pull-right">Все поля обязательны для заполнения</em-->
                            <?= $form->field($model, 'vacancy_id')->hiddenInput(['value' => $vacancy->id])->label(false) ?>
                            <?= $form->field($model, 'name')->textInput(['style' => '', 'placeholder' => 'Имя'])->label(false) ?>
                            <?= $form->field($model, 'email')->textInput(['style' => '', 'placeholder' => 'E-mail или телефон'])->label(false) ?>
                            <?= $form->field($model, 'info')->textarea(['rows' => 5, 'cols' => 60, 'placeholder' => 'Расскажите о себе'])->label(false) ?>
                            <div class="row upload-resume">
                                <div class="col-sm-12">
                                    <?= $form->field($model, 'link')->textInput(['style' => '', 'placeholder' => 'Ссылка на резюме'])->label(false) ?>
                                </div>
                            </div>
                            <?= Html::submitButton('Отправить', ['class' => 'bttn blue']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>