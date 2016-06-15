<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_banners".
 *
 * @property integer $id
 * @property integer $id_image
 * @property string $header
 * @property string $link_more
 */
class LBanners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_image', 'header', 'link_more'], 'required'],
            [['id_image'], 'integer'],
            [['link_more'], 'string'],
            [['header'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'id_image' => 'Id Image',
            'header' => 'Заголовок',
            'link_more' => 'Ссылка на «Подробнее»',
        ];
    }
    
    public function lastID()
    {
        $this->find()->orderBy('id DESC')->one();
    }
    
    public function imagePath()
    {
        $LImages = LImages::findOne(['id_image' => $this->id_image]);
        
        return $LImages->path;
    }
}
