<?php
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Сообщение от - '.$model->name;
?>
<div class="page text-center">
	<div class="page-head hidden-md hidden-lg">
		<h2>Контакты</h2>
		<div></div>
	</div>
	<div class="row" style="margin-top: 5px;">
		<div class="col-sm-12 text-left">
			<ul class="breadcrumb">
				<li><?=Html::a('Панель управления', '/admin/')?></li>
				<li><?=Html::a('Контакты', '/admin/feedback/')?></li>
				<li class="active"><?=$this->title?></li>
			</ul>
			<?php $form = ActiveForm::begin(); ?>
			<div class="clearfix">
				<div style="padding-left: 0;padding-right: 0;" class="col-xs-12 col-sm-7">
					<p style="padding: 10px;" class="bg-info">Тема: <span><?=$model->subject?></span></p>
					<div class="clearfix">
						<div style="padding-left: 0;padding-right: 80px;" class="col-xs-1">
							<img src="/images/panel/user.png" width="64"/>
						</div>
						<div style="padding: 10px;margin-top: 20px;" class="col-xs-6 bg-warning">
							<span><?=$model->name?></span>
						</div>
					</div>
					<div style="padding: 10px;" class="bg-success"><?=$model->text?></div>
					<?if($model->response){?>
						<div class="clearfix">
							<div style="padding-left: 0;padding-right: 80px;" class="col-xs-1">
								<img src="/images/panel/admin.png" width="64"/>
							</div>
							<div style="padding: 10px;margin-top: 20px;" class="col-xs-6 bg-warning">
								<span>Администратор</span>
							</div>
						</div>
						<div style="padding: 10px;padding-bottom: 1px;" class="bg-success"><?=$model->response?></div>
					<?}?>
				</div>
				<div class="col-xs-12 col-sm-1">
					<div style="margin-top: 20px;" class="visible-xs"></div>
				</div>
				<div style="padding: 10px;padding-right: 0;" class="col-xs-12 col-sm-4 bg-info">
					<p>
						<span>Дата:</span>
						<span><?=Yii::$app->formatter->asTime($model->date, 'php:d.m.Y');?></span>
					</p>
					<p>
						<span>Время:</span>
						<span><?=Yii::$app->formatter->asTime($model->date, 'php:H:i:s');?></span>
					</p>
					<p>
						<span>E-mail:</span>
						<span><?=$model->email?></span>
					</p>
					<p>
						<span>IP:</span>
						<span><?=$model->ip?></span>
					</p>
				</div>
			</div>
			<?if(!$model->response){?>
				<?= $form->field($model, 'response')->widget(TinyMce::className(), [
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
			<?}?>
			<br>
			<div class="form-group">
				<?if(!$model->response){?>
					<?=Html::submitButton('Ответить', ['class' => 'btn btn-success'])?>
				<?}?>
				<?= Html::a('Назад', ['/admin/feedback/'], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Удалить запись', ['delete', 'id' => $model->id], [
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Вы уверены, что хотите удалить?',
						'method' => 'post',
					],
				]) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
