<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoSub */

$this->title = 'Create Video Sub';
$this->params['breadcrumbs'][] = ['label' => 'Video Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-sub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
