<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\CarSearch $searchModel
 */

$this->title = 'Простои машин';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- CAR-INDEX -->
<div class="car-index">

    <?php // echo $this->render('_search', ['model' =>$searchModel]); ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Обновить информацию', ['inaction-update'], ['class' => 'btn btn-success']) ?>
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
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Owner</i>',
                                'url' => [
                                    'owner/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-left"> Insurance</i>',
                                'url' => [
                                    'insurance/index',
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-arrow-right"> Voyage</i>',
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

    <?php
    $dataProvider = new ArrayDataProvider([
        'allModels' => $cars,
    ]);

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Name',
                'value' => 'fullName'
            ],
            [
                'label' => 'Простои в днях',
                'value' => 'fullInaction'
            ],
        ],
    ]); ?>

</div>
<!-- //CAR-INDEX -->