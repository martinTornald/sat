<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Rate $model
 */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Оплата', 'url' => ['index']];
?>

<!-- RATE-CREATE -->
<div class="rate-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
<!-- //RATE-CREATE -->