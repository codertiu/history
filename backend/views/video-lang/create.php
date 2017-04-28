<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoLang */

$this->title = Yii::t('main', 'Create Video Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Video Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
