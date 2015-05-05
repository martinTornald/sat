<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\RateSearch $searchModel
 */

$this->title = 'Оплата';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- RATE-INDEX -->
<div class="rate-index">

    <?php // echo $this->render('_search', ['model' =>$searchModel]); ?>

    <div class="clearfix">
        <p class="pull-left">
            <!--
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Новая оплата', ['create'], ['class' => 'btn btn-success']) ?>
            -->
        </p>

        <div class="pull-right">
            <?php echo \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id' => 'giiant-relations',
                    'encodeLabel' => false,
                    'label' => '<span class="glyphicon glyphicon-paperclip"></span> Связи',
                    'dropdown' => [
                        'options' => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Перевозки</i>',
                                'url' => [
                                    'voyage/index',
                                ],
                            ],
                        ]],
                ]
            );
            ?>
        </div>
    </div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'voyage_id',
                'value' => 'voyage.name'
            ],
            'prepayment',
            'payment',
            'debt',
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return \yii\helpers\Url::toRoute($params);
                },
                'contentOptions' => ['nowrap' => 'nowrap']
            ],
        ],
    ]); ?>

</div>
<!-- //RATE-INDEX -->