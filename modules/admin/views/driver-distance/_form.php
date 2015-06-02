<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;


/**
* @var yii\web\View $this
* @var app\modules\admin\models\DriverDistance $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="driver-distance-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'DriverDistance',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>


        <p>
            <?= $form->field($model, 'driver_id')->dropDownList(
                ArrayHelper::map($drivers, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'car_id')->dropDownList(
                ArrayHelper::map($cars, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'voyage_id')->dropDownList(
                ArrayHelper::map($voyages, 'id', 'name')
            ) ?>
            <?= $form->field($model, 'is_tend')->checkbox(); ?>
			<?= $form->field($model, 'distance')->textInput() ?>
            <?= $form->field($model, 'date')->widget(
                DatePicker::className(), [
                'language' => 'ru',
                'inline' => false,
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </p>


        <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                            ? 'Создать' : 'Сохранить'),
                [
                    'id'    => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
        ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>
