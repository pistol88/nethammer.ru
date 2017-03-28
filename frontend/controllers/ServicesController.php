<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\service\Service;
use common\models\Page;

class ServicesController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $services = Service::find()->orderBy('sort DESC')->all();

        $page = Page::find()->where(['template' => 'services'])->one();

        return $this->render('index', [
            'services' => $services,
            'page' => $page,
        ]);
    }
}
