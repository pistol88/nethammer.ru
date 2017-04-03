<?php
$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}
?>
<div id="fullpage">

    <?php $i = 0; foreach($slides as $key => $slide) { $i++; ?>
        <?php
        if($slide->hasImage()) {
            $slideImage = $slide->getImage()->getUrl();
        } elseif($slide->icon) {
            $slideImage = "/frontend/web/image/{$slide->icon}";
        } else {
            $slideImage = false;
        }
        ?>
        <section class="home-slide container-fluid anchor" id="<?=$slide->background;?>">
            <div class="container">
                <?php if(isset($slides[$key+1]) && $nextSLide = $slides[$key+1]) { ?>
                    <a class="animate" href="#slide<?=$nextSLide->id;?>"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <?php } ?>
                <div class="row">
                    <div class="hidden-xs col-sm-2">
                        <?php if($slideImage) { ?>
                            <img src="<?=$slideImage;?>" width="169" alt="<?=$slide->name;?>">
                        <?php } elseif($i == 1) { ?>
                            <img src="/image/svg/molot.svg" alt="Нетхаммер">
                        <?php } ?>
                    </div>
                    <div class="col-xs-12 col-sm-10">

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