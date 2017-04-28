<?php

use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = Yii::t('main', 'Update {modelClass}: ', [
    'modelClass' => 'Menu',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');

if(Yii::$app->session->has('tab')) {
    $tab = Yii::$app->session->get('tab');
} else {
    $tab = 0;
    Yii::$app->session->set('tab',0);
}

$languages = \common\models\Lang::find()->where('status=1 AND not local="'.Yii::$app->params['main_language'].'"')->all();
$langs = [];
$langs[] = [
    'label' => Yii::t('main','На основном языке').' ('.Yii::$app->params['main_language'].')',
    'content' => $this->render('_form', [
        'model' => $model,
    ]),
    'active' => $tab==0?true:false,
];

foreach($languages as $language)
{
    $lang_model = \common\models\PageLang::find()->andFilterWhere(['parent' => $model->id, 'lang' => $language->id])->one();
    if(empty($lang_model) || $lang_model == NULL)  {
        $lang_model = new \common\models\PageLang();
        $action = "/page-lang/create";
    }
    else
    {
        $lang_model = \common\models\PageLang::findOne($lang_model->id);
        $action = "/page-lang/update?id=".$lang_model->id;
    }
    $lang_model->parent = $model->id;
    $lang_model->lang = $language->id;
    $langs[] = [
        'label' => $language->name,
        'content' => $this->render('//page-lang/_form',['model' => $lang_model, 'action' => $action, 'id' => $language->id]),
        'active' => $tab==$language->id?true:false
    ];
}
?>
    <div class="menu-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel panel-default">
    <div class="panel-body">
    <?= \yii\bootstrap\Tabs::widget(['items' => $langs]) ?>
    </div>
    </div>
</div>

<?php Yii::$app->session->set('tab',0); ?>