<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Video;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\VideoSub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-sub-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'video_id')->widget(Select2::classname(), [
            'id' => 'menu-type',
            'data' => ArrayHelper::map(Video::find()->where('status=1')->asArray()->all(),'id','name'),
            'options' => ['placeholder' => 'Select type ...'],
        ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList(
        [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
