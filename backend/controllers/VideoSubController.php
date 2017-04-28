<?php

namespace backend\controllers;

use Yii;
use common\models\VideoSub;
use common\models\VideoSubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * VideoSubController implements the CRUD actions for VideoSub model.
 */
class VideoSubController extends Controller
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
     * Lists all VideoSub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoSub model.
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
     * Creates a new VideoSub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VideoSub();

        if ($model->load(Yii::$app->request->post())) {
            $model->creator = Yii::$app->user->identity->id;
            $model->created_date = date('U');
            $model->video = UploadedFile::getInstance($model, 'video');
            if($model->video){
                $name = md5($model->created_date.rand(1,10000)).'.'.$model->video->extension;
                $model->video->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$name);
                $model->video = $name;
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
     * Updates an existing VideoSub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_video = $model->video;
        if ($model->load(Yii::$app->request->post())) {
            $model->update_date = date('U');
            $new = UploadedFile::getInstance($model, 'video');
            if($new){
                $name = md5($model->update_date.rand(1,10000)).$new->extention;
                $new->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$name);
                $model->video = $name;
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$old_video)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$old_video);
                }
            }else{
                $model->video = $old_video;
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
     * Deletes an existing VideoSub model.
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
     * Finds the VideoSub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VideoSub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VideoSub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
