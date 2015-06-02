<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Status $model
 */

$this->title = 'Создание нового статусы';
$this->params['breadcrumbs'][] = ['label' => 'Статусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
