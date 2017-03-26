<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\feedback\Vacancy */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Формы вакансий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vacancy_id',
            'person_name',
            'person_contacts',
            'person_about:ntext',
            'summary_file',
            'summary_link',
            'time',
        ],
    ]) ?>

</div>
