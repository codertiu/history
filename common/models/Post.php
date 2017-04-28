<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $category_id
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
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'ban','creator', 'created_date', 'update_date', 'seen', 'status'], 'integer'],
            [['category_id','title', 'url','description', 'content', 'creator', 'created_date'], 'required'],
            [['description', 'content'], 'string'],
            [['title','url'], 'string', 'max' => 255],
            [['main_img', 'second_img', 'third_img'], 'string', 'max' => 150],
            [['main_img', 'second_img', 'third_img'], 'file', 'extensions'=>'jpg, jpeg, gif, png','maxFiles' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category_id' => Yii::t('main', 'Category ID'),
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
            'ban'=>Yii::t('main','Banner')
        ];
    }
    public function getCategory(){
        return $this->hasOne(Category::classname(),['id'=>'category_id']);
    }

    public function beforeDelete()
    {
        $models = PostLang::find()->filterWhere(['parent' => $this->id])->all();
        foreach($models as $model) {
            $model->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_main_img'].$this->main_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_main_img'].$this->main_img);
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_second_img'].$this->second_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_second_img'].$this->second_img);
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_third_img'].$this->third_img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['post_third_img'].$this->third_img);
        }

        /*$models = Attach::find()->andFilterWhere(['parent' => $this->id, 'section' => Attach::POST])->all();
        foreach($models as $model) {
            $model->delete();
        }*/

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
