<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Заявки';

?>
<div class="page text-center">
    <div class="page-head hidden-md hidden-lg">
        <h2>Заявки</h2>
        <div></div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-sm-12 text-left">
            <ul class="breadcrumb">
                <li><?=Html::a('Панель управления', '/admin/')?></li>
                <li class="active">Заявки</li>
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
                        'format' => ['date', 'php:d.m.Y H:i:s']
                    ],
                    'name',
                    'phone',
                ],
            ]); ?>
        </div>
    </div>
</div>
