<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Customer $model
 */

$this->title = 'Customer View ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>

<!-- CUSTOMER-VIEW -->
<div class="customer-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Редактировать', ['update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Полный список', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class='clearfix'></div>


    <?php $this->beginBlock('app\modules\admin\models\Customer'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company',
            'name',
            'phone',
        ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>

    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('Voyages'); ?>
    <?php
    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->voyages,
    ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'voyage',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['admin/voyage/view','id'=>$model->id]);

                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl );

                    },
                    'edit'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['admin/voyage/edit','id'=>$model->id]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl );
                    },
                    'delete'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['admin/voyage/delete','id'=>$model->id]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $customurl );
                    }

                ],
            ],
        ],
    ]); ?>

    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> Полный список перевозок',
            ['voyage/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> Новая перевозка',
            ['voyage/create', 'Voyage' => ['customer_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>


    <?= \yii\bootstrap\Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [[
                'label' => '<span class="glyphicon glyphicon-asterisk"></span> Информация о заказчике',
                'content' => $this->blocks['app\modules\admin\models\Customer'],
                'active' => true,
            ], [
                'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Перевозки</small>',
                'content' => $this->blocks['Voyages'],
                'active' => false,
            ],]
        ]
    );
    ?>

</div>
<!-- //CUSTOMER-VIEW -->