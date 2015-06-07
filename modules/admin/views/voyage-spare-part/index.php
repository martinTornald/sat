<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\VoyageSparePartSearch $searchModel
 */

$this->title = 'Voyage Spare Parts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="voyage-spare-part-index">

    <?php // echo $this->render('_search', ['model' =>$searchModel]); ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Voyage Spare Part', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

            <?= \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id' => 'giiant-relations',
                    'encodeLabel' => false,
                    'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Связи',
                    'dropdown' => [
                        'options' => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Запчасти</i>',
                                'url' => [
                                    'spare-part/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Перевозки</i>',
                                'url' => [
                                    'voyage/index',
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
            [
                'label' => 'Перевозка',
                'attribute' => 'voyage_id',
                'value' => 'voyage.fullName'
            ],
            [
                'label' => 'Запчасть',
                'attribute' => 'spare_part_id',
                'value' => 'sparePart.тame'
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
