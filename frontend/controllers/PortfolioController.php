<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\portfolio\Item;
use common\models\portfolio\Category;
use common\models\Page;

class PortfolioController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex()
    {
        $categories = Category::find()->orderBy('sort DESC')->all();

        $items = Item::find()->orderBy('date DESC, id DESC')->all();

        $page = Page::find()->where(['template' => 'portfolio'])->one();

        return $this->render('index', [
            'categories' => $categories,
            'items' => $items,
            'page' => $page,
        ]);
    }
}
