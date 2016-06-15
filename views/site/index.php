<?php

/* @var $this yii\web\View */
use app\models\LImages;
?>
<div class="page text-center">
    <div class="page-head">
        <h2>Продукция</h2>
    </div>
    <div class="row products">
		<?if($modelproductions){?>
			<?foreach ($modelproductions as $key => $value) {?>	
				<div class="col-xs-12 col-md-3">
					<div class="production-item">
						<?
						$model_images = json_decode($value->id_image);
						$LImages = LImages::findOne($model_images);
						if($LImages->path && file_exists(Yii::getAlias('@webroot/'.$LImages->path))){
							$image = Yii::$app->image->load(Yii::getAlias('@webroot/'.$LImages->path));
							$image->resize(368, 240);
							$image->save(Yii::getAlias('@webroot/assets/'.$LImages->name.'.'.$LImages->extension));
							?>			
							<img src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">		
						<?}?>
						<h3><?=$value->header?></h3>
						<p><?=$value->text?></p>
						<button class="lbutton">Подробнее</button>
					</div>
				</div>
			<?}?>
		<?}?>
    </div>
</div>