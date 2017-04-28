<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_sub".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $link
 * @property string $video
 * @property integer $video_id
 * @property integer $creator
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $status
 */
class VideoSub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_sub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'video_id', 'creator', 'created_date'], 'required'],
            [['description'], 'string'],
            [['video_id', 'creator', 'created_date', 'update_date', 'status'], 'integer'],
            [['name', 'link', 'video'], 'string', 'max' => 255],
            [['video'], 'file', 'extensions'=>'mp4, avi, mpeg, 3gp, flv']
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
            'link' => Yii::t('main', 'Link'),
            'video' => Yii::t('main', 'Video'),
            'video_id' => Yii::t('main', 'Video ID'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
    public function beforeDelete(){
        $models = VideoSubLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$this->video)){
        unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['video_sub'].$this->video);
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
