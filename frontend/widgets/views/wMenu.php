<?php
use common\models\Menu;
 
function getRun($id){
	$out = '';
	$name = Menu::find()->where('status=1')->andWhere(['id'=>$id,'type'=>0,])->one();
	$exist = Menu::find()->where('status=1')->andWhere(['parent'=>$id,'type'=>0]);
	if($exist->exists()){
		$out.='<li><a href="/'.substr(\Yii::$app->language, 0,2).$name->url.'"><div>'.$name->getLang('name').'</div></a>';
		$out.='<ul style="background-color:#AFDC89;">';
			$items = $exist->orderBy(['order'=>SORT_ASC])->all();
			foreach ($items as $item) {
				$out.=getRun($item->id);
			}
		$out.='</ul></li>';
	}else{
		$out.='<li><a href="/'.substr(\Yii::$app->language, 0,2).$name->url.'"><div>'.$name->getLang('name')."</div></a></li>";
	}
	return $out;
}

?>

<nav id="primary-menu" class="style-2 top-color">

                        <div class="container clearfix">

                            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                            <ul>
                                
					      	<?php
								$model = Menu::find()->where('status=1')->andWhere(['parent'=>NULL, 'type'=>0])->orderBy(['order'=>SORT_ASC])->all();
								foreach($model as $one){
									echo getRun($one->id);
								}
							?>  
                            </ul>

                            <!-- Top Search
                            ============================================= -->
                            <div id="top-search">
                                <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                                <form action="<?= \yii\helpers\Url::to(['site/search']) ?>" method="get">
                                    <input type="text" name="q" class="form-control" value="" style="color:#fff;" placeholder="<?= Yii::t('main','Qidiruv')?>">
                                </form>
                            </div><!-- #top-search end -->

                        </div>

                    </nav>