<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 */

$this->title = 'Voyage View ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Voyages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="voyage-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Voyage', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>


    <h3>
        <?= $model->name ?>    </h3>


    <?php $this->beginBlock('app\modules\admin\models\Voyage'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Customer',
                'format'=>'raw',
                'value' => Html::a($model->customer->fullName, ['/admin/customer/view', 'id' => $model->customer->id]),
            ],
            [
                'label' => 'Машина',
                'format'=>'raw',
                'value' => Html::a($model->car->fullName, ['/admin/car/view', 'id' => $model->car->id]),
            ],
            [
                'label' => 'Прицеп',
                'format'=>'raw',
                'value' => Html::a($model->trailer->fullName, ['/admin/trailer/view', 'id' => $model->trailer->id]),
            ],
            [
                'label' => 'Водитель',
                'format'=>'raw',
                'value' => Html::a($model->driver->fullName, ['/admin/driver/view', 'id' => $model->driver->id]),
            ],
            [
                'label' => 'Статус',
                'value' => $model->status->description,
            ],
            'name',
            'created_at',
            'updated_at',
            'description:ntext',
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



    <?=
    \yii\bootstrap\Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [[
                'label' => '<span class="glyphicon glyphicon-asterisk"></span> Voyage',
                'content' => $this->blocks['app\modules\admin\models\Voyage'],
                'active' => true,
            ],]
        ]
    );
    ?></div>
