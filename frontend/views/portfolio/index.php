<?php
use yii\helpers\Url;

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
            <div class=row">
                <div class="col-md-12"><?=$page->text;?></div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <div class="description">
                        <?=$page->name;?>
                    </div>
                    <ul id="filters">
                        <li class="active"><a data-filter="*">Все</a></li>
                        <?php foreach($categories as $category) { ?>
                            <li><a data-filter=".category<?=$category->id;?>"><?=$category->name;?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="portfolio-list">
                        <?php foreach($items as $item) { ?>
                            <div class="item dark isotope-item category<?=$item->category_id;?>">
                                <a href="<?=Url::toRoute(['/portfolio/item', 'id' => $item->id]);?>" style="background-image:url(<?=$item->image->getUrl('420x');?>)">
                                    <p class="h3"><?=$item->name;?></p>
                                    <div class="descript"><?=$item->anons;?></div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>