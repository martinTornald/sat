<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\SparePart $model
 */

$this->title = 'Создание запчасти';
$this->params['breadcrumbs'][] = ['label' => 'Запчасти ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'voyages' => $voyages
    ]); ?>

</div>
