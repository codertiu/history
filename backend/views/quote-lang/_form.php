<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuoteLang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quote-lang-form">

    <?php $form = ActiveForm::begin(['action' => $action]); ?>

    <?= $form->field($model, 'lang')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'parent')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
