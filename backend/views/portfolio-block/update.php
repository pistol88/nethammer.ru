<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\portfolio\Block */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item->name, 'url' => ['/portfolio-item/update', 'id' => $model->item->id]];
$this->params['breadcrumbs'][] = ['label' => 'Блоки'];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
