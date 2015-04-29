<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Owner $model
 */

$this->title = 'Список владельцев ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Владелец', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="owner-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Радактировать', ['update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить нового владельца', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Все владельцы', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>


    <h3>
        <?= $model->name ?>    </h3>


    <?php $this->beginBlock('app\modules\admin\models\Owner'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'surname',
            'name',
            'patronymic',
            'phone',
            'passport',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Вы действительно хотите удалить владельца?'),
            'data-method' => 'post',
        ]); ?>

    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('Cars'); ?>
    <?php
    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->cars,
    ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            'make_model',
            'color',
            'year',
            'reg_number',
            'reg_certificate',
            'mileage',
            'photo',
            'cost',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'car'
            ],
        ],
    ]); ?>

    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> Полный список машин',
            ['car/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> Добавить машину',
            ['car/create', 'Car' => ['owner_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [[
                'label' => '<span class="glyphicon glyphicon-asterisk"></span> Информация о владельце',
                'content' => $this->blocks['app\modules\admin\models\Owner'],
                'active' => true,
            ], [
                'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Машины</small>',
                'content' => $this->blocks['Cars'],
                'active' => false,
            ],]
        ]
    );
    ?></div>
