<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LibraryLang */

$this->title = Yii::t('main', 'Create Library Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Library Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
