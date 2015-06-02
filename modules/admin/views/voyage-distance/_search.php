<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageDistanceSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="voyage-distance-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'voyage_id') ?>

		<?= $form->field($model, 'is_tent') ?>

		<?= $form->field($model, 'distance') ?>

		<?= $form->field($model, 'date') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
