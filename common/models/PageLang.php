<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $title
 * @property string $description
 * @property string $content
 */
class PageLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'title', 'description', 'content'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['description', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'lang' => Yii::t('main', 'Lang'),
            'parent' => Yii::t('main', 'Parent'),
            'title' => Yii::t('main', 'Title'),
            'description' => Yii::t('main', 'Description'),
            'content' => Yii::t('main', 'Content'),
        ];
    }
}
