<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\LImages;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\LSettings;
use app\models\LBanners;

AppAsset::register($this);

$LSettings = LSettings::find()->where(['site' => 1])->one();
$LBanners = LBanners::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($LSettings->site_name . ' - ' . $this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('/images/logo.png', ['class' => 'brand-logo']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse  nav-custom',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            // Desctop view
            '<li>
				<a class="a-logo hidden-xs" href="/">
					<img class="nav-logo" src="/images/logo.png"/>
				</a>
			</li>',
            [
                'label' => 'Продукция',
                'url' => ['/site/productions'],
            ],
            [
                'label' => 'Акции',
                'url' => ['/site/actions'],
            ],
            [
                'label' => 'О компании',
                'url' => ['/site/about'],
            ],
            [
                'label' => 'Галерея',
                'url' => ['/site/gallery'],
            ],
            [
                'label' => 'Статьи',
                'url' => ['/site/articles'],
            ],
            [
                'label' => 'Контакты',
                'url' => ['/site/contacts'],
            ],
            '<li class="visible-lg">
				<button class="wbutton order" style="margin-left: 0px;padding-left: 13px;padding-right: 13px;">Заказать звонок</button>
			</li>',
            '<li class="visible-md visible-lg header-contact">
                <span class="icon-call"></span> 
				<span class="header-call">8(495)555-565</span>
                <br>
                <span class="icon-place"></span> 
				<span>
					<a href="/contacts/" class="header-place">Уфимская, 19</a>
				</span>
			</li>',
        ]
    ]);
    NavBar::end();
    ?>
    <?if ((Yii::$app->controller->id == 'site') && (Yii::$app->controller->action->id == 'index'))  {?>
        <div class="bg-top">
            <div class="bg-video embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" src="/files/apoly.mp4" autoplay="true" loop="true" preload="auto"></video>
            </div>
            <div class="bg-video-shadow"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 text-center">
                        <h1 class="h1-main">Продукция<br>из полиэтилена</h1>
                        <div class="div-main">
                            Уникальное торговое предложение. Идейные
                            соображения высшего порядка, а так же
                            укрепление и развитие структуры.
                        </div>
                        <div class="buttons-main">
                            <button type="submit" class="lbutton order">Заказать продукцию</button>
                            <button type="submit" class="wbutton" onclick="location.href = '/productions/'">Каталог продукции</button>
                        </div>
                        <div class="circle-main"></div>
                        <div class="element-main"><div></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        <div class="banner-main" style="margin-top: -20px;">
            <div  class="container">
				<div class="row" style="height:77px; border-left:1px solid #cacccd;">
					<div class="title-main4">
						<img class="img-responsive" src="/images/4.png"/>
						<h2>Отзывы</h2>
						<div class="circle-main"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<div id="cbp-fwslider" class="review-slider cbp-fwslider">
							<ul>
								<li>
									<div>
										<div class="row">
											<div class="col-sm-12 col-md-9 col-md-offset-3">
												<div class="col-sm-12 col-md-4 review_image">
													<div></div>
												</div>
												<div class="col-sm-12 col-md-8 review_info">
													<p class="review_name">Дмитрий Пригожин</p>
													<p class="review_job">Исполнительный директор «Северсталь»</p>
												</div>
											</div>									
										</div>										
										<p>"Просьба внимательно отнестиcь к ответам, т.к. это повлияет на качество, масштаб, сроки и стоимость предстоящих работ. Чем больше вы и ваши сотрудники погрузитесь в проект сейчас, тем большее удовлетворение получите от результата через несколько месяцев."</p>
									</div>
								</li>
								<li>
									<div>
										<div class="row">
											<div class="col-sm-12 col-md-9 col-md-offset-3">
												<div class="col-sm-12 col-md-4 review_image">
													<div></div>
												</div>
												<div class="col-sm-12 col-md-8 review_info">
													<p class="review_name">Дмитрий Пригожин</p>
													<p class="review_job">Исполнительный директор «Северсталь»</p>
												</div>
											</div>									
										</div>										
										<p>"Просьба внимательно отнестиcь к ответам, т.к. это повлияет на качество, масштаб, сроки и стоимость предстоящих работ. Чем больше вы и ваши сотрудники погрузитесь в проект сейчас, тем большее удовлетворение получите от результата через несколько месяцев."</p>
									</div>
								</li>
								<li>
									<div>
										<div class="row">
											<div class="col-sm-12 col-md-9 col-md-offset-3">
												<div class="col-sm-12 col-md-4 review_image">
													<div></div>
												</div>
												<div class="col-sm-12 col-md-8 review_info">
													<p class="review_name">Дмитрий Пригожин</p>
													<p class="review_job">Исполнительный директор «Северсталь»</p>
												</div>
											</div>									
										</div>										
										<p>"Просьба внимательно отнестиcь к ответам, т.к. это повлияет на качество, масштаб, сроки и стоимость предстоящих работ. Чем больше вы и ваши сотрудники погрузитесь в проект сейчас, тем большее удовлетворение получите от результата через несколько месяцев."</p>
									</div>
								</li>								
								<?if(count($LBanners)){
									for ($i = 0; $i < count($LBanners); $i++) {?>
										<li>
											<div>
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<div class="col-md-4 review_image">
															<div></div>
														</div>
														<div class="col-md-8 review_info">
															<p class="review_name"></p>
															<p class="review_job"></p>
														</div>
													</div>									
												</div>										
												<p></p>
											</div>
										</li>	
									 <?}					
								 }?>
							</ul>
						</div>				
					</div>				
				</div>				
            </div>
        </div>
        <div class="banner-contact" id="banner-contact">
			<div class="container text-center">
				<div class="col-md-12 text-center">
					<h3>Специальное предложение</h3>
				</div>
			</div>
            <div class="col-sm-6 hidden-xs text-right">
                <img src="/images/woman.png"/>
            </div>
            <div class="col-sm-6">
                <div class="contact-form">
                    <div>
                        Заполните форму обратной связи
                        и наш специалист свяжется с вами
                        в ближайшее время!
                    </div>
                    <form id="contactform">
                        <h3>Форма обратной связи</h3>
                        <input class="form-control" type="text" placeholder="ВВЕДИТЕ ВАШЕ ИМЯ" name="name"/>
                        <input class="form-control" type="text" placeholder="ВВЕДИТЕ НОМЕР ТЕЛЕФОНА" name="phone"/>
                        <button class="lbutton" onclick="return false;">Оставить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    <?} else {?>
        <div class="container">
            <?if (Yii::$app->controller->module->id == 'admin') {?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink'=>['label' => 'Панель управления', 'url' => '/admin/'],
                ]) ?>
                <div class="row">
                    <?if (!Yii::$app->user->isGuest) {?>
                        <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 0;">
                            <?echo Nav::widget([
                                'options' => ['class' => 'navbar-right nav-menu'],
                                'items' => [
                                    [
                                        'label' => 'Главная страница',
                                        'url' => ['/admin/mainpage'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Продукция',
                                        'url' => ['/admin/productions'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Акции',
                                        'url' => ['/admin/actions'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Галерея',
                                        'url' => ['/admin/gallery'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Статьи',
                                        'url' => ['/admin/articles'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Контакты',
                                        'url' => ['/admin/feedback'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Личные данные',
                                        'url' => ['/admin/userchange'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Баннеры',
                                        'url' => ['/admin/banners'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Настройки сайта',
                                        'url' => ['/admin/settings'],
                                    ],
                                    '<li class="divider"></li>',
                                    [
                                        'label' => 'Выход',
                                        'url' => ['/admin/logout'],
                                    ],
                                ],
                            ]);?>
                        </div>
                    <?} else {?>
                        <div class="col-md-1"></div>
                    <?}?>
                    <div class="col-md-10">
                        <?= $content ?>
                    </div>
                </div>
            <?} else {?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            <?}?>
        </div>
    <?}?>
</div>

<div class="order_form_wrapper">
    <div class="container">
        <div class="col-sm-4 hidden-xs"></div>
        <div class="col-sm-4">
            <div class="order_form block-center">
                <div class="order_form_close"></div>
                <p class="order_form_title">Заявка</p>
                <p class="order_form_text">Заполните и отправьте заявку<br> и наш специалист свяжется с Вами <br> в ближайшее время.</p>
                <div class="line"></div>
                <div class="form-group field-name required">
                    <label class="control-label" for="name">Имя*</label>
                    <input type="text" id="name" class="form-control" name="LOrder[name]">
                    <span class="form-icon form-icon-user form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group field-name required">
                    <label class="control-label" for="phone">Телефон*</label>
                    <input type="text" id="phone" class="form-control" name="LOrder[phone]">
                    <span class="form-icon form-icon-user form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group field-name required">
                    <button class="gbutton">Отправить заявку</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4 hidden-xs"></div>
	</div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <?= Html::encode($LSettings->site_name)?> 2009-<?= date('Y') ?>
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-6">
                <div class="clearfix">
                    <div>МЫ В СОЦСЕТЯХ</div>
                    <a class="footer-icon icon-instagram" href="<?=$LSettings->link_instagram?>" onclick="return false;"></a>
                    <a class="footer-icon icon-vk" href="<?=$LSettings->link_vk?>" onclick="return false;"></a>
                    <a class="footer-icon icon-twitter" href="<?=$LSettings->link_twitter?>" onclick="return false;"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/js/jquery.cbpFWSlider.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
