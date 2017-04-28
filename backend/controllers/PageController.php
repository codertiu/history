<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if ($model->load(Yii::$app->request->post())) {
            $model->creator = Yii::$app->user->identity->id;
            $model->created_date = date('U');
            $model->seen = 0;
            $model->url = str_replace(" ","-",$model->title);
            $model->main_img = UploadedFile::getInstance($model, 'main_img');
            $model->second_img = UploadedFile::getInstance($model, 'second_img');
            $model->third_img = UploadedFile::getInstance($model, 'third_img');
            if($model->main_img){
                $img = md5($model->created_date.rand(1,10000)).'.'.$model->main_img->extension;
                $model->main_img->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$img);
                $model->main_img = $img;
            }
            if($model->second_img){
                $img2 = md5($model->created_date.rand(1,10000)).'.'.$model->second_img->extension;
                $model->second_img->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$img2);
                $model->second_img = $img2;
            }
            if($model->third_img){
                $img3 = md5($model->created_date.rand(1,10000)).'.'.$model->third_img->extension;
                $model->third_img->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$img3);
                $model->third_img = $img3;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);    
            }else{
                return print_r($model->errors);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_main = $model->main_img;
        $old_second = $model->second_img;
        $old_third = $model->third_img;
        if ($model->load(Yii::$app->request->post())) {
            $model->update_date = date('U');

            $new_main = UploadedFile::getInstance($model,'main_img');
            $new_second = UploadedFile::getInstance($model, 'second_img');
            $new_third = UploadedFile::getInstance($model, 'third_img');

            if($new_main){
                $img = md5($model->update_date.rand(1,10000)).'.'.$new_main->extension;
                $new_main->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$img);
                $model->main_img = $img;   
            
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$old_main)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$old_main);
                }
            }else{
                $model->main_img = $old_main;
            }
             if($new_second){
                $img2 = md5($model->update_date.rand(1,10000)).'.'.$new_second->extension;
                $new_second->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$img2);
                $model->second_img = $img2;   
            
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$old_second)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$old_second);
                }
            }else{
                $model->second_img = $old_second;
            }

             if($new_third){
                $img3 = md5($model->update_date.rand(1,10000)).'.'.$new_third->extension;
                $new_third->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$img3);
                $model->third_img = $img3;   
            
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$old_third)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$old_third);
                }
            }else{
                $model->third_img = $old_third;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);    
            }else{
                return print_r($model->errors);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
