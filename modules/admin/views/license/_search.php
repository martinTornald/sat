<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\LicenseSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="license-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'driver_id') ?>

		<?= $form->field($model, 'number') ?>

		<?= $form->field($model, 'type') ?>

		<?= $form->field($model, 'description') ?>

		<?= $form->field($model, 'date_of_issue') ?>

		<?php // echo $form->field($model, 'term') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
