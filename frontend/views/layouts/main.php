<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
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
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/portfolio/')) echo 'class="active"'; ?>><a href="/portfolio/">Портфолио</a></li>
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/services/')) echo 'class="active"'; ?>><a href="/services/">Услуги</a></li>
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/blog/')) echo 'class="active"'; ?>><a href="/blog/">Блог</a></li>
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/about/')) echo 'class="active"'; ?>><a href="/about/">О нас</a></li>
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/vacancies/')) echo 'class="active"'; ?>><a href="/vacancies/">Вакансии</a></li>
                <li <?php if(substr_count($_SERVER['REQUEST_URI'], '/contacts/')) echo 'class="active"'; ?>><a href="/contacts/">Контакты</a></li>
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
                <input type="text" placeholder="Имя">
                <input class="error" type="text" placeholder="E-mail или телефон" style="width: 280px;">
                <textarea name="" id="" cols="60" rows="5" placeholder="Расскажите о себе"></textarea>
                <a href="#" class="bttn blue" data-dismiss="modal">Отправить</a>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

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
