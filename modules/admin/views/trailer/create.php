<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Trailer $model
 */

$this->title = 'Создание нового прицепа';
$this->params['breadcrumbs'][] = ['label' => 'Прицепы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trailer-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
        'model' => $model,
        'owner' => $owner
    ]); ?>

</div>
