<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageSparePath $model
 */

$this->title = 'Voyage Spare Path Update ' . $model->voyage_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Voyage Spare Paths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage_id, 'url' => ['view', 'voyage_id' => $model->voyage_id, 'spare_part_id' => $model->spare_part_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="voyage-spare-path-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'voyage_id' => $model->voyage_id, 'spare_part_id' => $model->spare_part_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
