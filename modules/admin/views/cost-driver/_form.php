<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\CostDriver $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<!-- COST-DRIVER-FORM -->
<div class="cost-driver-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- COST-DRIVER-FORM:FIELDS -->
    <div class="cost-driver-form__fields">
        <?php echo $form->errorSummary($model); ?>

        <p>
            <!-- COST-DRIVER-FORM:VOYAGE -->
            <div class="form-group field-cost-driver-voyage_id required">

                <label class="control-label col-sm-3" for="cost-driver-voyage_id">Наименование перевозки</label>

                <div class="col-sm-6">
                    <div class="form-control"><?= $model->voyage->name ?></div>
                    <div class="help-block help-block-error "></div>
                </div>

            </div>
            <!-- //COST-DRIVER-FORM:VOYAGE -->

            <!-- COST-DRIVER-FORM:DRIVER -->
            <div class="form-group field-cost-driver-voyage_id required">

                <label class="control-label col-sm-3" for="cost-driver-voyage_id">Водитель</label>

                <div class="col-sm-6">
                    <div class="form-control"><?= $model->voyage->driver->fullName ?></div>
                    <div class="help-block help-block-error "></div>
                </div>

            </div>
            <!-- //COST-DRIVER-FORM:DRIVER -->
            <?= $form->field($model, 'costs')->textInput() ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- //COST-DRIVER-FORM:FIELDS -->

</div>
<!-- //COST-DRIVER-FORM -->