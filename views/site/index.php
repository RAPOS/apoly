<?php

/* @var $this yii\web\View */
use app\models\LImages;
?>
<div class="page">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="element-main"><div></div></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6" style="height: 1px;background: #cacccd;"></div>
	</div>
    <div class="row products">
		<div class="title-main">
			<img class="img-responsive" src="/images/1.png"/>
			<h2>Популярная продукция</h2>
			<div class="circle-main"></div>
		</div>
		<div class="clearfix">
			<?if($modelproductions){?>
				<?foreach ($modelproductions as $key => $value) {?>
					<div class="col-xs-12 col-md-3">
						<div class="production-item">
							<?
							$model_images = json_decode($value->id_image);
							$LImages = LImages::findOne($model_images);
							if($LImages->path && file_exists(Yii::getAlias('@webroot/'.$LImages->path))){
								$image = Yii::$app->image->load(Yii::getAlias('@webroot/'.$LImages->path));
								$image->resize(400, 300);
								$image->save(Yii::getAlias('@webroot/assets/'.$LImages->name.'.'.$LImages->extension));
								?>
								<img <?/*style="box-shadow: 0 0 10px rgba(0,0,0,0.5);"*/?> class="img-responsive" src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">
							<?}?>
							<h3><a href="/productions/<?=$value->id?>"><?=$value->header?></a></h3>
							<p><?=mb_truncate($value->text, 250);?></p>
							<button class="lbutton">Заказать</button>
						</div>
					</div>
				<?}?>
			<?}?>
    	</div>
		<div class="title-main2">
			<img class="img-responsive" src="/images/2.png"/>
			<h2>Наши преимущества</h2>
			<div class="circle-main"></div>
		</div>
		<div class="clearfix advantages"> 
			<div class="col-xs-12 col-sm-4">
				<div class="p-1 text-right">
					<img src="/images/brave-01.png"/>
					<h3>Любой вид доставки</h3>
					<p>Уникальное торговое предложение<br>Идейные торговые соображения</p>
				</div>
				<div class="p-3 text-right">
					<img src="/images/brave-03.png"/>
					<h3>Всегда в наличии</h3>
					<p>Уникальное торговое предложение<br>Идейные торговые соображения</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-sm-push-4">
				<div class="p-2 text-left">
					<img src="/images/brave-02.png"/>
					<h3>Богатый опыт</h3>
					<p>Уникальное торговое предложение<br>Идейные торговые соображения</p>
				</div>
				<div class="p-4 text-left">
					<img src="/images/brave-04.png"/>
					<h3>Нам доверяют</h3>
					<p>Уникальное торговое предложение<br>Идейные торговые соображения</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-sm-pull-4">
				<div class="text-center">
					<img src="/images/logo-down.png"/>
					<br>
					<button class="gbutton order">Заказать звонок</button>
				</div>
			</div>			
		</div>
		<div class="title-main3">
			<img class="img-responsive" src="/images/3.png"/>
			<h2>Нам доверяют</h2>
			<div class="circle-main"></div>
		</div>
		<div class="clearfix partner"> 
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-1.png"/>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-2.png"/>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-3.png"/>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-4.png"/>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-5.png"/>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<img class="img-responsive center-block" src="/images/logos/l-6.png"/>
			</div>
		</div>
    </div>
</div>