<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Tool $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="tool-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Tool',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
