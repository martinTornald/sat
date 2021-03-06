<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Insurance $model
 */

$this->title = 'Insurance Update ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'car_id' => $model->car_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="insurance-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'car_id' => $model->car_id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= $this->render('/car/_nav', [
        'id' => $model->car_id,
        'type' => 'update',
    ]) ?>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
