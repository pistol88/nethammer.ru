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

    public function actionIndex($categoryId = null)
    {
        $categories = Category::find()->orderBy('sort DESC')->all();

        $posts = Post::find()->orderBy('date DESC, id DESC')->limit(10);

        if($categoryId) {
            $posts->where(['category_id' => $categoryId]);

            if(!$page = Category::findOne($categoryId)) {
                throw new NotFoundHttpException('Категории не существует.');
            }
        } else {
            $page = Page::find()->where(['template' => 'portfolio'])->one();
        }

        $posts = $posts->all();

        $post = current($posts);



        return $this->render('index', [
            'categories' => $categories,
            'posts' => $posts,
            'post' => $post,
            'page' => $page,
        ]);
    }

    public function actionRead($id)
    {
        if(!$post = Post::findOne($id)) {
            throw new NotFoundHttpException('Записи не существует.');
        }

        $categories = Category::find()->orderBy('sort DESC')->all();

        $posts = Post::find()->where(['category_id' => $post->category_id])->orderBy('date DESC, id DESC')->all();

        $post = Post::findOne($id);

        return $this->render('index', [
            'categories' => $categories,
            'posts' => $posts,
            'post' => $post,
            'page' => $post,
        ]);
    }
}
