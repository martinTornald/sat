<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Distance $model
 */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Маршрут', 'url' => ['index']];
?>

<!-- DISTANCE-CREATE -->
<div class="distance-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form_create', [
        'model' => $model,
    ]); ?>

</div>
<!-- //DISTANCE-CREATE -->
