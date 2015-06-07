<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Expense $model
 */

$this->title = 'Расходы ' . $model->voyage->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage->fullName, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
$this->params['breadcrumbs'][] = 'Просмотр';
?>
<div class="expense-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'Полный список', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Редактировать', ['update', 'voyage_id' => $model->voyage_id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Добавить' . '
        Expense', ['create'], ['class' => 'btn btn-success']) ?>
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


    <?= $this->render('/voyage/_nav', [
        'id' => $model->voyage_id,
        'type' => 'view',
    ]) ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Перевозка',
                'format' => 'raw',
                'value' => Html::a($model->voyage->fullName, ['/admin/voyage/view', 'id' => $model->voyage->id]),
            ],
            'fuel',
            'repair',
        ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'voyage_id' => $model->voyage_id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
        ]); ?>
 </div>
