<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LibrarySub */

$this->title = 'Create Library Sub';
$this->params['breadcrumbs'][] = ['label' => 'Library Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-sub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
