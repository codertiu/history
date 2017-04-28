<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Category::find()->where('status=1')->asArray()->all(),'id','name'),
    'language' => 'uz',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]) ?>

    <?= $form->field($model, 'main_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'second_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'third_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'ban')->checkbox() ?>

    <?= $form->field($model, 'status')->dropDownList(
        [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?> 

</div>
