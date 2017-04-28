<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "library_sub".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $img
 * @property string $file
 * @property integer $library_id
 * @property integer $creator
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $status
 */
class LibrarySub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_sub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'library_id', 'creator', 'created_date'], 'required'],
            [['description', 'content'], 'string'],
            [['library_id', 'creator', 'created_date', 'update_date', 'status'], 'integer'],
            [['name', 'file'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 150],
            [['img'],'file', 'extensions'=>'jpg, jpeg, gif, png'],
            [['file'],'file', 'extensions'=>'pdf, docs, doc']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'description' => Yii::t('main', 'Description'),
            'content' => Yii::t('main', 'Content'),
            'img' => Yii::t('main', 'Img'),
            'file' => Yii::t('main', 'File'),
            'library_id' => Yii::t('main', 'Library ID'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
    public function beforeDelete(){
        $models = LibrarySubLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$this->img)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_sub'].$this->img);
                }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_file'].$this->file)){
                    unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library_file'].$this->file);
                }        
        return parent::beforeDelete();
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = \common\models\Lang::find()->where(['local' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model[$column];
    }
}
