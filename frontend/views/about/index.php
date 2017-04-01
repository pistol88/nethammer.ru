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
                <div class="hidden-xs col-sm-2">
                    <img src="/image/svg/molot.svg" alt="">
                </div>
                <div class="col-xs-12 col-sm-10">
                    <div class="description">
                        <?=$page->text;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container reviews">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <p class="block-title">Отзывы наших клиентов</p>
                    <div class="owl-carousel-review">
                        <?php $i = 0; foreach($reviews as $review) { $i++; ?>
                        <div class="item <?php if($i == 1) echo 'active'; ?>">
                            <em><?=$review->text;?></em>
                            <img src="<?=$review->getImage()->getUrl('100x');?>" alt="<?=$review->author_name;?>" width="100">
                            <p class="name"><?=$review->author_name;?></p>
                            <p class="position"><?=$review->author_position;?> <?=$review->company;?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container partners">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <p class="block-title">Партнеры</p>
                    <div class="row">
                        <?php foreach($partners as $partner) { ?>
                            <div class="col-sm-4">
                                <div class="partner">
                                    <img src="<?=$partner->getImage()->getUrl('100x');?>" alt="<?=$partner->name;?>" width="100">
                                    <p><?=$partner->name;?></p>
                                    <p><?=$partner->city;?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>