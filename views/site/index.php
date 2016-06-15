<?php

/* @var $this yii\web\View */
use app\models\LImages;
?>
<div class="page" style="margin-top: -70px;">
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
		<div class="row">
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
								<img style="box-shadow: 0 0 10px rgba(0,0,0,0.5);" class="img-responsive" src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">
							<?}?>
							<h3><?=$value->header?></h3>
							<p><?=$value->text?></p>
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
    </div>
</div>