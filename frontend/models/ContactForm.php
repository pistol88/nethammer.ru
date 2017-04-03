<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $info;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'info'], 'required'],
            ['name', 'string', 'length' => [4, 13]],
            ['email', 'string', 'length' => [4, 30]],
            ['email', 'match', 'pattern' => '/[0-9@]/i'],
            ['info', 'string', 'length' => [4]],
        ];
    }
    public function sendEmail($post)
    {
        return Yii::$app->mailer->compose('contactForm',
            ['name' => $post["name"], 'email'=>$post['email'],'info'=>$post["info"]])
            ->setTo(yii::$app->settings->get('frontend.email'))
            ->setFrom(yii::$app->settings->get('frontend.email'))
            ->setSubject('Форма контакты')
            ->send();          
    }
}
