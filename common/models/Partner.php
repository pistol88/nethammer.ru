<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $name
 * @property string $website
 * @property string $city
 */
class Partner extends \yii\db\ActiveRecord
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
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'website'], 'string', 'max' => 155],
            [['city'], 'string', 'max' => 55],
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
            'website' => 'Вебсайт',
            'city' => 'Город',
        ];
    }
}
