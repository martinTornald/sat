<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="voyage-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'customer_id') ?>

		<?= $form->field($model, 'car_id') ?>

		<?= $form->field($model, 'trailer_id') ?>

		<?= $form->field($model, 'driver_id') ?>

		<?php // echo $form->field($model, 'status_id') ?>

		<?php // echo $form->field($model, 'name') ?>

		<?php // echo $form->field($model, 'description') ?>

		<?php // echo $form->field($model, 'updated') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
