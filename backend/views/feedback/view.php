<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\feedback\Contact */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Форма с контактов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'person_name',
            'person_contacts',
            'text:ntext',
            'time',
        ],
    ]) ?>

</div>
