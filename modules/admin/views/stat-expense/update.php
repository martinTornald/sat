<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\StatExpense $model
 */

$this->title = 'Stat Expense ' . $model->stat_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Stat Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->stat_id, 'url' => ['view', 'stat_id' => $model->stat_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="stat-expense-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'stat_id' => $model->stat_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
