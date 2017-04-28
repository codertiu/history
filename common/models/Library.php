<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "library".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $img
 * @property integer $seen
 * @property integer $creator
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $status
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'creator', 'created_date'], 'required'],
            [['description'], 'string'],
            [['seen', 'creator', 'created_date', 'update_date', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 150],
            [['img'],'file', 'extensions'=>'jpg, jpeg, gif, png'],
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
            'img' => Yii::t('main', 'Img'),
            'seen' => Yii::t('main', 'Seen'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
    public function beforeDelete(){
        $models = LibraryLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library'].$this->img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['library'].$this->img);
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
