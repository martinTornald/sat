<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageDistance $model
 */

$this->title = 'Редактирование дистанции перевозоки ' . $model->id . ', ' . 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Дистанции перевозок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="voyage-distance-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
        'voyages' => $voyages,
	]); ?>

</div>
