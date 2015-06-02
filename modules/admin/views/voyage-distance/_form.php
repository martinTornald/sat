<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;


/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageDistance $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="voyage-distance-form">

    <?php $form = ActiveForm::begin([
            'id' => 'VoyageDistance',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
        ]
    );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>


        <p>

            <?= $form->field($model, 'voyage_id')->dropDownList(
                ArrayHelper::map($voyages, 'id', 'fullName')
            ) ?>
            <?= $form->field($model, 'is_tent')->checkbox(); ?>
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
            ]); ?>
        </p>



        <hr/>

        <?= Html::submitButton(
            '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                ? 'Создать' : 'Сохранить'),
            [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
            ]
        );
        ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>
