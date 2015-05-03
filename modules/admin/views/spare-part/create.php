<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\admin\models\SparePart $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Spare Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
