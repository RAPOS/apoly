<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_about".
 *
 * @property integer $site
 * @property string $about
 * @property string $keywords
 * @property string $description
 */
class LAbout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site'], 'required'],
            [['site'], 'integer'],
            [['text', 'title', 'subtitle', 'keywords', 'description', 'images'], 'string'],
            [['site'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site' => 'Site',
            'text' => 'Описание',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'images' => 'Изображения',
            'keywords' => 'Ключевые слова, через запятую',
            'description' => 'Описание',
        ];
    }
}
