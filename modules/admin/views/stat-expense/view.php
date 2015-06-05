<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\StatExpense $model
*/

$this->title = 'Stat Expense ' . $model->stat_id;
$this->params['breadcrumbs'][] = ['label' => 'Stat Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->stat_id, 'url' => ['view', 'stat_id' => $model->stat_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="stat-expense-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List', ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'stat_id' => $model->stat_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New' . '
        Stat Expense', ['create'], ['class' => 'btn btn-success']) ?>
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


    
    <h3>
        <?= $model->stat_id ?>    </h3>


    <?php $this->beginBlock('app\modules\admin\models\StatExpense'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'stat_id',
			'fuel',
			'salary',
			'transport_cost',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'stat_id' => $model->stat_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> StatExpense',
    'content' => $this->blocks['app\modules\admin\models\StatExpense'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
