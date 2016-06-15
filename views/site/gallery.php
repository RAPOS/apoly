<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.05.2016
 * Time: 16:00
 */
use app\models\LImages;
$this->title = 'Галерея';
?>
<div class="page text-center">
    <div class="page-head">
        <h2>Галерея</h2>
    </div>
    <div class="row block-item">
		<?if($model){
			for ($i = 0;$i < count($model);$i++) {?>
				<div class="col-xs-2 item img">
					<?
					$model_images = json_decode($model[$i]->id_image);
					$LImages = LImages::findOne($model_images);
					if($LImages->path && file_exists(Yii::getAlias('@webroot/'.$LImages->path))){
						$image = Yii::$app->image->load(Yii::getAlias('@webroot/'.$LImages->path));
						$image->resize(173, 173);
						$image->save(Yii::getAlias('@webroot/assets/'.$LImages->name.'.'.$LImages->extension));
						?>
						<a class="zoomimage" rel="gallery-group" href="/<?=$LImages->path?>">
							<img style="box-shadow: 0 0 10px rgba(0,0,0,0.5);" class="left" src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">
						</a>
					<?}?>
				</div>
			<?}
		}?>
    </div>
</div>
