<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' =>'yii\grid\CheckboxColumn',
                'checkboxOptions'=>function($data){
                    return ['value'=>$data->id];
                },
            ],
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'category_id',
                'value'=>'category.name'
            ],
            'title',
            'description:ntext',
            //'content:ntext',
            // 'main_img',
            // 'second_img',
            // 'third_img',
            // 'creator',
            // 'created_date',
            // 'update_date',
            // 'seen',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
