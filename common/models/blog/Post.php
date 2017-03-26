<?php

namespace common\models\blog;

use Yii;

/**
 * This is the model class for table "blog_post".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $slug
 * @property string $date
 * @property integer $author_user_id
 * @property string $text
 *
 * @property BlogCategory $category
 * @property BlogPostToCategory[] $blogPostToCategories
 */
class Post extends \yii\db\ActiveRecord
{
    function behaviors()
    {
        return [
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
        return 'blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'author_user_id'], 'integer'],
            [['name', 'text'], 'required'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['name', 'slug'], 'string', 'max' => 155],
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
            'date' => 'Дата',
            'author_user_id' => 'Автор',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        if(empty($this->date)) {
            $this->date = date('Y-m-d H:i:s');
        }

        parent::beforeSave($insert);
    }
}
