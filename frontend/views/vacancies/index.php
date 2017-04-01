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
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
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
                        <form action="">
                            <em style="color: #ffa834" class="pull-right">Все поля обязательны для заполнения</em>
                            <input type="text" placeholder="Имя" style="clear:none;">
                            <input type="text" placeholder="E-mail или телефон" style="width: 280px;">
                            <textarea name="" id="" cols="60" rows="5" placeholder="Расскажите о себе"></textarea>
                            <div class="row upload-resume">
                                <div class="col-sm-8">
                                    <input type="file" placeholder="Не более 10 мб">
                                    <input style="display:none;" type="text" placeholder="Ссылка на резюме">
                                </div>
                                <div class="col-sm-4">
                                    Или <a href="#">ссылкой</a><a style="display:none;" href="#">файлом</a>
                                </div>
                            </div>
                            <a href="#" class="bttn blue" data-dismiss="modal">Отправить</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>