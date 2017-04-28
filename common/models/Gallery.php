<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $name
 * @property integer $creared_date
 * @property integer $update_date
 * @property integer $creator
 * @property string $img
 * @property string $description
 * @property integer $seen
 * @property integer $order
 * @property integer $status
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_date', 'creator', 'description', 'order'], 'required'],
            [['created_date', 'update_date', 'creator', 'seen', 'order', 'status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions'=>'jpeg, jpg, gif, png']
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
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'creator' => Yii::t('main', 'Creator'),
            'img' => Yii::t('main', 'Img'),
            'description' => Yii::t('main', 'Description'),
            'seen' => Yii::t('main', 'Seen'),
            'order' => Yii::t('main', 'Order'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
    public function beforeDelete(){
        $models = GalleryLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['gallery_img'].$this->img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['gallery_img'].$this->img);
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
