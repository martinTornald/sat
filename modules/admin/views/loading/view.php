<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Loading $model
 */

$this->title = 'росмотр загрузки для перевозки ' . $model->voyage->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Loadings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage->name, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
?>

<!-- LOADING-VIEW -->
<div class="loading-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Реактировать', ['update', 'voyage_id' => $model->voyage_id],
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
            'place',
            'plan',
            'fact',
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
<!-- //LOADING-VIEW -->