<?php 

namespace backend\controllers;

use Yii;
use common\models\LibrarySub;
use common\modelsLibrarySubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * LibrarySubController implements the CRUD actions for LibrarySub model.
 */
class LibrarySubController extends Controller
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
     * Lists all LibrarySub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new modelsLibrarySubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibrarySub model.
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
     * Creates a new LibrarySub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibrarySub();

        if ($model->load(Yii::$app->request->post())) {
            $model->creator = Yii::$app->user->identity->id;
            $model->created_date = date('U');
            $model->img = UploadedFile::getInstance($model,'img');
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->img){
                $name = md5($model->created_date.rand(1,10000)).'.'.$model->img->extension;
                $model->img->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$name);
                $model->img =$name;
            }
            if($model->file){
                $name = md5($model->created_date.rand(1,10000)).'.'.$model->file->extension;
                $model->file->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_file'].$name);
                $model->file =$name;
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
     * Updates an existing LibrarySub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_img = $model->img;
        $old_file = $model->file;
        if ($model->load(Yii::$app->request->post())) {
            $model->update_date = date('U');
            $newImg = UploadedFile::getInstance($model,'img');
            $newFile = UploadedFile::getInstance($model, 'file');
            if($newImg){
                $name = md5($model->update_date.rand(1,10000)).'.'.$newImg->extension;
                $model->img->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$name);
                $model->img =$name;
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$old_img)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$old_img);
                }
            }else{
                $model->img = $old_img;
            }
            if($newFile){
                $name = md5($model->created_date.rand(1,10000)).'.'.$newFile->extension;
                $model->file->saveAs(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_file'].$name);
                $model->file =$name;
                if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$old_file)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$old_file);
                }
            }else{
                $model->file = $old_file;
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
     * Deletes an existing LibrarySub model.
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
     * Finds the LibrarySub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibrarySub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibrarySub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
