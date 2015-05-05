<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Customer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<!-- CUSTOMER-FORM -->
<div class="customer-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- CUSTOMER-FORM:FIELDS -->
    <div class="customer-form__fields">
        <?php echo $form->errorSummary($model); ?>

        <p>
            <?= $form->field($model, 'company')->textInput(['maxlength' => 127]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- //CUSTOMER-FORM:FIELDS -->

</div>
<!-- //CUSTOMER-FORM -->