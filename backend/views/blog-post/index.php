<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\blog\Category;

/* @var $this yii\web\View */
/* @var $searchModel common\models\blog\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записи блога';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'category_id',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'category_id',
                    ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => 'Категория']
                ),
                'value' => 'category.name'
            ],
            'name',
            'date',
            // 'author_user_id',
            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
