<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Loading $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<!-- LOADING-FORM -->
<div class="loading-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- LOADING-FORM:FIELDS -->
    <div class="loading-form__fields">
        <?php echo $form->errorSummary($model); ?>

        <p>
            <?= $form->field($model, 'voyage_id')->textInput() ?>
            <?= $form->field($model, 'plan')->textInput() ?>
            <?= $form->field($model, 'fact')->textInput() ?>
            <?= $form->field($model, 'place')->textInput(['maxlength' => 255]) ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- //LOADING-FORM:FIELDS -->

</div>
<!-- //LOADING-FORM -->