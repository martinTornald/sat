<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverDistanceSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="driver-distance-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'driver_id') ?>

		<?= $form->field($model, 'car_id') ?>

		<?= $form->field($model, 'voyage_id') ?>

		<?= $form->field($model, 'is_tend') ?>

		<?php // echo $form->field($model, 'distance') ?>

		<?php // echo $form->field($model, 'date') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
