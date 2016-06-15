<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_actions".
 *
 * @property integer $id
 * @property integer $id_image
 * @property string $header
 * @property string $text
 * @property string $date
 * @property integer $status
 */
class LActions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_image', 'header', 'text', 'date', 'status'], 'required'],
            [['id_image', 'status'], 'integer'],
            [['text'], 'string'],
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
            'date' => 'Действует до',
            'status' => 'Статус',
        ];
    }
}
