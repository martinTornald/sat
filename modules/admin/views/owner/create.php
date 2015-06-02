<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Owner $model
 */

$this->title = 'Создание нового владельцы';
$this->params['breadcrumbs'][] = ['label' => 'Владельцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-create">

    <p class="pull-left">
        <?= Html::a('Отмена', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
