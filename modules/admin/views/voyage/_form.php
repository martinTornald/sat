<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Voyage $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="voyage-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'customer_id')->textInput() ?>
			<?= $form->field($model, 'car_id')->textInput() ?>
			<?= $form->field($model, 'trailer_id')->textInput() ?>
			<?= $form->field($model, 'driver_id')->textInput() ?>
			<?= $form->field($model, 'status_id')->textInput() ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'updated')->textInput() ?>
			<?= $form->field($model, 'created_at')->textInput() ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Voyage',
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
