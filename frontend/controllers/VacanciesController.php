<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Vacancy;
use common\models\Page;
use frontend\models\VacancyForm;

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

        $model = new VacancyForm();

        $result = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->request->post())) {
                \Yii::$app->session->setFlash('vacancyFormSubmitted', "Сообщение отправлено, заявка будет рассмотрена в течение 2х суток.");
                $result = true;
            }

            $model = new VacancyForm();
        }

        return $this->render('index', [
            'page' => $page,
            'vacancies' => $vacancies,
            'result' => $result,
            'model' => $model,
        ]);
    }
}
