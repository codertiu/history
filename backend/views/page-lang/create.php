<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PageLang */

$this->title = Yii::t('main', 'Create Page Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Page Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
