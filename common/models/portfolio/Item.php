<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "portfolio_item".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $slug
 *
 * @property PortfolioCategory $category
 * @property PortfolioItemBlock[] $portfolioItemBlocks
 */
class Item extends \yii\db\ActiveRecord
{
    function behaviors()
    {
        return [
            'images' => [
                'class' => 'pistol88\gallery\behaviors\AttachImages',
                'mode' => 'single',
            ],
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
            ],
            'seo' => [
                'class' => 'pistol88\seo\behaviors\SeoFields',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'slug', 'date'], 'string', 'max' => 155],
            [['anons'], 'string', 'max' => 512],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'slug' => 'Слуг',
            'date' => 'Дата сдачи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlocks()
    {
        return $this->hasMany(Block::className(), ['item_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if(!$this->date) {
            $this->date = date('Y-m-d');
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub

        return true;
    }

    public function beforeDelete()
    {
        Block::deleteAll(['item_id' => $this->id]);

        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
