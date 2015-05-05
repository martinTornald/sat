<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Driver $model
 */

$this->title = 'Просмотр водителя ' . $model->fullName . '';
$this->params['breadcrumbs'][] = ['label' => 'Водители', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
?>

<!-- DRIVER-VIEW -->
<div class="driver-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Редактировать', ['update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Полный список', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>


    <h3><?= $model->name ?></h3>

    <?php $this->beginBlock('app\modules\admin\models\Driver'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'passport',
            'surname',
            'name',
            'patronymic',
            'address',
            'phone',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('DriverTools'); ?>
    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> List All Driver Tools',
            ['driver-tool/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> New Driver Tool',
            ['driver-tool/create', 'DriverTool' => ['driver_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Voyages'); ?>
    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> List All Voyages',
            ['voyage/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> New Voyage',
            ['voyage/create', 'Voyage' => ['driver_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>


    <?= \yii\bootstrap\Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [[
                'label' => '<span class="glyphicon glyphicon-asterisk"></span> Информация о водителе',
                'content' => $this->blocks['app\modules\admin\models\Driver'],
                'active' => true,
            ], [
                'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Выданные инструенты</small>',
                'content' => $this->blocks['DriverTools'],
                'active' => false,
            ], [
                'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Перевозки</small>',
                'content' => $this->blocks['Voyages'],
                'active' => false,
            ],]
        ]
    );
    ?>
</div>
<!-- //DRIVER-VIEW -->