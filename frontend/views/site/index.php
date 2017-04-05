<?php
$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}

$this->registerJs("
	function renderLogo() {
		if($(window).scrollTop() > jQuery('#command').height()-100) {
			$('.right-logo').show('slow');
			console.log(1);
		}
		else {
			$('.right-logo').hide();
			console.log(2);
		}
	}

	$(document).on('scroll', renderLogo);
    
    if($(window).width() < 640) {
        $('body').removeClass('no-scrolling');
    }
"); 
?>
<style>
.right-logo { display: none; }
</style>
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
				<?php if($i == 2) { ?>
					<div class="col-sm-2 right-logo">
						<a href="/"><img src="/image/svg/logo.svg" alt=""></a>
					</div>
				<?php } ?>
                <?php if(isset($slides[$key+1]) && $nextSLide = $slides[$key+1]) { ?>
                    <a class="animate" href="#<?=$nextSLide->background;?>"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
			<?php if($nextSLide && $i == 1) { ?>
				<div class="intro-scroller">
					<a class="inner-link animate" href="#<?=$nextSLide->background;?>">
						<div class="mouse-icon">
							<div class="wheel"></div>
						</div>
					</a> 
				</div>
			<?php } ?>
        </section>
    <?php } ?>

</div>