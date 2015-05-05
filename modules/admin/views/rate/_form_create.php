<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Rate $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<!-- RATE-FORM -->
<div class="rate-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- RATE-FORM:FIELDS -->
    <div class="rate-form__fields">

        <?php echo $form->errorSummary($model); ?>

        <p>
            <?= $form->field($model, 'voyage_id')->textInput() ?>
            <?= $form->field($model, 'prepayment')->textInput() ?>
            <?= $form->field($model, 'payment')->textInput() ?>
            <?= $form->field($model, 'debt')->textInput() ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранение'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- RATE-FORM:FIELDS -->

</div>
<!-- //RATE-FORM -->