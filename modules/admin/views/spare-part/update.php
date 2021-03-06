<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\SparePart $model
 */

$this->title = 'Редактирование запчасти ' . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Запчасть', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
?>
<div class="spare-part-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'Просмотр ', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?php echo $this->render('_form', [
        'model' => $model,
        'voyages' => $voyages
    ]); ?>

</div>
