<?php
	foreach($model as $one){
		echo "<a href='/".substr(Yii::$app->language,0,2)."/post/view/".$one->url."'>".$one->title."</a><br/>";
	}
?>