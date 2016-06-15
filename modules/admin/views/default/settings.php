<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.05.2016
 * Time: 12:04
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Настройки сайта';

if (!is_null($save)) print $this->render('_alert', ['save' => $save]);
?>
<div class="page text-center">
    <div class="page-head hidden-md hidden-lg">
        <h2>Настройки сайта</h2>
        <div></div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-sm-12 text-left">
            <ul class="breadcrumb">
                <li><?=Html::a('Панель управления', '/admin/')?></li>
                <li class="active">Настройки сайта</li>
            </ul>
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'site_name') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'link_vk') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'link_instagram') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'link_twitter') ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>