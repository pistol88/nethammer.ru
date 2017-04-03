<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;

AppAsset::register($this);

$formModel = new \frontend\models\ContactForm;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" href="/image/favicon.png">
    <?php $this->head() ?>
</head>
<body class="bg-grad">
<?php $this->beginBody() ?>

<header class="container-fluid">
    <a href="#" data-toggle="modal" data-target="#callUs" class="bttn red pull-right">Стать клиентом</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <i class="fa fa-times" aria-hidden="true" style="display:none;"></i>
    </button>
    <div class="clearfix visible-xs"></div>
    <div class="container">
        <div class="collapse navbar-collapse" id="menu" role="navigation">
            <ul class="main-menu col-sm-offset-2 navbar">
                <li <?php if(yii::$app->controller->id  == 'portfolio') echo 'class="active"'; ?>><a href="/portfolio/">Портфолио</a></li>
                <li <?php if(yii::$app->controller->id  == 'services') echo 'class="active"'; ?>><a href="/services/">Услуги</a></li>
                <li <?php if(yii::$app->controller->id  == 'blog') echo 'class="active"'; ?>><a href="/blog/">Блог</a></li>
                <li <?php if(yii::$app->controller->id  == 'about') echo 'class="active"'; ?>><a href="/about/">О нас</a></li>
                <li <?php if(yii::$app->controller->id  == 'vacancies') echo 'class="active"'; ?>><a href="/vacancies/">Вакансии</a></li>
                <li <?php if(yii::$app->controller->id  == 'contacts') echo 'class="active"'; ?>><a href="/contacts/">Контакты</a></li>
            </ul>
        </div>
    </div>
</header>

<?=$content;?>


<div class="modal fade" id="callUs" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="pull-right" data-dismiss="modal" aria-hidden="true"><img src="/image/cross.png" alt=""></a>
                Стать клиентом
            </div>
            <div class="modal-body form-style">
                <?php $form = ActiveForm::begin(['action' => ['/contacts/']]); ?>
                <div style="width: 45%;float:left;">
                    <?= $form->field($formModel, 'name')->textInput(['style' => '', 'placeholder' => 'Имя'])->label(false) ?>
                </div>
                <div style="width: 45%;float:right">
                    <?= $form->field($formModel, 'email')->textInput(['style' => '', 'placeholder' => 'E-mail или телефон'])->label(false) ?>
                </div>
                <div style="clear:both">
                    <?= $form->field($formModel, 'info')->textarea(['rows' => 5, 'cols' => 60, 'placeholder' => 'Расскажите о задаче или задайте вопрос'])->label(false) ?>
                </div>
                <?= Html::submitButton('Отправить', ['class' => 'bttn blue', 'name' => 'contact-button']) ?>
                <?= $rezult ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

<?php if(Yii::$app->controller->id == 'site') { ?>
    <script>

        // Прокручивание колесиком
        var anchors = [];
        var currentAnchor = -1;
        var isAnimating  = false;
        $(function(){
            function updateAnchors() {
                anchors = [];
                $('.anchor').each(function(i, element){
                    anchors.push( $(element).offset().top );
                });
            }
            $('body').on('mousewheel', function(e){
                e.preventDefault();
                e.stopPropagation();
                if( isAnimating ) {
                    return false;
                }
                isAnimating  = true;
                // Increase or reset current anchor
                if( e.originalEvent.wheelDelta >= 0 ) {
                    currentAnchor--;
                } else {
                    currentAnchor++;
                }
                if( currentAnchor > (anchors.length - 1)
                    || currentAnchor < 0 ) {
                    currentAnchor = 0;
                }
                isAnimating  = true;
                $('html, body').animate({
                    scrollTop: parseInt( anchors[currentAnchor] )
                }, 800, 'swing', function(){
                    isAnimating  = false;
                });
            });
            updateAnchors();
        });

        // Смена активного пункта

        var lastId,
            topMenu = $(".main-menu"),
            topMenuHeight = topMenu.outerHeight() + 15,
            // Получаем список ссылок
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            });

        // Bind to scroll
        $(window).scroll(function() {
            // Get container scroll position
            var fromTop = $(this).scrollTop() + topMenuHeight;

            // Get id of current scroll item
            var cur = scrollItems.map(function() {
                if ($(this).offset().top < fromTop)
                    return this;
            });
            // Get the id of the current element
            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                    .parent().removeClass("active")
                    .end().filter("[href='#" + id + "']").parent().addClass("active");
            }
        });

    </script>
<?php } ?>


<script type="text/javascript">

    $('.owl-carousel-review').owlCarousel({
        nav:true,
        dots: false,
        loop:true,
        items: 1,
        animateInClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            }
        }
    });

    $('.owl-carousel-services').owlCarousel({
        nav:true,
        dots: false,
        loop: true,
        items: 1,
        animateInClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            }
        }
    });

    $('.owl-carousel-tecnology').owlCarousel({
        nav:false,
        dots: false,
        items: 7,
        animateInClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1024:{
                items:6
            }
        }
    });
</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter43730549 = new Ya.Metrika({ id:43730549, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/43730549" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
