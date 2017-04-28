<?php
namespace frontend\controllers;
use Yii;
use common\models\Page;
use common\components\Controller;
class PageController extends Controller{
	public function actionView($url){
		$model = Page::findOne(['url'=>$url]);
		if($model){
			$this->setMeta($model->title, $model->description, $model->content);
			return $this->render('view',compact('model'));
		}else{
			$this->referre();
		}
	}
}
?>