<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverTool $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="driver-tool-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>


        <p>
            <?= $form->field($model, 'driver_id')->dropDownList(
                ArrayHelper::map($drivers, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'tool_id')->dropDownList(
                ArrayHelper::map($tools, 'id', 'name')
            ) ?>
            <?= $form->field($model, 'date_of_issue')->textInput() ?>
            <?= $form->field($model, 'date_delivery')->textInput() ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </p>


        <?= \yii\bootstrap\Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [[
                    'label' => 'DriverTool',
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
