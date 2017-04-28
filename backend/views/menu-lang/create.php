<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MenuLang */

$this->title = 'Create Menu Lang';
$this->params['breadcrumbs'][] = ['label' => 'Menu Langs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
