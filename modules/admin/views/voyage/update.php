<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 */

$this->title = 'Voyage Update ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Voyages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="voyage-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
        'customers'     => $customers,
        'cars'          => $cars,
        'trailers'      => $trailers,
        'drivers'       => $drivers,
        'statuses'      => $statuses,
	]); ?>

</div>
