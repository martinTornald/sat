<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Trailer $model
 */

$this->title = 'Редактирование трейлера ' . $model->fullName . '';
$this->params['breadcrumbs'][] = ['label' => 'Прицепы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->fullName, 'url' => ['view', 'id' => $model->id]];
?>
<div class="trailer-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?php echo $this->render('_form', [
        'model' => $model,
        'owner' => $owner
    ]); ?>

</div>
