<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partner */

$this->title = 'Редактирование партнера: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="partner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
