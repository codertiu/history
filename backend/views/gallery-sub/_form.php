<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Gallery;
/* @var $this yii\web\View */
/* @var $model common\models\GallerySub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-sub-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'gallery_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Gallery::find()->where('status=1')->asArray()->all(),'id','name'),
    'language' => 'uz',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]]); ?> 
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->widget(\kartik\file\FileInput::className()) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(
        [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
