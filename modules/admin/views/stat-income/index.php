<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\StatIncomeSearch $searchModel
 */

$this->title = 'Stat Incomes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="stat-income-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Stat Income', ['create'], ['class' => 'btn btn-success']) ?>
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
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Stat</i>',
                                'url' => [
                                    'stat/index',
                                ],
                            ],
                        ]],
                ]
            );
            ?>
        </div>
    </div>


    <div class="table-responsive">
        <?php

        $gridColumns = [
            [
                'label' => 'Дата',
                'attribute' => 'stat_id',
                'value' => 'stat.date'
            ],
            [
                'label' => 'Машина',
                'attribute' => 'stat_id',
                'value' => 'stat.car.fullName'
            ],
            'plan',
            'fact',
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

        echo "<hr>\n" . ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Экспортировать',
                    'class' => 'btn btn-default'
                ]
            ]) . "<hr>\n";

        echo GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel' => 'Last'],
            'filterModel' => $searchModel,
            'columns' => $gridColumns
        ]); ?>
    </div>


</div>
