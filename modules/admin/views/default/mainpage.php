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
