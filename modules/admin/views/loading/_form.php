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
            <!-- LOADING:VOYAGE -->
            <div class="form-group field-cost-voyage_id required">

                <label class="control-label col-sm-3" for="cost-voyage_id">Наименование перевозки</label>

                <div class="col-sm-6">
                    <div class="form-control" readonly><?= $model->voyage->name ?></div>
                    <div class="help-block help-block-error "></div>
                </div>

            </div>
            <!-- //LOADING:VOYAGE -->
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