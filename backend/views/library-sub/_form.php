<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Library;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\LibrarySub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-sub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'library_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Library::find()->where('status=1')->asArray()->all(),'id','name'),
        'language' => 'uz',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ]]);  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'advanced',
        //'clientOptions' => ['contentsLangDirection'=>'rtl']
    ]) ?>

    <?= $form->field($model, 'img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'status')->dropDownList(
      [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
