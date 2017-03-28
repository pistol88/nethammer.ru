<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Vacancy;
use common\models\Page;

class VacanciesController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $vacancies = Vacancy::find()->all();

        $page = Page::find()->where(['template' => 'vacancy'])->one();

        return $this->render('index', [
            'vacancies' => $vacancies,
            'page' => $page,
        ]);
    }
}
