<?php
$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}
?>
<div id="fullpage">
<section class="container-fluid anchor" id="command" style="height: 100vh;">
            <div class="container">
                <a class="animate" href="#slide1"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <div class="row">
                    <div class="hidden-xs col-sm-2">
                    <img src="/image/svg/molot.svg" alt="">
                                            </div>
                    <div class="col-xs-12 col-sm-10">
                                                    <img class="logo" src="/frontend/web/image/svg/logo.svg" alt="Нетхаммер">
                                                <div class="description">
                            - команда профессиональных веб-разработчиков. Наши решения помогают клиентам и партнерам развивать свой бизнес.                        </div>

                                            </div>
                </div>
            </div>
        </section>
</div>