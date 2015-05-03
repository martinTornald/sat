<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\SparePart $model
*/

$this->title = 'Spare Part View ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Spare Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="spare-part-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'voyage_id' => $model->voyage_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Spare Part', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <h3>
        <?= $model->name ?>    </h3>


    <?php $this->beginBlock('app\modules\admin\models\SparePart'); ?>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'voyage_id',
			'plan',
			'name',
			'price',
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
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> SparePart',
    'content' => $this->blocks['app\modules\admin\models\SparePart'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
