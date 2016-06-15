<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_gallery".
 *
 * @property integer $id_photo
 * @property integer $id_image
 */
class LGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_image'], 'required'],
            [['id_image'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_photo' => 'Id Photo',
            'id_image' => 'Id Image',
        ];
    }
}
