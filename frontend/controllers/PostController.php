<?php
namespace frontend\controllers;
use common\components\Controller;
use common\models\Post;

class PostController extends Controller{
	public function actionIndex(){
		$model = Post::find()->all();
		return $this->render('index',compact('model'));
	}

	public function actionView($url){
		$model = Post::findOne(['url'=>$url]);
		if($model){
			$this->setMeta($model->title, $model->description, $model->content);
			return $this->render('view',compact('model'));
		} else{
			return $this->referrer();
		}
	}
}