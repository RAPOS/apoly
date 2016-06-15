<?php
use app\models\LImages;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$array_image = array();
$array_image_cfg = array();
if (!$model->isNewRecord && $model->id_image) {
	$LImages = LImages::findOne($model->id_image);
	$array_image[] = Html::img('/'.$LImages->path, ['class'=>'file-preview-image', 'alt'=>$LImages->name, 'title'=>$LImages->name, 'style'=>'width: auto;height: 342px;']);
	$array_image_cfg[] = [
		'caption' => $LImages->name,
		'url' => '/admin/deleteimages/',
		'key' =>  $LImages->id_image,
		'extra' => ['delete_id_img' => $LImages->id_image, 'delete_path' => $LImages->path, 'page' => 'banners'],
	];
}
if (!$array_image && !$array_image_cfg) {
	$array_image = array();
	$array_image_cfg = array();
}
?>
<div>
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<?= $form->field($model, 'header')->input('text')?>
		</div>
		<div class="col-xs-12 col-sm-6">
			<?= $form->field($model, 'link_more')->input('text')?>
		</div>
	</div>
	<?=FileInput::widget([
		'name' => 'image[]',
		'language' => 'ru',
		'options' => [
			'multiple' => false,
			'accept' => 'image/*',
		],
		'pluginOptions' => [
			'previewFileType' => 'image',
			'previewSettings' => [
				'image' => ['width' => 'auto', 'height' => '342px'],
			],
			'maxFileCount' => 1,
			'validateInitialCount' => true,
			'overwriteInitial' => false,
			'initialPreview' => $array_image,
			'initialPreviewConfig' => $array_image_cfg,
			'uploadUrl' => '/admin/upload/',
			'browseClass' => 'btn btn-success',
			'uploadClass' => 'btn btn-info',
			'removeClass' => 'btn btn-danger',
			'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
			'showRemove' => false,
		],
		'pluginEvents' => [
			'filepredelete' => 'function(event, key) {
				if($(".file-input .file-preview-frame").length == 1){
					$(".file-input .input-group").show();
				}
			}',
			'fileuploaded' => 'function(event, data, previewId, index){
				var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
				$(".file-input").append(\'<input style="display: none;" type="text" data-name="\'+files[0]["name"]+\'" name="LBanners[id_image]" value="\'+response.id_image+\'"/>\');
				if($(".file-input .file-preview-frame").length == 1){
					$(".file-input .input-group").hide();
				}
			}',
			'filesuccessremove' => 'function(event, id){
				if($(".file-input .file-preview-frame").length == 1){
					$(".file-input .input-group").show();
				}
			}',
		]
	]);?>
	<br>
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'btn btn-success']) ?>
		<?= Html::a('Назад', ['/admin/banners/'], ['class'=>'btn btn-primary']) ?>
	</div>
    <?php ActiveForm::end(); ?>
</div>
<script>page = {files_count: 1};</script>