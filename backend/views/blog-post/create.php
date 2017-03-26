<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\blog\Post */

$this->title = 'Добавление поста';
$this->params['breadcrumbs'][] = ['label' => 'Посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
