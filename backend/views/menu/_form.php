<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Menu;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->widget(Select2::classname(), [
            'id' => 'menu-type',
            'data' => Yii::$app->params['menu_types'],
            'options' => ['placeholder' => 'Select type ...'],
        ]); ?>

    <?= $form->field($model, 'parent')->widget(DepDrop::className(), [
        'type'=>DepDrop::TYPE_SELECT2,
//       'data'=>ArrayHelper::map(Menu::getLangModels('type=0 AND parent is null'),'id', 'name'),
        'options'=>['id'=>'subcat-id'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['menu-type'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/menu/subcat'])
        ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(
        [1=>Yii::t('main','active'), 0=>Yii::t('main','noactive')]  
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
