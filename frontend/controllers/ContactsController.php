<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Page;

class ContactsController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex()
    {
        $page = Page::find()->where(['template' => 'contacts'])->one();

        return $this->render('index', [
            'page' => $page,
        ]);
    }
}
