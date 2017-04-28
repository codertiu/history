<?php
namespace frontend\widgets;
use common\models\Menu;
use yii\base\Widget;
class WMenu extends Widget
{
	public function run()
	{
		return $this->render('wMenu');
	}
}