<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Rate $model
 */

$this->title = 'Просмотр оплаты для перевозки  ' . $model->voyage->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Оплата', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage->name, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
?>

<!-- RATE-VIEW -->
<div class="rate-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Редактировать', ['update', 'voyage_id' => $model->voyage_id],
            ['class' => 'btn btn-info']) ?>
        <!--
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['create'], ['class' => 'btn
        btn-success']) ?>
        -->
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Полный список', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>

    <?= $this->render('/voyage/_nav', [
        'id' => $model->voyage_id,
        'type' => 'view',
    ]) ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Перевозка',
                'format' => 'raw',
                'value' => Html::a($model->voyage->name, ['/admin/voyage/view', 'id' => $model->voyage->id]),
            ],
            'prepayment',
            'payment',
            'debt',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'voyage_id' => $model->voyage_id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

</div>
<!-- //RATE-VIEW -->