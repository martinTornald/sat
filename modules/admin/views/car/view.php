<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
use kartik\export\ExportMenu;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Car $model
 */

$this->title = 'Просмотр машины ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
?>

<!-- CAR-VIEW -->
<div class="car-view">

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

    <?= $this->render('_nav', [
        'id' => $model->id,
        'type' => 'view',
    ]) ?>

    <?php $this->beginBlock('app\modules\admin\models\Car'); ?>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Владелец',
                'format' => 'raw',
                'value' => Html::a($model->owner->fullName, ['/admin/owner/view', 'id' => $model->owner->id]),
            ],
            'make_model',
            'number',
            'color',
            'year',
            'reg_number',
            'reg_certificate',
            'mileage',
            'photo',
            'cost',
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

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [

            'class' => \yii\grid\ActionColumn::className(),
            'controller' => 'voyage',
            'urlCreator' => function ($action, $model, $key, $index) {
                return [$action, 'id' => $model->id,];
            },
            'buttons' => [
                'view' => function ($url, $model) {
                    $customurl = Yii::$app->getUrlManager()->createUrl(['admin/voyage/view', 'id' => $model->id]);

                    return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $customurl);

                },
                'edit' => function ($url, $model) {
                    $customurl = Yii::$app->getUrlManager()->createUrl(['admin/voyage/edit', 'id' => $model->id]);
                    return \yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>', $customurl);
                },
                'delete' => function ($url, $model) {
                    $customurl = Yii::$app->getUrlManager()->createUrl(['admin/voyage/delete', 'id' => $model->id]);
                    return \yii\helpers\Html::a('<span class="glyphicon glyphicon-trash"></span>', $customurl);
                }

            ],
        ],
    ];

    echo "<hr>\n". ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'fontAwesome' => true,
            'dropdownOptions' => [
                'label' => 'Экспортировать',
                'class' => 'btn btn-default'
            ]
        ]) . "<hr>\n";

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]); ?>

    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> Полный список перевозок',
            ['voyage/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> Новая перевозка',
            ['voyage/create', 'Voyage' => ['car_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>

    <?php $this->beginBlock('Inaction'); ?>

    <?php
    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->carInactions,
    ]);
    ?>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Начало простоя',
            'attribute' => 'voyagePrev.id',
            'value' => 'voyagePrev.unloading.fact'
        ],
        [
            'label' => 'Окончание простоя',
            'attribute' => 'voyageNext.id',
            'value' => 'voyageNext.loading.fact'
        ],
        [
            'label' => 'Простой в днях',
            'value' => 'inactionTime',
        ],
    ];

    echo "<hr>\n". ExportMenu::widget([
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
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя'],
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]); ?>

    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> Полный список перевозок',
            ['voyage/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> Новая перевозка',
            ['voyage/create', 'Voyage' => ['car_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>

    <?php $this->beginBlock('quarterInaction'); ?>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Квартал ',
            'value' => 'quarter'
        ],
        [
            'label' => 'Количество дней простоя',
            'value' => 'count'
        ],
    ];

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->quarterInaction,
    ]);
    ?>

    <?php
    echo "<hr>\n". ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'fontAwesome' => true,
            'dropdownOptions' => [
                'label' => 'Экспортировать',
                'class' => 'btn btn-default'
            ]
        ]) . "<hr>\n";

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    ?>

    <p class='pull-right'>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> Полный список перевозок',
            ['voyage/index'],
            ['class' => 'btn text-muted btn-xs']
        ) ?>
        <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> Новая перевозка',
            ['voyage/create', 'Voyage' => ['car_id' => $model->id]],
            ['class' => 'btn btn-success btn-xs']
        ) ?>
    </p>

    <div class='clearfix'></div>
    <?php $this->endBlock() ?>

    <?=
    \yii\bootstrap\Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => '<span class="glyphicon glyphicon-asterisk"></span> Информация о машине',
                    'content' => $this->blocks['app\modules\admin\models\Car'],
                    'active' => true,
                ],
                [
                    'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Перевозки</small>',
                    'content' => $this->blocks['Voyages'],
                    'active' => false,
                ],
                [
                    'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Простои между перевозками</small>',
                    'content' => $this->blocks['Inaction'],
                    'active' => false,
                ],
                [
                    'label' => '<small><span class="glyphicon glyphicon-paperclip"></span> Простои в кварталах</small>',
                    'content' => $this->blocks['quarterInaction'],
                    'active' => false,
                ],
            ]
        ]
    );
    ?>
</div>
<!-- //CAR-VIEW -->