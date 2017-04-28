<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $parent
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property string $icon2
 * @property integer $created_date
 * @property integer $update_date
 * @property integer $creator
 * @property integer $order
 * @property integer $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const HEADER = 0;
    const LEFT_SIDE = 1;
    const FOOTER = 2;
    const FOOTER2 = 3;
    const SERVICES = 4;
    const GOVERMENT = 5;
    const OPEN_DATA = 6;
    const USEFUL = 7; 

    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'parent', 'created_date', 'update_date', 'creator', 'order', 'status'], 'integer'],
            [['name', 'url', 'created_date', 'creator'], 'required'],
            [['name', 'url'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'type' => Yii::t('main', 'Type'),
            'parent' => Yii::t('main', 'Parent'),
            'name' => Yii::t('main', 'Name'),
            'url' => Yii::t('main', 'Url'),
            'created_date' => Yii::t('main', 'Created Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'creator' => Yii::t('main', 'Creator'),
            'order' => Yii::t('main', 'Order'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function getMenuLang(){
        return $this->hasMany(MenuLang::classname(),['menu_id'=>'id']);
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
