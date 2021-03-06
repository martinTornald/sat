<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\DriverTool $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Driver Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-tool-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
        'tools' => $tools,
    ]); ?>

</div>
