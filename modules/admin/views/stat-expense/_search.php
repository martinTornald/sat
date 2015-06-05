<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\StatExpenseSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="stat-expense-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'stat_id') ?>

		<?= $form->field($model, 'fuel') ?>

		<?= $form->field($model, 'salary') ?>

		<?= $form->field($model, 'transport_cost') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
