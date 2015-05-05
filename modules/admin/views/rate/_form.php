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
            <!-- RATE:VOYAGE -->
            <div class="form-group field-cost-voyage_id required">

                <label class="control-label col-sm-3" for="cost-voyage_id">Наименование перевозки</label>

                <div class="col-sm-6">
                    <div class="form-control" readonly><?= $model->voyage->name ?></div>
                    <div class="help-block help-block-error "></div>
                </div>

            </div>
            <!-- //RATE:VOYAGE -->
            <?= $form->field($model, 'prepayment')->textInput() ?>
            <?= $form->field($model, 'payment')->textInput() ?>
            <?= $form->field($model, 'debt')->textInput() ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- RATE-FORM:FIELDS -->

</div>
<!-- //RATE-FORM -->