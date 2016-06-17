<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/formicon.css',
        'css/site.css',
        'css/stylename.css',
        'css/jquery.fancybox.css',
        'css/component.css',
        'css/smartmedia.css',
    ];
    public $js = [
        //'js/banner.js',
        'js/functions.js',
        'js/jquery.fancybox.js',
        'js/modernizr.custom.js',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
