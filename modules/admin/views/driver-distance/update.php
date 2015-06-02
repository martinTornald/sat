<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverDistance $model
 */

$this->title = 'Driver Distance ' . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Driver Distances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="driver-distance-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?php echo $this->render('_form', [
        'model' => $model,
        'cars' => $cars,
        'drivers' => $drivers,
        'voyages' => $voyages,
    ]); ?>

</div>
