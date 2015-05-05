<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Unloading $model
 */

$this->title = 'Редактирование разгрузки для перевозки ' . $model->voyage->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Разгрузки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->voyage->name, 'url' => ['view', 'voyage_id' => $model->voyage_id]];
?>
<!-- UNLOADING-UPDATE -->
<div class="unloading-update">

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
<!-- //UNLOADING-UPDATE -->