<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_images".
 *
 * @property integer $id_image
 * @property string $name
 * @property string $path
 * @property string $extension
 * @property boolean $status
 */
class LImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'extension'], 'required'],
            [['status'], 'boolean'],
            [['name'], 'string', 'max' => 64],
            [['path'], 'string', 'max' => 256],
            [['extension'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_image' => 'Id Image',
            'name' => 'Name',
            'path' => 'Path',
            'extension' => 'Extension',
            'status' => 'Status',
        ];
    }
}
