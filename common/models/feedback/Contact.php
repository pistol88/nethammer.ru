<?php

namespace common\models\feedback;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property string $person_name
 * @property string $person_contacts
 * @property string $text
 * @property string $time
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_name', 'person_contacts', 'text', 'time'], 'required'],
            [['text'], 'string'],
            [['time'], 'safe'],
            [['person_name', 'person_contacts'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_name' => 'Имя',
            'person_contacts' => 'Телефон или e-mail',
            'text' => 'Текст',
            'time' => 'Время отправления',
        ];
    }
}
