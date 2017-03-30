<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<span style="font-size: 27px;">⚒</span> Нетхаммер ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems = [['label' => 'Войти', 'url' => ['/user/security/login']]];
        $menuItemsTop = [['label' => 'Войти', 'url' => ['/user/security/login']]];
    } else {
        $menuItems = [
            ['label' => 'Информация', 'url' => '#', 'items' => [
                ['label' => 'Страницы', 'url' => ['/page/index']],
                ['label' => 'Услуги', 'url' => ['/service/index']],
                ['label' => 'Партнеры', 'url' => ['/partner/index']],
                ['label' => 'Отзывы', 'url' => ['/review/index']],
                ['label' => 'Слайды', 'url' => ['/slide/index']],
                ['label' => 'Вакансии', 'url' => ['/vacancy/index']],
            ]],
            ['label' => 'Блог', 'url' => '#', 'items' => [
                ['label' => 'Категории', 'url' => ['/blog-category/index']],
                ['label' => 'Записи', 'url' => ['/blog-post/index']],
            ]],
            ['label' => 'Портфолио', 'url' => '#', 'items' => [
                ['label' => 'Категории', 'url' => ['/portfolio-category/index']],
                ['label' => 'Работы', 'url' => ['/portfolio-item/index']],
            ]],
            ['label' => '<i class="glyphicon glyphicon-envelope"></i>', 'url' => '#', 'items' => [
                ['label' => 'С контактов', 'url' => ['/feedback/index']],
                ['label' => 'На вакансию', 'url' => ['/feedback-vacancy/index']],
            ]],
            ['label' => '<i class="glyphicon glyphicon-cog"></i>', 'url' => ['/settings/default/index']],
            ['label' => '<i class="glyphicon glyphicon-user"></i>', 'url' => ['/user/admin/index']],
        ];
        
        $menuItemsTop = [
            [
                'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
                'url' => ['/user/security/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ];
    }
    
    
    
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right main-menu nav'],
        'items' => array_merge($menuItems, $menuItemsTop),
    ]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Нетхаммер <?= date('Y') ?></p>

        <p class="pull-right">© <a href="http://dvizh.net/" target="_blank">Dvizh software</a> 2017</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
