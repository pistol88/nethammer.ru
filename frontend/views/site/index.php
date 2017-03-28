<?php
$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}
?>
<div id="fullpage">

    <?php $i = 0; foreach($slides as $slide) { $i++; ?>
        <?php
        if($slide->hasImage()) {
            $slideImage = $slide->getImage()->getUrl();
        } elseif($slide->icon) {
            $slideImage = "/frontend/web/image/{$slide->icon}";
        } else {
            $slideImage = false;
        }
        ?>
        <section class="container-fluid anchor" id="<?=$slide->background;?>">
            <div class="container">
                <a class="animate" href="#slide<?=$slide->id;?>"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <div class="row">
                    <div class="hidden-xs col-sm-2">
                        <?php if($slideImage) { ?>
                            <img src="<?=$slideImage;?>" width="169" alt="<?=$slide->name;?>">
                        <?php } ?>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <?php if($i == 1) { ?>
                            <img class="logo" src="/frontend/web/image/svg/logo.svg" alt="<?=yii::$app->name;?>">
                        <?php } ?>
                        <div class="description">
                            <?=nl2br($slide->text);?>
                        </div>

                        <?php if($slide->link) { ?>
                            <a class="link" href="<?=$slide->link;?>"><?=$slide->link_anchor;?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

</div>