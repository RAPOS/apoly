<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_productions".
 *
 * @property integer $id
 * @property string $header
 * @property string $text
 * @property integer $id_image
 * @property integer $date
 * @property integer $cost
 */
class LProductions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_productions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'text', 'text', 'date', 'cost',], 'required'],
            [['text'], 'string'],
            [['id_image'], 'integer'],
            [['header', 'date'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_image' => 'Id Image',
            'header' => 'Заголовок',
            'text' => 'Описание',
            'date' => 'Дата добавления',
            'cost' => 'Цена',
        ];
    }
}
