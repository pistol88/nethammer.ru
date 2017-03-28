<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\blog\Post;
use common\models\blog\Category;
use common\models\Page;

class BlogController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex($category = null)
    {
        $categories = Category::find()->orderBy('sort DESC')->all();

        $posts = Post::find()->orderBy('date DESC, id DESC')->limit(10)->all();

        $post = current($posts);

        $page = Page::find()->where(['template' => 'portfolio'])->one();

        return $this->render('index', [
            'categories' => $categories,
            'posts' => $posts,
            'post' => $post,
            'page' => $page,
        ]);
    }

    public function actionRead($id)
    {
        $categories = Category::find()->orderBy('sort DESC')->all();

        $items = Item::find()->orderBy('date DESC, id DESC')->all();

        $page = Page::find()->where(['template' => 'portfolio'])->one();

        return $this->render('index', [
            'categories' => $categories,
            'items' => $items,
            'page' => $page,
        ]);
    }
}
