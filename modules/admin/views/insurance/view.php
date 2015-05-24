<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Insurance $model
 */

$this->title = 'Insurance View ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Страховые полисы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->car->fullName, 'url' => ['view', 'car_id' => $model->car_id]];
?>

<!-- INSURANCE-VIEW -->
<div class="insurance-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Редактировать', ['update', 'car_id' => $model->car_id],
            ['class' => 'btn btn-info']) ?>
        <!--
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['create'], ['class' => 'btn
        btn-success']) ?> -->
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Полный список', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>

    <?= $this->render('/car/_nav', [
        'id' => $model->car_id,
        'type' => 'view',
    ]) ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Машина',
                'format' => 'raw',
                'value' => Html::a($model->car->fullName, ['/admin/car/view', 'id' => $model->car->id]),
            ],
            'name',
            'createdAt',
            'term',
            'description:ntext',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'car_id' => $model->car_id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

 </div>
<!-- //INSURANCE-VIEW -->