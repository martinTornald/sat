<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverTool $model
 */

$this->title = 'Driver Tool View ' . $model->driver_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Driver Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->driver_id, 'url' => ['view', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id]];
$this->params['breadcrumbs'][] = 'View';
?>

<!-- DRIVER-TOOL-VIEW -->
<div class="driver-tool-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Driver Tool', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>

    <?php $this->beginBlock('app\modules\admin\models\DriverTool'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Водитель',
                'format' => 'raw',
                'value' => Html::a($model->driver->fullName, ['/admin/driver/view', 'id' => $model->driver->id]),
            ],
            'tool_id',
            'date_of_issue',
            'date_delivery',
            'description:ntext',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id],
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
                'label' => '<span class="glyphicon glyphicon-asterisk"></span> Инструменты водителей',
                'content' => $this->blocks['app\modules\admin\models\DriverTool'],
                'active' => true,
            ],]
        ]
    );
    ?>
</div>
<!-- //DRIVER-TOOL-VIEW -->