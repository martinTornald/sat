<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="voyage-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'customer_id')->dropDownList(
                ArrayHelper::map($customers, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'car_id')->dropDownList(
                ArrayHelper::map($cars, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'trailer_id')->dropDownList(
                ArrayHelper::map($trailers, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'driver_id')->dropDownList(
                ArrayHelper::map($drivers, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'status_id')->dropDownList(
                ArrayHelper::map($statuses, 'id', 'description')
            ) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        </p>
        <?php $this->endBlock(); ?>

        <?=
        \yii\bootstrap\Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [[
                    'label' => 'Voyage',
                    'content' => $this->blocks['main'],
                    'active' => true,
                ],]
            ]
        );
        ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
            'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
