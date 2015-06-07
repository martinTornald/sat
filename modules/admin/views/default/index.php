<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;

$this->title = 'Панель управления';
?>

<div class="row">
    <div class="col-md-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?= count($cars) ?>
                </h3>

                <p>
                    Машины
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/car']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-md-3 col-xs-6">

        <div class="small-box bg-primary">
            <div class="inner">
                <h3>
                    <?= count($customers) ?>
                </h3>

                <p>
                    Клиенты
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/customer']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-3 col-xs-6">

        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?= count($drivers) ?>
                </h3>

                <p>
                    Водители
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-location-arrow"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/driver']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>


    <div class="col-md-3 col-xs-6">

        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?= count($voyages) ?>
                </h3>

                <p>
                    Перевозки
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-share-alt"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/voyage']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>

</div>


<div class="row">
    <div class="col-md-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                   &nbsp;
                </h3>

                <p>
                    Простои
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/car/inaction']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-md-3 col-xs-6">

        <div class="small-box  bg-green">
            <div class="inner">
                <h3>
                    &nbsp;
                </h3>
                <p>
                    Дальность перевозок
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/voyage-distance']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-3 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    &nbsp;
                </h3>
                <p>
                    Расходы
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-location-arrow"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/stat-expense']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>


    <div class="col-md-3 col-xs-6">

        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    &nbsp;
                </h3>
                <p>
                    Прибль
                </p>
            </div>
            <div class="icon bg-">
                <i class="fa fa-share-alt"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/admin/stat-income']) ?>" class="small-box-footer">
                Управлять <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-sm-6">
        <h3>Последние погрузки</h3>
        <div class="box">
            <?php
            $dataProvider = new ArrayDataProvider([
                'allModels' => array_slice($loadings, 0, 5),
            ]);

            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Последние погрузки',
                        'value' => function ($model) {
                            return $model->voyage->name;
                        },
                    ],
                    [
                        'label' => 'Дата',
                        'value' => 'fact'
                    ]
                ],
            ]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <h3>Последние разгрузки</h3>
        <div class="box">
            <?php
            $dataProvider = new ArrayDataProvider([
                'allModels' => array_slice($unloadings, 0, 5),
            ]);

            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Последние разгрузки',
                        'value' => function ($model) {
                            return $model->voyage->name;
                        },
                    ],
                    [
                        'label' => 'Дата',
                        'value' => 'fact'
                    ]
                ],
            ]); ?>
        </div>
    </div>

    <div class="col-sm-12">
        <h3>Последние перевозки</h3>
        <div class="box">
            <?php

            $gridColumns = [
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
            ];

            $dataProvider = new ArrayDataProvider([
                'allModels' => array_slice($voyages, 0, 5),
            ]);
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'columns' => $gridColumns
            ]); ?>
        </div>
    </div>
</div>

