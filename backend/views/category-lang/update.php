<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryLang */

$this->title = Yii::t('main', 'Update {modelClass}: ', [
    'modelClass' => 'Category Lang',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Category Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="category-lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
