<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Cost $model
 */

$this->title = 'Редактирование стоимости перевозки ' . $model->voyage->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Стоимость перевозок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage_id, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
?>

<!-- COST-UPDATE -->
<div class="cost-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Просмотр', ['view', 'voyage_id' => $model->voyage_id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= $this->render('/voyage/_nav', [
        'id' => $model->voyage_id,
        'type' => 'update',
    ]) ?>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
<!-- //COST-UPDATE -->
