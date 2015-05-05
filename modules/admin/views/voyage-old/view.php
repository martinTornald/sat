<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 */

$this->title = 'Просмотр перевозки ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Перевозки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
?>

<!-- VOYAGE-VIEW -->
<div class="voyage-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Редактировать', ['update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Дабавить', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Полный список', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>


    <?= $this->render('_nav', [
        'id' => $model->id,
        'type' => 'view',
    ]) ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Customer',
                'format' => 'raw',
                'value' => Html::a($model->customer->fullName, ['/admin/customer/view', 'id' => $model->customer->id]),
            ],
            [
                'label' => 'Машина',
                'format' => 'raw',
                'value' => Html::a($model->car->fullName, ['/admin/car/view', 'id' => $model->car->id]),
            ],
            [
                'label' => 'Прицеп',
                'format' => 'raw',
                'value' => Html::a($model->trailer->fullName, ['/admin/trailer/view', 'id' => $model->trailer->id]),
            ],
            [
                'label' => 'Водитель',
                'format' => 'raw',
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

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

</div>
<!-- //VOYAGE-VIEW -->
