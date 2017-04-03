<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use common\models\feedback\Vacancy;

/**
 * VacancyForm is the model behind the vacancy form.
 */
class VacancyForm extends Model
{
    public $name;
    public $email;
    public $info;
    public $link;
    public $vacancy_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'info', 'vacancy_id'], 'required'],
            ['vacancy_id', 'integer'],
            ['name', 'string', 'length' => [4, 13]],
            ['email', 'string', 'length' => [4, 30]],
            ['email', 'match', 'pattern' => '/[0-9@]/i'],
            [['link', 'info'], 'string', 'length' => [4]],
        ];
    }
    public function sendEmail($post)
    {
        $post = $post['VacancyForm'];

        $vacancy = new Vacancy;
        $vacancy->vacancy_id = $post['vacancy_id'];
        $vacancy->person_name = $post['name'];
        $vacancy->person_contacts = $post['email'];
        $vacancy->person_about = $post['info'];
        $vacancy->summary_file = null;
        $vacancy->summary_link = $post['link'];
        $vacancy->time = date('Y-m-d H:i:s');
        if($vacancy->validate()) {
            $vacancy->save();
        }

        if(substr_count($post['email'], '@')) {
            $email = $post['email'];
        } else {
            $email = yii::$app->settings->get('frontend.email');
        }

        return Yii::$app->mailer->compose('contactForm', $post)
            ->setTo(yii::$app->settings->get('frontend.email'))
            ->setFrom($email)
            ->setSubject('Форма вакансии от ' . Html::encode($post['name']))
            ->send();          
    }
}
