<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Stat $model
 */

$this->title = 'Stat ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="stat-view">

    <!-- menu buttons-->
    <p class='pull-left'>
           <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List', ['index'], ['class' => 'btn btn-default']) ?>
        <!--<?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New' . '
        Stat', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'date',
            [
                'label' => 'Машина',
                'format' => 'raw',
                'value' => Html::a($model->car->fullName, ['/admin/car/view', 'id' => $model->car->id]),
            ],
//            [
//                'label' => 'Расходы топливо',
//                'format' => 'raw',
//                'value' => $model->statExpense->fuel,
//            ],
//            [
//                'label' => 'Зарплата водителя',
//                'format' => 'raw',
//                'value' => $model->statExpense->salary,
//            ],
//            [
//                'label' => 'Транспортные затраты',
//                'format' => 'raw',
//                'value' => $model->statExpense->transport_cost,
//            ],
            [
                'label' => 'Ставка',
                'format' => 'raw',
                'value' => $model->statIncome->plan,
            ],
            [
                'label' => 'Расходы',
                'format' => 'raw',
                'value' => $model->statExpense->fullExpense,
            ],
            [
                'label' => 'Чистая прибль',
                'format' => 'raw',
                'value' => $model->statIncome->fact,
            ],
        ],
    ]); ?>

    <hr/>
    <!--
    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
        ]); ?> -->


</div>
