<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property integer $id
 * @property string $content
 * @property string $author
 * @property integer $created_date
 * @property integer $status
 * @property integer $oreder
 * @property integer $category
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author', 'created_date', 'oreder', 'category'], 'required'],
            [['content'], 'string'],
            [['created_date', 'status', 'oreder', 'category'], 'integer'],
            [['author'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'content' => Yii::t('main', 'Content'),
            'author' => Yii::t('main', 'Author'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
            'oreder' => Yii::t('main', 'Oreder'),
            'category' => Yii::t('main', 'Category'),
        ];
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
