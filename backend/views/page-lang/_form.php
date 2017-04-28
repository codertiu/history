<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model common\models\PageLang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-lang-form">

    <?php $form = ActiveForm::begin(['action' => $action]); ?>

    <?= $form->field($model, 'lang')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'parent')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6,'id'=>$model->lang,],
        'preset' => 'full',
        'clientOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>