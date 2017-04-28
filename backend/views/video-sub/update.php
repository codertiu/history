<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = Yii::t('main', 'Update {modelClass}: ', [
    'modelClass' => 'VideoSub',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
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
    $lang_model = \common\models\VideoSubLang::find()->andFilterWhere(['parent' => $model->id, 'lang' => $language->id])->one();
    if(empty($lang_model) || $lang_model == NULL)  {
        $lang_model = new \common\models\VideoSubLang();
        $action = "/video-sub-lang/create";
    }
    else
    {
        $lang_model = \common\models\VideoSubLang::findOne($lang_model->id);
        $action = "/video-sub-lang/update?id=".$lang_model->id;
    }
    $lang_model->parent = $model->id;
    $lang_model->lang = $language->id;
    $langs[] = [
        'label' => $language->name,
        'content' => $this->render('//video-sub-lang/_form',['model' => $lang_model, 'action' => $action, 'id' => $language->id]),
        'active' => $tab==$language->id?true:false
    ];
}


?>
    <div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel panel-default">
    <div class="panel-body">
    <?= \yii\bootstrap\Tabs::widget(['items' => $langs]) ?>
    </div>
    </div>
</div>

<?php Yii::$app->session->set('tab',0); ?>