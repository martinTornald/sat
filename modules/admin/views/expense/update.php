<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Expense $model
 */

$this->title = 'Расходы ' . $model->voyage->fullName . ', ' . 'Редактирвоание';
$this->params['breadcrumbs'][] = ['label' => 'Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage->fullName, 'url' => ['view', 'voyage_id' => $model->voyage_id]];

?>
<div class="expense-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'Просмотр', ['view', 'voyage_id' => $model->voyage_id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= $this->render('/voyage/_nav', [
        'id' => $model->voyage_id,
        'type' => 'update',
    ]) ?>

	<?php echo $this->render('_form', [
		'model' => $model,
        'voyages' => $voyages
	]); ?>

</div>
