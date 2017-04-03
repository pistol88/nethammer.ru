<?php

namespace common\models\feedback;

use Yii;
use common\models\Vacancy as VacancyModel;

/**
 * This is the model class for table "vacancy_feedback".
 *
 * @property integer $id
 * @property integer $vacancy_id
 * @property string $person_name
 * @property string $person_contacts
 * @property string $person_about
 * @property string $summary_file
 * @property string $summary_link
 * @property string $time
 *
 * @property Vacancy $vacancy
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy_feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'person_name', 'person_contacts', 'time'], 'required'],
            [['vacancy_id'], 'integer'],
            [['person_about'], 'string'],
            [['time'], 'safe'],
            [['person_name', 'person_contacts', 'summary_file', 'summary_link'], 'string', 'max' => 95],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => VacancyModel::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vacancy_id' => 'Вакансия',
            'person_name' => 'Имя',
            'person_contacts' => 'Телефон или e-mail',
            'person_about' => 'О себе',
            'summary_file' => 'Файл резюме',
            'summary_link' => 'Ссылка на резюме',
            'time' => 'Время отправки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(VacancyModel::className(), ['id' => 'vacancy_id']);
    }
}
