<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Статьи';

if (!is_null($create) || !is_null($save) || !is_null($delete)) print $this->render('@app/modules/admin/views/default/_alert', ['create' => $create, 'save' => $save, 'delete' => $delete]);
?>
<div class="page text-center">
	<div class="page-head hidden-md hidden-lg">
		<h2>Статьи</h2>
		<div></div>
	</div>
	<div class="row" style="margin-top: 5px;">
		<div class="col-sm-12 text-left">
			<ul class="breadcrumb">
				<li><?=Html::a('Панель управления', '/admin/')?></li>
				<li class="active">Статьи</li>
			</ul>
			<p>
				<?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
			</p>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					'id',
					[
						'attribute' => 'date',
						'format' => ['date', 'php:d.m.Y']
					],
					[
						'attribute' => 'text',
						'format' => 'html',
						'contentOptions' => ['style' => 'width: 410px;'],
						'value' => function($data){
							return mb_truncate($data->text, 250);
						},
					],
					[
						'class' => 'yii\grid\ActionColumn',
						'buttons' => ['view' => function ($url, $model, $key) {return false;}]
					],
				],
			]); ?>
		</div>
	</div>
</div>
