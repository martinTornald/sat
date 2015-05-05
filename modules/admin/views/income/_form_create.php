<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Income $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<!-- INCOME-FORM -->
<div class="income-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!-- INCOME-FORM:FIELDS -->
    <div class="">
        <?php echo $form->errorSummary($model); ?>

        <p>
            <?= $form->field($model, 'voyage_id')->textInput() ?>
            <?= $form->field($model, 'fact')->textInput() ?>
        </p>

        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- //INCOME-FORM:FIELDS -->

</div>
<!-- //INCOME-FORM -->