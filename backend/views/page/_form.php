<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>
<?php Pjax::begin(); ?>
<div class="page-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]) ?>

    <?= $form->field($model, 'main_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'second_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'third_img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'status')->dropDownList(
            [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php Pjax::end() ?>