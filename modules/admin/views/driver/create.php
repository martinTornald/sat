<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\Driver $model
*/

$this->title = 'Создание нового водителя';
$this->params['breadcrumbs'][] = ['label' => 'Водители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- DRIVER-CREATE -->
<div class="driver-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
<!-- //DRIVER-CREATE -->