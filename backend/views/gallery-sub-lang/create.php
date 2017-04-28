<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GallerySubLang */

$this->title = Yii::t('main', 'Create Gallery Sub Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Gallery Sub Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-sub-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
