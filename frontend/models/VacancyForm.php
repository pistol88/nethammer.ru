<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

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
        return Yii::$app->mailer->compose('contactForm', $post)
            ->setTo(yii::$app->settings->get('frontend.email'))
            ->setFrom($post['email'])
            ->setSubject('Форма вакансии от ' . Html::encode($post['name']))
            ->send();          
    }
}
