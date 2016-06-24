<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $date
 */
class LOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'date'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'date' => 'Дата и время',
        ];
    }
}