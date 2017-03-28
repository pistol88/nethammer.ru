<?php

namespace common\models\service;

use Yii;

/**
 * This is the model class for table "service_page".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $name
 * @property string $text
 * @property integer $sort
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    function behaviors()
    {
        return [
            'images' => [
                'class' => 'pistol88\gallery\behaviors\AttachImages',
                'mode' => 'single',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['text'], 'string'],
            [['sort', 'service_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'service_id' => 'Сервис',
            'text' => 'Текст',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
