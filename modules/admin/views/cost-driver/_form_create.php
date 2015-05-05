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
            <?= $form->field($model, 'voyage_id')->textInput() ?>
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