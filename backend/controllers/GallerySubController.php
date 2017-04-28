<?php

namespace backend\controllers;

use Yii;
use common\models\GallerySub;
use common\models\GallerySubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * GallerySubController implements the CRUD actions for GallerySub model.
 */
class GallerySubController extends Controller
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
     * Lists all GallerySub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GallerySub model.
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
     * Creates a new GallerySub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GallerySub();

        if ($model->load(Yii::$app->request->post())) {
            $model->creator = Yii::$app->user->identity->id;
            $model->created_date = date('U');
            $model->img = UploadedFile::getInstance($model, 'img');
            if($model->img){
                $name = md5($model->created_date.rand(1,10000)).'.'.$model->img->extension;
                $model->img->saveAs('../../'.Yii::$app->params['gallery_img_sub'].$name);
                $model->img = $name;
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
     * Updates an existing GallerySub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_img = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $model->update_date = date('U');
            $file = UploadedFile::getInstance($model, 'img');
            if($file){
                $name = md5($model->update_date.rand(1,10000)).'.'.$model->extension;
                $file->saveAs('../../'.Yii::$app->params['gallery_img_sub'].$name);
                $model->img = $name;
                if(is_file('../../'.Yii::$app->params['gallery_img_sub'].$old_img)){
                    unlink('../../'.Yii::$app->params['gallery_img_sub'].$old_img);
                }
            }else{
                $model->img = $old_img;
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
     * Deletes an existing GallerySub model.
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
     * Finds the GallerySub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GallerySub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GallerySub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
