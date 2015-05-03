<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\SparePartSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="spare-part-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'voyage_id') ?>

		<?= $form->field($model, 'plan') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'price') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
