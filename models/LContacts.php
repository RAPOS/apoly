<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_contacts".
 *
 * @property integer $site
 * @property string $text_form
 * @property string $text_place
 * @property string $text_contact
 * @property string $keywords
 * @property string $description
 */
class LContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site'], 'required'],
            [['site'], 'integer'],
            [['text_form', 'text_place', 'text_contact', 'keywords', 'description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site' => 'Site',
            'text_form' => 'Текст формы',
            'text_place' => 'Местоположение',
            'text_contact' => 'Контактные данные',
            'keywords' => 'Ключевые слова, через запятую',
            'description' => 'Описание',
        ];
    }
}
