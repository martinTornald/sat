<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Voyage $model
 */

$this->title = 'Редактирование перевозки ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Перевозки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
?>

<!-- VOYAGE-UPDATE -->
<div class="voyage-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= $this->render('_nav', [
        'id' => $model->id,
        'type' => 'update',
    ]) ?>

    <?php echo $this->render('_form', [
		'model' => $model,
        'customers'     => $customers,
        'cars'          => $cars,
        'trailers'      => $trailers,
        'drivers'       => $drivers,
        'statuses'      => $statuses,
	]); ?>

</div>
<!-- //VOYAGE-UPDATE -->