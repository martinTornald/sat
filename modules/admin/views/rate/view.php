<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Rate $model
*/

$this->title = 'Rate View ' . $model->voyage_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage_id, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="rate-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'voyage_id' => $model->voyage_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Rate', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <h3>
        <?= $model->voyage_id ?>    </h3>


    <?php $this->beginBlock('app\modules\admin\models\Rate'); ?>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'voyage_id',
			'prepayment',
			'payment',
			'debt',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'voyage_id' => $model->voyage_id],
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
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Rate',
    'content' => $this->blocks['app\modules\admin\models\Rate'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
