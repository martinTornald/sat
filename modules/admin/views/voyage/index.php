<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\VoyageSearch $searchModel
 */

$this->title = 'Перевозки';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- VOYAGE-INDEX -->
<div class="voyage-index">

    <?php // echo $this->render('_search', ['model' =>$searchModel]); ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


            <?php
            echo \yii\bootstrap\ButtonDropdown::widget(
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
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Стоимость</i>',
                                'url' => [
                                    'cost/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Оплата водителей</i>',
                                'url' => [
                                    'cost-driver/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Разтояние</i>',
                                'url' => [
                                    'distance/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Стоимость</i>',
                                'url' => [
                                    'income/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Загрузки</i>',
                                'url' => [
                                    'loading/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Статусы оплат</i>',
                                'url' => [
                                    'rate/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Запчасти</i>',
                                'url' => [
                                    'spare-part/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Разгрузки</i>',
                                'url' => [
                                    'unloading/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Машины</i>',
                                'url' => [
                                    'car/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Заказчики</i>',
                                'url' => [
                                    'customer/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Водители</i>',
                                'url' => [
                                    'driver/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Статусы</i>',
                                'url' => [
                                    'status/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Прицепы</i>',
                                'url' => [
                                    'trailer/index',
                                ],
                            ],
                        ]],
                ]
            );
            ?>
        </div>
    </div>

    <?php
    $dataProvider->sort = ['defaultOrder' => ['id' => 'DESC']];

    echo GridView::widget([
        'layout' => '{summary}{pager}{items}{pager}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя'],
        'columns' => [

            'id',
            [
                'attribute' => 'customer_id',
                'value' => 'customer.company'
            ],
            [
                'attribute' => 'car_id',
                'value' => 'car.fullName'
            ],
            [
                'attribute' => 'trailer_id',
                'value' => 'trailer.fullName'
            ],
            [
                'attribute' => 'driver_id',
                'value' => 'driver.surname'
            ],
            [
                'attribute' => 'status_id',
                'value' => 'status.description'
            ],
            'name',
            /*'description:ntext'*/
            /*'updated'*/
            /*'created_at'*/
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
<!-- //VOYAGE-INDEX -->