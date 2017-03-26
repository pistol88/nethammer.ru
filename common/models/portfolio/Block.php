<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "portfolio_item_block".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $name
 * @property integer $text
 *
 * @property PortfolioItem $item
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_item_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'name', 'text'], 'required'],
            [['item_id', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 155],
            [['text'], 'string'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Элемент',
            'name' => 'Название',
            'text' => 'Текст',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}
