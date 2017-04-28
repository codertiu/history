<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuoteLang */

$this->title = Yii::t('main', 'Update {modelClass}: ', [
    'modelClass' => 'Quote Lang',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Quote Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="quote-lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
