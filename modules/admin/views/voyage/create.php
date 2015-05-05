<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 */

$this->title = 'Создание перевозки';
$this->params['breadcrumbs'][] = ['label' => 'Перевозки', 'url' => ['index']];

?>
<div class="voyage-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?= $this->render('_nav_create', [
        'id' => $model->id
    ]) ?>

    <?php echo $this->render('_form', [
        'model'         => $model,
        'customers'     => $customers,
        'cars'          => $cars,
        'trailers'      => $trailers,
        'drivers'       => $drivers,
        'statuses'      => $statuses,
    ]); ?>

</div>
