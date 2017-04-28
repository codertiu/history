<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $main_img
 * @property string $second_img
 * @property string $third_img
 * @property integer $creator
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $seen
 * @property integer $status
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'creator','url','created_date'], 'required'],
            [['description', 'content'], 'string'],
            [['creator', 'created_date', 'update_date', 'seen', 'status'], 'integer'],
            [['title','url'], 'string', 'max' => 255],
            [['main_img', 'second_img', 'third_img'], 'string', 'max' => 150],
            [['main_img', 'second_img', 'third_img'],'file','skipOnEmpty' => true,'extensions'=>'jpg, jpeg, gif, png','maxFiles' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'title' => Yii::t('main', 'Title'),
            'description' => Yii::t('main', 'Description'),
            'content' => Yii::t('main', 'Content'),
            'main_img' => Yii::t('main', 'Main Img'),
            'second_img' => Yii::t('main', 'Second Img'),
            'third_img' => Yii::t('main', 'Third Img'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'seen' => Yii::t('main', 'Seen'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function beforeDelete(){
        $models = PageLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$this->main_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_main_img'].$this->main_img);
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$this->second_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_second_img'].$this->second_img);
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$this->third_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['page_third_img'].$this->third_img);
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
