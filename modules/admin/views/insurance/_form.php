<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Insurance $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="insurance-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>


        <p>
            <!-- INSURANCE-FORM:CAR -->

        <div class="form-group field-cost-car_id required">

            <label class="control-label col-sm-3">Машина</label>

            <div class="col-sm-6">

                <div class="form-control" readonly><?= $model->car->number ?></div>
                <div class="help-block help-block-error "></div>
            </div>

        </div>
        <!-- //INSURANCE-FORM:CAR -->
        <?= $form->field($model, 'createdAt')->textInput() ?>
        <?= $form->field($model, 'term')->textInput() ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
        </p>


        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
