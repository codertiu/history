<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\QuoteLang */

$this->title = Yii::t('main', 'Create Quote Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Quote Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quote-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
