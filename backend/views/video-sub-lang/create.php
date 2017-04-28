<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoSubLang */

$this->title = Yii::t('main', 'Create Video Sub Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Video Sub Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-sub-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
