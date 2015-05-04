<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\License $model
 */

$this->title = 'License Update ' . $model->driver_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Licenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->driver_id, 'url' => ['view', 'driver_id' => $model->driver_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="license-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'driver_id' => $model->driver_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
