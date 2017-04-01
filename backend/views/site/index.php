<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Нетхаммер';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Все системы в норме!</h1>
    </div>

    <h2>Главная страница</h2>

    <p>
        <?= Html::a('Добавить слайд', ['/slide/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="body-content">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'link',
                'link_anchor',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}', 'controller' => 'slide'],
            ],
        ]); ?>
    </div>
</div>
