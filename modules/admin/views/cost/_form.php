<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Cost $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<!-- COST-FORM -->
<div class="cost-form">

    <?= $this->render('/voyage/_nav', ['id' => $model->voyage_id]) ?>

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- ACTIVE-FORM -->
    <div class="active-form">

        <?php echo $form->errorSummary($model); ?>

        <!-- ACTIVE-FORM:FIELDS -->
        <div class="active-form__fields">

            <!-- COST-FORM:VOYAGE -->
            <div class="form-group field-cost-voyage_id required">

                <label class="control-label col-sm-3" for="cost-voyage_id">Наименование перевозки</label>

                <div class="col-sm-6">
                    <div class="form-control" readonly><?= $model->voyage->name ?></div>
                    <div class="help-block help-block-error "></div>
                </div>

            </div>
            <!-- //COST-FORM:VOYAGE -->

            <?= $form->field($model, 'plan')->textInput() ?>
            <?= $form->field($model, 'fact')->textInput() ?>
        </div>
        <!-- //ACTIVE-FORM:FIELDS -->

        <!-- ACTIVE-FORM:SUBMIT -->
        <div class="active-form__fields">
        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>
        <!-- ACTIVE-FORM:SUBMIT -->
        </div>

    </div>
    <!-- //ACTIVE-FORM -->

    <?php ActiveForm::end(); ?>

</div>
<!-- //COST-FORM -->
