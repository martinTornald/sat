<?php
use yii\bootstrap\Nav;
?>
<!-- VOYAGE:NAV -->
<div class="voyage-nav">
        <?= Nav::widget([
        'options' => [
            'class' => 'nav-pills'
        ],
        'items' => [
            ['label' => 'Машина', 'url' => ['/admin/car/' . $type, 'id' => $id,]],
            ['label' => 'Страховой полис', 'url' => ['/admin/insurance/' . $type, 'car_id' => $id]],
        ]
    ]) ?>
</div>
<!-- //VOYAGE:NAV -->