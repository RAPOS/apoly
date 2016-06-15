<?php
/**
 * Created by PhpStorm.
 * User: Aliscom4
 * Date: 10.05.2016
 * Time: 16:26
 */
use app\models\LImages;
if (isset($model->status)) {
    $this->title = 'Акции - ' . $model->header;
} else {
    $this->title = 'Статьи - ' . $model->header;
}
?>
<div class="page text-center">
    <div class="page-item">
        <h3><?=$model->header?></h3>
		<?
		$model_images = json_decode($model->id_image);
		$LImages = LImages::findOne($model_images);
		if($LImages->path && file_exists(Yii::getAlias('@webroot/'.$LImages->path))){
			$image = Yii::$app->image->load(Yii::getAlias('@webroot/'.$LImages->path));
			$image->save(Yii::getAlias('@webroot/assets/'.$LImages->name.'.'.$LImages->extension));
			?>			
			<img class="img-responsive" src="<?='/assets/'.$LImages->name.'.'.$LImages->extension?>" alt="">
		<?}?>
        <p><?=$model->text?></p>
        <?if (isset($model->status)) {
            if ($model->status) {?>
                <p>Действует до <?=$model->date?></p>
            <?} else {?>
                <p style="color: red;">Акция закончена</p>
            <?}
        }?>
        <div class="share">
            <button class="gbutton" onclick="$('.bubble').css('display', ($('.bubble').css('display') == 'none') ? 'block' : 'none')">Поделиться статьей</button>
            <div class="bubble">
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,surfingbird,tumblr,viber,whatsapp"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.page-article img').each(function (i, element) {
        if (!$(this).hasClass('img-responsive')) {
            $(this).addClass('img-responsive');
        }
        $(this).css({'box-shadow': '0 0 10px rgba(0,0,0,0.5)'})
    })
</script>