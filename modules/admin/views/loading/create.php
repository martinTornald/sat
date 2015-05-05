<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Loading $model
*/

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Загрузки', 'url' => ['index']];
?>

<!-- LOADING-CREATE -->
<div class="loading-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form_create', [
    'model' => $model,
    ]); ?>

</div>
<!-- //LOADING-CREATE -->