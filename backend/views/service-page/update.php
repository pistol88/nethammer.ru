<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\portfolio\Block */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service->name, 'url' => ['/service/update', 'id' => $model->service->id]];
$this->params['breadcrumbs'][] = ['label' => 'Подуслуги'];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
