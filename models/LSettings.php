<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_settings".
 *
 * @property integer $site
 * @property string $site_name
 * @property string $link_vk
 * @property string $link_instagram
 * @property string $link_twitter
 */
class LSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site', 'site_name', 'link_vk', 'link_instagram', 'link_twitter'], 'required'],
            [['site'], 'integer'],
            [['site_name', 'link_vk', 'link_instagram', 'link_twitter'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site' => 'Site',
            'site_name' => 'Название сайта',
            'link_vk' => 'Ссылка на VK.COM',
            'link_instagram' => 'Ссылка на Instagram',
            'link_twitter' => 'Ссылка на Twitter',
        ];
    }
}
