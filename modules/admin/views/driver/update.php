<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Driver $model
 */

$this->title = 'Редактирвоание водителя ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Водители', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
?>

<!-- DRIVER-UPDATE -->
<div class="driver-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
<!-- //DRIVER-UPDATE -->