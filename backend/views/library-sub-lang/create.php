<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LibrarySubLang */

$this->title = Yii::t('main', 'Create Library Sub Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Library Sub Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-sub-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
