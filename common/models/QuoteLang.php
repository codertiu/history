<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quote_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $content
 * @property string $author
 */
class QuoteLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quote_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'content', 'author'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['content'], 'string'],
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
            'lang' => Yii::t('main', 'Lang'),
            'parent' => Yii::t('main', 'Parent'),
            'content' => Yii::t('main', 'Content'),
            'author' => Yii::t('main', 'Author'),
        ];
    }
}
