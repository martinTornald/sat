<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Car $model
 */

$this->title = 'Создание машины';
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- CAR-CREATE -->
<div class="car-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?= $this->render('_nav_create', [
        'id' => $model->id
    ]) ?>

    <?php echo $this->render('_form', [
        'model' => $model,
        'owner' => $owner,
        'years' => $years,
    ]); ?>

</div>
<!-- //CAR-CREATE -->