<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GallerySub */

$this->title = 'Create Gallery Sub';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-sub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
