<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\VoyageDistance $model
 */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Дистанции перевозок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voyage-distance-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'voyages' => $voyages,
    ]); ?>

</div>
