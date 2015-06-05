<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Stat $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="stat-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Stat',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
        ]
    );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>

            <?= $form->field($model, 'car_id')->dropDownList(
                ArrayHelper::map($cars, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'date')->widget(
                DatePicker::className(), [
                'language' => 'ru',
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </p>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [[
                    'label' => 'Stat',
                    'content' => $this->blocks['main'],
                    'active' => true,
                ],]
            ]
        );
        ?>
        <hr/>

        <?= Html::submitButton(
            '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                ? 'Create' : 'Save'),
            [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
            ]
        );
        ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>
