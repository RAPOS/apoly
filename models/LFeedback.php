<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_feedback".
 *
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $subject
 * @property string $text
 * @property string $date
 * @property string $response
 * @property string $ip
 */
class LFeedback extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name', 'subject', 'text', 'verifyCode'], 'required'],
            [['text', 'response'], 'string'],
            [['date'], 'safe'],
            [['email', 'name', 'subject', 'ip'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'E-mail',
            'name' => 'Имя',
            'subject' => 'Тема письма',
            'text' => 'Сообщение',
            'date' => 'Дата',
            'response' => 'Ответ',
            'ip'  => 'IP',
            'verifyCode' => 'Проверочный код',
        ];
    }
}
