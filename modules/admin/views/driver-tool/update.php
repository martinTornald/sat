<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverTool $model
 */

$this->title = 'Driver Tool Update ' . $model->driver_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Driver Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->driver_id, 'url' => ['view', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="driver-tool-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'driver_id' => $model->driver_id, 'tool_id' => $model->tool_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
