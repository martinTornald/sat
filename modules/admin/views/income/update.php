<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Income $model
 */

$this->title = 'Income Update ' . $model->voyage_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage_id, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="income-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'voyage_id' => $model->voyage_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
