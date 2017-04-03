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
                <div class="row">
                    <div class="hidden-xs col-sm-2">
                        <img src="/image/svg/molot.svg" alt="">
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <h1>
                            <?=$page->name;?>
                        </h1>
                        <?=$page->text;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container services">
            <div class="row">
                <?php foreach($services as $service) { ?>
                    <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                        <?php if($pages = $service->pages) { ?>
                            <?=$service->text;?>
                            <div class="owl-carousel-services">
                                <?php $i = 0; foreach($pages as $page) { $i++; ?>
                                    <div class="item <?php if($i == 1) echo 'active'; ?>">
                                        <img src="<?=$page->getImage()->getUrl('110x'); ?>" width="110" alt="<?=$page->name;?>">
                                        <p class="h3"><?=$page->name;?></p>
                                        <?=$page->text;?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <?php if($service->hasImage()) { ?>
                                <img class="pull-right" width="250" src="<?=$service->getImage()->getUrl('250x'); ?>" alt="">
                            <?php } ?>

                            <p class="h1"><?=$service->name;?></p>
                            <?=$service->text;?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</div>