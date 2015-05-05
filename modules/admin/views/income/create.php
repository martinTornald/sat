<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Income $model
 */

$this->title = 'Создение';
$this->params['breadcrumbs'][] = ['label' => 'Доходы', 'url' => ['index']];
?>

<!-- INCOME-CREATE -->
<div class="income-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form_create', [
        'model' => $model,
    ]); ?>

</div>
<!-- //INCOME-CREATE -->