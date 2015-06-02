<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverDistance $model
 */

$this->title = 'Добавление новой дистанции';
$this->params['breadcrumbs'][] = ['label' => 'Добавление новой дистанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-distance-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'cars' => $cars,
        'drivers' => $drivers,
        'voyages' => $voyages,
    ]); ?>

</div>
