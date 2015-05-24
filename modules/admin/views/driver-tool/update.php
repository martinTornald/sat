<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverTool $model
 */

$this->title = 'Инструменты у водителей ' . $model->driver_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Инструменты водителей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->driver->fullName, 'url' => ['view', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="driver-tool-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id], ['class' => 'btn btn-info']) ?>
    </p>

    <?php echo $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
        'tools' => $tools,
    ]); ?>

</div>
