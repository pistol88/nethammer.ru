<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $link
 * @property string $link_anchor
 */
class Slide extends \yii\db\ActiveRecord
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
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['text', 'background', 'icon'], 'string'],
            [['name'], 'string', 'max' => 155],
            [['link', 'link_anchor'], 'string', 'max' => 55],
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
            'text' => 'Текст',
            'link' => 'Сссылка',
            'link_anchor' => 'Анкор ссылки',
            'background' => 'Фоновое изображение',
            'icon' => 'Иконка'
        ];
    }
}
