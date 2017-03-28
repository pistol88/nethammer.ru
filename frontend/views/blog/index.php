<?php
use yii\helpers\Url;

$this->title = $page->seo->title;

if(empty($this->title)) {
    $this->title = $page->name;
}

if($post->author && $post->author->profile->gravatar_email) {
    $gravatar = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $post->author->profile->gravatar_email ) ) ) . "&s=50";
} else {
    $gravatar = false;
}
?>
<div id="fullpage">

    <div class="container-fluid">
        <div class="col-sm-2 right-logo">
            <a href="index.php"><img src="/image/svg/logo.svg" alt=""></a>
        </div>
        <div class="container-fluid">
            <div class="clearfix"></div>
            <a style="margin-top:10px;" data-toggle="modal" data-target="#chuseTags" class="bttn-dashed pull-left">#Все</a>

            <div class="modal fade" id="chuseTags" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <ul id="tags-filter">
                                <li class="active"><a href="/blog/">#Все</a></li>
                                <div class="clearfix"></div>
                                <?php foreach($categories as $category) { ?>
                                    <li><a href="<?=Url::toRoute(['/blog/', 'category' => $category->id]);?>" title="<?=$category->name;?>">#<?=$category->name;?></a></li>
                                <?php } ?>
                            </ul>
                            <!--a href="#" class="bttn orange" data-dismiss="modal">Применить</a-->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="owl-carousel-tecnology">
        <?php $i = 0; foreach($posts as $toppost) { $i++; ?>
            <a href="<?=Url::toRoute(['/blog/read', 'id' => $toppost->id]);?>" class="item <?php if($i == 0) echo 'active'; ?>">
                <p class="title"><?=$toppost->name;?></p>
                <p class="date"><?= Yii::$app->formatter->asDate($toppost->date) ?></p>
                <?php if($toppost->author) { ?>
                    <p class="author"><?=$toppost->author->username;?></p>
                <?php } ?>

                <?php if($toppost->icon) { ?>
                    <img class="service" src="/image/<?=$toppost->icon;?>" alt="<?=$post->name;?>">
                <?php } ?>
            </a>
        <?php } ?>
    </div>

    <?php if($post) { ?>
        <div class="container item-page">
            <div class="row">
                <div class="col-xs-11 col-xs-offset-1 col-sm-10 col-sm-offset-2">

                    <div class="date"><?= Yii::$app->formatter->asDate($post->date) ?></div>
                    <div class="author"><?php if($post->category) { echo $post->category->name; } ?><?php if($post->author) { ?>, <a href="<?=$post->author->profile->website;?>" rel="nofollow">@<?=$post->author->username;?></a><?php } ?></div>

                    <div class="text">
                        <?php if($gravatar) { ?>
                            <img src="<?=$gravatar;?>" alt="<?=$post->author->username;?>" class="avatar">
                        <?php } ?>

                        <!-- Текст статьи -->
                        <p class="h3"><?=$post->name;?></p>

                        <?=$post->text;?>

                        <ul id="tags-list">
                            <li class="active"><a href="/blog/">#Все</a></li>
                            <?php if($post->category) { ?>
                                <li><a href="<?=Url::toRoute(['/blog/', 'categoryId' => $category->id]);?>">#<?=$category->name;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="comments">
                        <div class="clearfix">
                            Комментарии - 0
                        </div>
                        <div class="comment-item">
                            <div class="user-name">mrMaddy29</div>
                            <div class="comment-date">23 февраля 2017 в 12:26</div>
                            <div class="comment-text">
                                Хабр твитер и бла бла бла..
                            </div>
                            <a href="#commentForm" class="answer animate">Ответить</a>
                        </div>
                        <div class="comment-item">
                            <div class="user-name">mrMaddy29</div>→
                            <div class="user-name">mrMaddy29</div>
                            <div class="comment-date">23 февраля 2017 в 12:26</div>
                            <div class="comment-text">
                                Хабр твитер и бла бла бла..
                            </div>
                            <a href="#commentForm" class="answer animate">Ответить</a>
                        </div>
                        <form class="form-style" id="commentForm" action="">
                            <input style="float: left;margin-right: 30px;" type="text" placeholder="Имя">
                            <span>Для <b>avost</b></span>
                            <textarea name="" id="" cols="60" rows="5" placeholder="Комментарий"></textarea>
                            <a href="#" class="bttn orange" data-dismiss="modal">Прокомментировать</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>