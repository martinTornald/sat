<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverToolSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="driver-tool-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'driver_id') ?>

		<?= $form->field($model, 'tool_id') ?>

		<?= $form->field($model, 'date_of_issue') ?>

		<?= $form->field($model, 'date_delivery') ?>

		<?php // echo $form->field($model, 'description') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
