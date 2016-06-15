<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.05.2016
 * Time: 01:07
 */
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

Yii::$app->assetManager->forceCopy = true;

$this->title = 'Контакты';

if (!is_null($save) || !is_null($captcha)) print $this->render('@app/modules/admin/views/default/_alert', ['save' => $save, 'captcha' => $captcha, 'contact' => true]);
?>
<div class="page text-center">
    <div class="page-head">
        <h2>Контакты</h2>
    </div>
    <div class="row page-contact" style="text-align: left;">
        <div class="col-xs-12 col-sm-4">
            <div class="block-head">
                <h3>Обратная связь</h3>
            </div>
            <p style="margin-top: 15px;">
                <?=$contacts->text_form?>
            </p>
            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <div class="col-xs-12">
                    <?= $form->field($feedback, 'name')->input('text', ['id' => 'name']) ?>
                </div>
                <div class="col-xs-12">
                    <?= $form->field($feedback, 'email')->input('text', ['id' => 'email']) ?>
                </div>
                <div class="col-xs-12">
                    <?= $form->field($feedback, 'subject')->input('text', ['id' => 'subject']) ?>
                </div>
                <div class="col-xs-12">
                    <?= $form->field($feedback, 'text')->textArea(['id' => 'text', 'rows' => '6']) ?>
                </div>
                <div class="col-sm-6 hidden-xs"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="copy" value="1">
                                Выслать копию письма на мою почту
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-8">
                    <?= $form->field($feedback, 'verifyCode')->widget(Captcha::className(), [
                        'captchaAction' => 'site/captcha',
                        'options' => [
                            'class' => 'form-control',
                            'style' => 'font-size: 24px;padding-left: 10px;padding-right: 10px;margin-left: 0px;height: 40px;',
                        ],
                        'template' => '<div class="row"><div class="col-xs-12 col-md-6">{image}</div><div class="col-xs-12 col-md-6">{input}</div></div>',
                    ])->label('Введите символы с картинки') ?>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <button type="submit" style="padding-left: 5px;padding-right: 5px;" class="lbutton">Отправить</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="block-head">
                                <h3>Местоположение</h3>
                            </div>
                            <p class="contact-right">
                                <?=$contacts->text_place?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="block-head">
                                <h3>Контактные данные</h3>
                            </div>
                            <p class="contact-right">
                                <?=$contacts->text_contact?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=p2LOJqafmswuj-yyqsYfPI6yl_nmd-6I&width=100%&height=100%&lang=ru_RU&sourceType=constructor&scroll=true"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
       $('#name').after('<span class="form-icon form-icon-user form-control-feedback" aria-hidden="true"></span>');
       $('#email').after('<span class="form-icon form-icon-envelope form-control-feedback" aria-hidden="true"></span>');
       $('#subject').after('<span class="form-icon form-icon-star form-control-feedback" aria-hidden="true"></span>');
       $('#text').after('<span class="form-icon form-icon-pencil form-control-feedback" aria-hidden="true"></span>');
    });
</script>