<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\CostDriver $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Cost Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-driver-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
