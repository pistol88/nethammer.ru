<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="row">
        <div class="col-md-5">
            <h2>Подуслуги</h2>

            <?= GridView::widget([
                'dataProvider' => $pageDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    [
                        'label' => 'Иконка',
                        'content' => function($model) {
                            return '<img src="'.$model->getImage()->getUrl('50x50').'" width="50" />';
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}', 'controller' => 'service-page'],
                ],
            ]); ?>
        </div>
        <div class="col-md-7">
            <h2>Новая</h2>
            <?php echo $this->render('../service-page/_form', ['model' => $pageModel]); ?>
        </div>
    </div>

</div>
