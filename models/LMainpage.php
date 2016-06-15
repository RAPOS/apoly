<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_mainpage".
 *
 * @property integer $site
 * @property string $images
 * @property string $text_activity
 * @property string $text_production
 * @property string $keywords
 * @property string $description
 */
class LMainpage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_mainpage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site', 'text_activity', 'text_production'], 'required'],
            [['site'], 'integer'],
            [['text_activity', 'text_production', 'keywords', 'description'], 'string'],
            [['site'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site' => 'Site',
            'text_activity' => 'Деятельность',
            'text_production' => 'Продукция',
            'keywords' => 'Ключевые слова, через запятую',
            'description' => 'Описание',
        ];
    }
}
