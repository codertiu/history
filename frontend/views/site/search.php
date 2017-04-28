<?php
\yii\web\View::registerMetaTag([
    'name' => 'description',
    'content' => \yii\helpers\Html::encode($q)
]);
\yii\web\View::registerMetaTag([
    'name' => 'content',
    'content' => \yii\helpers\Html::encode($q)
]);
\yii\web\View::registerMetaTag([
    'name' => 'title',
    'content' => \yii\helpers\Html::encode($q)
]);
	if($q == ""){
		echo Yii::t('main','Qidiruv bo\'sh');
	}else{
		echo Yii::t('main','Qidiruv Natijasi :'). \yii\helpers\Html::encode($q)."<br/>";
	foreach($query as $one){
		echo $one->id."<br/>";
		echo $one->title."<br/>";
	}
}
?>`