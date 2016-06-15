<?php
use app\models\LImages;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

Yii::$app->assetManager->forceCopy = true;

$this->title = 'Редактирование - Галерея';

if (!is_null($save)) print $this->render('_alert', ['save' => $save]);

$array_image = array();
$array_image_cfg = array();
if (!$model->isNewRecord) {
	for ($i = 0; $i < count($model); $i++) {
		$LImages = LImages::findOne($model[$i]->id_image);
		$array_image[] = Html::img('/'.$LImages->path, ['class'=>'file-preview-image img-responsive', 'alt'=>$LImages->name, 'title'=>$LImages->name, 'style'=>'width: auto;height: 200px;']);
		$array_image_cfg[] = [
			'caption' => $LImages->name,
			'url' => '/admin/deleteimages/',
			'key' =>  $LImages->id_image,
			'extra' => ['delete_id_img' => $LImages->id_image, 'delete_path' => $LImages->path, 'id_images' => $array_id_images, 'page' => 'gallery'],
		];
	}
}
if (!$array_image && !$array_image_cfg) {
	$array_image = array();
	$array_image_cfg = array();
}
?>
<div class="page text-center">
	<div class="page-head hidden-md hidden-lg">
		<h2>Галерея</h2>
		<div></div>
	</div>
	<div class="row" style="margin-top: 5px;">
		<div class="col-sm-12 text-left">
			<ul class="breadcrumb">
				<li><?=Html::a('Панель управления', '/admin/')?></li>
				<li class="active">Галерея</li>
			</ul>
			<?php $form = ActiveForm::begin(); ?>
				<?=FileInput::widget([
					'name' => 'image[]',
					'language' => 'ru',
					'options' => [
						'multiple' => true,
						'accept' => 'image/*',
					],
					'pluginOptions' => [
						'previewFileType' => 'image',
						'previewSettings' => [
							'image' => ['width' => 'auto', 'height' => '200px'],
						],
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
						'fileuploaded' => 'function(event, data, previewId, index) {
							var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
							$(".file-input").append(\'<input style="display: none;" data-name="\'+response["name"]+\'" class="hidden-id" type="text" name="id_images[]" value="\'+response.id_image+\'"/>\');
						}',
					]
				]);?>
				<br>
				<div class="form-group">
					<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
					<?= Html::a('Назад', ['/admin'], ['class'=>'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>