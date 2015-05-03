<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Driver $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="driver-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'passport')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'surname')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'patronymic')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Driver',
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
