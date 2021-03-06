<?php
use yii\helpers\Url;

$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}

$coverImage = false;
foreach($page->getImages() as $image) {
    if(!$image->isMain) {
        $coverImage = $image->getUrl();
    }
}
?>

<div id="fullpage" class="case">

    <section class="container-fluid">
        <div class="col-sm-2 right-logo">
            <a href="/"><img src="/image/svg/logo.svg" alt=""></a>
        </div>
        <div class="full-screen" <?php if($coverImage) { ?>style="background:url(<?=$coverImage;?>"<?php } ?>>
            <h1><?=$item->name;?></h1>
        </div>
        <ul class="col-sm-3 col-md-3 sidebarmenu">
            <?php $i = 0; foreach($item->blocks as $block) { $i++; ?>
                <li <?php if($i == 1) { ?>class="active"<?php } ?>><a class="animate" href="#block<?=$block->id;?>"><?=$i;?>. <?=$block->name;?></a></li>
            <?php } ?>
        </ul>
        <div class="col-sm-9 col-md-6 case-text">
            <?php $i = 0; foreach($item->blocks as $block) { $i++; ?>
                <div id="block<?=$block->id;?>"><h2><?=$block->name;?></h2><?=$block->text;?></div>
            <?php } ?>
        </div>

    </section>

</div>
