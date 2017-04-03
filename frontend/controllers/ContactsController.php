<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Page;
use yii\widgets\Pjax;
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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->request->post())) {
                \Yii::$app->session->setFlash('contactFormSubmitted',"Сообщение отправлено");        
                $result="true";
            } else {
                $result="false";
            }
            $this->redirect(\Yii::$app->request->getReferrer());
            return $this->render('index', [
                'model' => $model,
                'result' =>  $result,
            ]);
        } else {
            return $this->render('index', [
                'page' => $page,
                'model' => $model,
            ]);
        }
        
    }
}
