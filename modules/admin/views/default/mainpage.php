<?php
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование - Главная страница';

if (!is_null($save)) print $this->render('_alert', ['save' => $save]);
?>
<div class="page text-center">
	<div class="page-head hidden-md hidden-lg">
		<h2>Главная страница</h2>
		<div></div>
	</div>
	<div class="row" style="margin-top: 5px;">
		<div class="col-sm-12 text-left">
			<ul class="breadcrumb">
				<li><?=Html::a('Панель управления', '/admin/')?></li>
				<li class="active">Главная страница</li>
			</ul>
			<?php $form = ActiveForm::begin(); ?>
				<h3>Раздел &laquo;О компании&raquo;</h3>
				<?= $form->field($model, 'text_activity')->widget(TinyMce::className(), [
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
				<?= $form->field($model, 'text_production')->widget(TinyMce::className(), [
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
				<h3>Для продвижения</h3>
				<?= $form->field($model, 'keywords')->input('text')?>
				<?= $form->field($model, 'description')->textArea(['id' => 'text', 'rows' => '6']) ?>
				<br>
				<div class="form-group">
					<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
					<?= Html::a('Назад', ['/admin/'], ['class'=>'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
		<div class="col-sm-1 hidden-xs"></div>
	</div>
</div>
