<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\portfolio\Item */

$this->title =  $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="row">
        <div class="col-md-5">
            <h2>Блоки</h2>

            <?= GridView::widget([
                'dataProvider' => $blockDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}', 'controller' => 'portfolio-block'],
                ],
            ]); ?>
        </div>
        <div class="col-md-7">
            <h2>Новый</h2>
            <?php echo $this->render('../portfolio-block/_form', ['model' => $blockModel]); ?>
        </div>
    </div>

</div>
