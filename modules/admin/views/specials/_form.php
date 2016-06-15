<?php
use app\models\LImages;
use dosamigos\tinymce\TinyMce;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$array_image = array();
$array_image_cfg = array();
if (!$model->isNewRecord && $model->id_image) {
	$LImages = LImages::findOne($model->id_image);
	$array_image[] = Html::img('/'.$LImages->path, ['class'=>'file-preview-image', 'alt'=>$LImages->name, 'title'=>$LImages->name, 'style'=>'width: auto;height: 200px;']);
	$array_image_cfg[] = [
		'caption' => $LImages->name,
		'url' => '/admin/deleteimages/',
		'key' =>  $LImages->id_image,
		'extra' => ['delete_id_img' => $LImages->id_image, 'delete_path' => $LImages->path, 'page' => 'specials'],
	];
}
if (!$array_image && !$array_image_cfg) {
	$array_image = array();
	$array_image_cfg = array();
}
?>
<div class="lactions-form">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<?= $form->field($model, 'header')->input('text')?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<label class="control-label">Действует до</label>
			<?= DatePicker::widget([
				'name' => 'LActions[date]',
				'language' => 'ru',
				'value' => $model->date,
				'type' => DatePicker::TYPE_COMPONENT_PREPEND,
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-mm-yyyy'
				]
			]);?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
				'pluginOptions' => [
					'size' => 'normal',
					'onColor' => 'success',
					'offColor' => 'danger',
					'onText' => 'Вкл.',
					'offText' => 'Выкл.',
				],
			])?>
		</div>
	</div>
	<?= $form->field($model, 'text')->widget(TinyMce::className(), [
		'options' => ['rows' => 6],
		'language' => 'ru',
		'clientOptions' => [
			'plugins' => [
				"advlist autolink lists link charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		]
	]);?>
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
				'image' => ['width' => 'auto', 'height' => '200px'],
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
				$(".file-input").append(\'<input style="display: none;" type="text" data-name="\'+files[0]["name"]+\'" name="LActions[id_image]" value="\'+response.id_image+\'"/>\');
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
		<?= Html::a('Назад', ['/admin/specials/'], ['class'=>'btn btn-primary']) ?>
	</div>
    <?php ActiveForm::end(); ?>
</div>
<script>page = {files_count: 1};</script>