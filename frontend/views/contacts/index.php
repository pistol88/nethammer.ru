<?php
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
                <div class="col-sm-12 map">
                    <div>
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3AuRiVi3cQmPKeqTv7JCluHgE5jAUSC3K3&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=false"></script>
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
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <form class="description form-style" action="">
                        <input type="text" placeholder="Имя" style="width: 45%;float:left;margin-right:10%;">
                        <input type="text" placeholder="E-mail или телефон" style="width: 45%;">
                        <textarea name="" id="" cols="60" rows="5" placeholder="Расскажите о себе"></textarea>
                        <a href="#" class="bttn blue" data-dismiss="modal">Отправить</a>
                    </form>
                </div>
            </div>
        </div>

    </section>

</div>
