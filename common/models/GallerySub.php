<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_sub".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $gallery_id
 * @property string $img
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $creator
 * @property integer $order
 * @property integer $status
 */
class GallerySub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_sub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'gallery_id', 'created_date', 'creator', 'order'], 'required'],
            [['description'], 'string'],
            [['gallery_id', 'created_date', 'update_date', 'creator', 'order', 'status'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
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
            'gallery_id' => Yii::t('main', 'Gallery ID'),
            'img' => Yii::t('main', 'Img'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'creator' => Yii::t('main', 'Creator'),
            'order' => Yii::t('main', 'Order'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
    public function beforeDelete(){
        $models = GallerySubLang::find()->filterWhere(['parent'=>$this->id])->all();
        foreach($models as $one){
            $one->delete();
        }
        if(is_file(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['gallery_img_sub'].$this->img)){
            unlink(realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['gallery_img_sub'].$this->img);
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
