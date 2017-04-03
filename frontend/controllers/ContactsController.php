<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Page;
use frontend\models\ContactForm;

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
        $model = new ContactForm();

        $result = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->request->post())) {
                \Yii::$app->session->setFlash('contactFormSubmitted', "Сообщение отправлено");
                $result = true;
            }

            $model = new ContactForm();
        }

        return $this->render('index', [
            'page' => $page,
            'result' => $result,
            'model' => $model,
        ]);
    }
}
