<?php
namespace common\components;
use yii\web\UploadedFile;
class StaticFunction{
	public static function saveImage($file, $url){
		$file = UploadedFile::getInstance();
	}
}
?>