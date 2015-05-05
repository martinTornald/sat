<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Distance $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<!--DISTANCE-FORM -->
<div class="distance-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <!--DISTANCE-FORM:FIELDS -->
    <div class="distance-form__fields">
        <?php echo $form->errorSummary($model); ?>

        <p>

            <?= $form->field($model, 'voyage_id')->textInput() ?>
            <?= $form->field($model, 'plan')->textInput() ?>
            <?= $form->field($model, 'fact')->textInput() ?>
        </p>


        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Сохранить'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- //DISTANCE-FORM:FIELDS -->

</div>
<!--//DISTANCE-FORM -->