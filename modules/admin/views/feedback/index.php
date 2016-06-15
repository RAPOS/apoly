<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Контакты';

if (!is_null($request_feedback) || !is_null($delete)) print $this->render('@app/modules/admin/views/default/_alert', ['request_feedback' => $request_feedback, 'delete' => $delete]);
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
				<li class="active">Контакты</li>
			</ul>
			<p>
				<?= Html::a('Информация на странице', ['description'], ['class' => 'btn btn-primary']) ?>
			</p>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					[
						'class' => 'yii\grid\SerialColumn'
					],
					'id',
					[
						'attribute' => 'date',
						'format' => ['date', 'php:d.m.Y']
					],
					[
						'attribute' => 'email',
						'format' => 'text',
						'contentOptions' => ['style' => 'width: 155px;'],
					],
					[
						'attribute' => 'name',
						'contentOptions' => ['style' => 'width: 155px;'],
					],
					[
						'attribute' => 'subject',
						'contentOptions' => ['style' => 'width: 155px;'],
					],
					[
						'class' => 'yii\grid\ActionColumn',
						'buttons' => ['update' => function ($url, $model, $key) {return false;}]
					],
				],
			]); ?>
		</div>
	</div>
</div>
