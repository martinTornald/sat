<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\StatSearch $searchModel
 */

$this->title = 'Stats';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="stat-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">

        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


            <?=
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id' => 'giiant-relations',
                    'encodeLabel' => false,
                    'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
                    'dropdown' => [
                        'options' => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Car</i>',
                                'url' => [
                                    'car/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Stat Expense</i>',
                                'url' => [
                                    'stat-expense/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-right"> Stat Inaction</i>',
                                'url' => [
                                    'stat-inaction/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Stat Income</i>',
                                'url' => [
                                    'stat-income/index',
                                ],
                            ],
                        ]],
                ]
            );
            ?>        </div>
    </div>


    <div class="table-responsive">
        <?php
        $gridColumns = [
            'date',
            [
                'attribute' => 'car_id',
                'value' => 'car.fullName'
            ],
            [
                'label' => 'Расходы',
                'attribute' => 'id',
                'value' => 'statExpense.fullExpense'
            ],
            [
                'label' => 'Чистая прибль',
                'attribute' => 'id',
                'value' => 'statIncome.fact'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return Url::toRoute($params);
                },
                'contentOptions' => ['nowrap' => 'nowrap']
            ],
        ];

        echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Экспортировать',
                    'class' => 'btn btn-default'
                ]
            ]) . "<hr>\n". GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'Первая',
                'lastPageLabel' => 'Последняя'],
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]); ?>
    </div>


</div>
