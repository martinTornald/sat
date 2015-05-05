<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Unloading $model
 */

$this->title = 'Unloading View ' . $model->voyage_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Unloadings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage_id, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
$this->params['breadcrumbs'][] = 'View';
?>

<!-- UNLOADING-VIEW -->
<div class="unloading-view">

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
            'place',
            'plan',
            'fact',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'voyage_id' => $model->voyage_id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

</div>
<!-- //UNLOADING-VIEW -->