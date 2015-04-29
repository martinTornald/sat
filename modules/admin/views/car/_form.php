<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Car $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            <?= $form->field($model, 'owner_id')->dropDownList(
                ArrayHelper::map($owner, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'insurance_id')->dropDownList(
                ArrayHelper::map($insurance, 'id', 'name')
            ) ?>
			<?= $form->field($model, 'mileage')->textInput() ?>
			<?= $form->field($model, 'year')->textInput(['maxlength' => 4]) ?>
			<?= $form->field($model, 'cost')->textInput() ?>
			<?= $form->field($model, 'make_model')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'color')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'reg_number')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'reg_certificate')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'photo')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'number')->textInput(['maxlength' => 50]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Car',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
