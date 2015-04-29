<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\CarSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="car-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'owner_id') ?>

		<?= $form->field($model, 'insurance_id') ?>

		<?= $form->field($model, 'make_model') ?>

		<?= $form->field($model, 'number') ?>

		<?php // echo $form->field($model, 'color') ?>

		<?php // echo $form->field($model, 'year') ?>

		<?php // echo $form->field($model, 'reg_number') ?>

		<?php // echo $form->field($model, 'reg_certificate') ?>

		<?php // echo $form->field($model, 'mileage') ?>

		<?php // echo $form->field($model, 'photo') ?>

		<?php // echo $form->field($model, 'cost') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
