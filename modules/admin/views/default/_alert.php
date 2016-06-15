<?php
/**
 * Created by PhpStorm.
 * User: Aliscom4
 * Date: 19.05.2016
 * Time: 17:08
 */
use kartik\alert\Alert;

if (isset($captcha) && !$captcha) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'icon' => 'glyphicon glyphicon-remove-sign',
        'body' => 'Вы, неверно ввели проверочный код.',
        'showSeparator' => true,
        'delay' => 5000,
        'options' => [
            'style' => 'position: absolute;top: 0;right: 0;width: 400px;',
        ],
    ]);
}

if (!is_null($save)) {
    if($save){
        echo Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => $contact ? 'Сообщение отправлено' : 'Изменения успешно сохранены.',
            'showSeparator' => true,
            'delay' => 5000,
            'options' => [
                'style' => 'position: fixed;top: 100px;right: 0;width: 400px;',
            ],
        ]);
    } else {
        echo Alert::widget([
            'type' => Alert::TYPE_DANGER,
            'icon' => 'glyphicon glyphicon-remove-sign',
            'body' => $contact ? 'Не удалось отправить сообщение' : 'Не удалось сохранить.',
            'showSeparator' => true,
            'delay' => 5000,
            'options' => [
                'style' => 'position: fixed;top: 100px;right: 0;width: 400px;',
            ],
        ]);
    }
}

if ($error_login) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'icon' => 'glyphicon glyphicon-remove-sign',
        'body' => $error_login,
        'showSeparator' => true,
        'delay' => 5000,
        'options' => [
            'style' => 'position: absolute;top: 0;right: 0;width: 400px;',
        ],
    ]);
}

if (!is_null($request_feedback)) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'Сообщение успешно отправлено.',
        'showSeparator' => true,
        'delay' => 5000,
        'options' => [
            'style' => 'position: absolute;top: 0;right: 0;width: 400px;',
        ],
    ]);
}

if (!is_null($create)) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'Запись успешно добавлена.',
        'showSeparator' => true,
        'delay' => 5000,
        'options' => [
            'style' => 'position: absolute;top: 0;right: 0;width: 400px;',
        ],
    ]);
}

if (!is_null($delete)) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'Запись успешно удалена.',
        'showSeparator' => true,
        'delay' => 5000,
        'options' => [
            'style' => 'position: absolute;top: 0;right: 0;width: 400px;',
        ],
    ]);
}

if (Yii::$app->getSession()->has('request_feedback')) Yii::$app->getSession()->remove('request_feedback');
if (Yii::$app->getSession()->has('create')) Yii::$app->getSession()->remove('create');
if (Yii::$app->getSession()->has('delete')) Yii::$app->getSession()->remove('delete');
if (Yii::$app->getSession()->has('captcha')) Yii::$app->getSession()->remove('captcha');
if (Yii::$app->getSession()->has('save')) Yii::$app->getSession()->remove('save');
if (Yii::$app->getSession()->has('error_login')) Yii::$app->getSession()->remove('error_login');
