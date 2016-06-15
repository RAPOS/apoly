<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.05.2016
 * Time: 15:59
 */
use app\models\LImages;
$this->title = 'Акции';
?>
<div class="page text-center">
    <div class="page-head">
        <h2>Акции</h2>
    </div>
    <div class="row block-item">
        <?if($model){
			foreach ($model as $key => $value){?>
				<div class="col-sm-6 col-md-4 item">
					<?
					$model_images = json_decode($value->id_image);
					$LImages = LImages::findOne($model_images);
					if($LImages->path && file_exists(Yii::getAlias('@webroot/'.$LImages->path))){
						$image = Yii::$app->image->load(Yii::getAlias('@webroot/'.$LImages->path));
						$image->resize(400, 300);
						$image->save(Yii::getAlias('@webroot/assets/'.$LImages->name.'.'.$LImages->extension));
						?>			
						<img class="img-responsive" src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">		
					<?}?>
					<h3 style="color: #1b75b5;"><?=$value->header?></h3>
					<p>
						<?=mb_truncate($value->text, 250)?>
					</p>
					<div class="col-xs-6 more">
						<a href="/actions/<?=$value->id?>/">Подробно</a>
					</div>
					<div class="col-xs-6 button">
						<button type="submit" class="lbutton order">Оставить заявку</button>
					</div>
				</div>
			<?}
		}?>
    </div>
</div>