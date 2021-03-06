<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Trailer $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="trailer-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>

        <p>
            <?= $form->field($model, 'owner_id')->dropDownList(
                ArrayHelper::map($owner, 'id', 'fullName')
            ) ?>
			<?= $form->field($model, 'year')->textInput(['maxlength' => 4]) ?>
			<?= $form->field($model, 'make_model')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'reg_number')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'reg_certificate')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'photo')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'number')->textInput(['maxlength' => 50]) ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
