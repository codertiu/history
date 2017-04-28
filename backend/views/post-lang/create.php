<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PostLang */

$this->title = Yii::t('main', 'Create Post Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Post Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
