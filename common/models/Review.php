<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property string $author_name
 * @property string $author_position
 * @property string $company
 * @property string $text
 */
class Review extends \yii\db\ActiveRecord
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
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name', 'text'], 'required'],
            [['text'], 'string'],
            [['author_name', 'author_position', 'company'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Имя автора',
            'author_position' => 'Должность автора',
            'company' => 'Компания',
            'text' => 'Текст',
        ];
    }
}
