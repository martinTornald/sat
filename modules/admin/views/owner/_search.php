<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\OwnerSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="owner-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'passport') ?>

		<?= $form->field($model, 'surname') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'patronymic') ?>

		<?php // echo $form->field($model, 'phone') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
