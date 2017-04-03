<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<b>Имя:</b> <?=Html::encode($name)?> <br>
<b>E-mail или телефон:</b> <?=Html::encode($email)?> <br>
<b>Рассказ о себе: </b> <?=nl2br(Html::encode($info))?> <br>
<?php if($link) { ?>
    <b>Портфолио: </b> <a href="<?=Html::encode($link)?>"><?=Html::encode($link)?></a> <br>
<?php } ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
