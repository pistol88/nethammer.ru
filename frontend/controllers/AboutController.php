<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Partner;
use common\models\Review;
use common\models\Page;

class AboutController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex()
    {
        $partners = Partner::find()->orderBy('id DESC')->all();

        $reviews = Review::find()->orderBy('id DESC')->all();

        $page = Page::find()->where(['template' => 'about-us'])->one();

        return $this->render('index', [
            'page' => $page,
            'partners' => $partners,
            'reviews' => $reviews,
        ]);
    }
}
