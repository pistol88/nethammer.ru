<?php
$this->title = $page->seo->title;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;
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
                <div class="col-sm-12 map">
                    <div>
                        <script type="text/javascript" charset="utf-8" async src="<?=yii::$app->settings->get('frontend.map');?>"></script>
                    </div>
                </div>
                <div class="col-sm-12 details">
                    <a data-toggle="collapse" href="#details" class="bttn-dashed pull-right">Реквизиты</a>
                    <div id="details" class="panel-collapse collapse">
                        <p><?=yii::$app->settings->get('frontend.address');?></p>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                <tr>
                                    <th><?=yii::$app->settings->get('frontend.organisation');?></th>
                                    <th><?=yii::$app->settings->get('frontend.bank');?></th>
                                </tr>
                                <tr>
                                    <td>ОГРН: <?=yii::$app->settings->get('frontend.ogrn');?>;</td>
                                    <td>РС: <?=yii::$app->settings->get('frontend.rs');?>;</td>
                                </tr>
                                <tr>
                                    <td>КПП: <?=yii::$app->settings->get('frontend.kpp');?>;</td>
                                    <td>КС: <?=yii::$app->settings->get('frontend.ks');?>;</td>
                                </tr>
                                <tr>
                                    <td>ИНН: <?=yii::$app->settings->get('frontend.inn');?>;</td>
                                    <td>БИК: <?=yii::$app->settings->get('frontend.bik');?>;</td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <div class="description">
                        <?=yii::$app->settings->get('frontend.phone');?>
                    </div>
                    <a href="mailto:<?=yii::$app->settings->get('frontend.email');?>"><?=yii::$app->settings->get('frontend.email');?></a>
                </div>
                <div style="clear:both"></div>                    
                <?php Pjax::begin(); ?>
                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')){ ?>
                <?php  
                    Alert::begin(['options' => ['class' => 'alert-success contactFormMess',],]);
                        echo Yii::$app->session->getFlash('contactFormSubmitted'); 
                    Alert::end(); 
                ?>
                <?php } ?>
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">        
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'description form-style', 'data-pjax' => true]]); ?>
                    <div style="width: 45%;float:left;">
                        <?= $form->field($model, 'name')->textInput(['style' => '', 'placeholder' => 'Имя'])->label(false) ?>
                    </div>
                    <div style="width: 45%;float:right">
                        <?= $form->field($model, 'email')->textInput(['style' => '', 'placeholder' => 'E-mail или телефон'])->label(false) ?>
                    </div>
                    <div style="clear:both">
                        <?= $form->field($model, 'info')->textarea(['rows' => 5, 'cols' => 60, 'placeholder' => 'Расскажите о задаче или задайте вопрос'])->label(false) ?>
                    </div>
                        <?= Html::submitButton('Отправить', ['class' => 'bttn blue', 'name' => 'contact-button']) ?>
                    <?php ActiveForm::end(); ?>
                
                </div>             
                <?php Pjax::end(); ?>
            </div>
        </div>

    </section>

</div>
