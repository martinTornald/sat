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
            ['label' => 'Перевозка', 'url' => ['/admin/voyage/' . $type, 'id' => $id,]],
            ['label' => 'Стоимость перевозки', 'url' => ['/admin/cost/' . $type, 'voyage_id' => $id]],
            ['label' => 'Оплата водителя', 'url' => ['/admin/cost-driver/' . $type, 'voyage_id' => $id]],
            ['label' => 'Маршрут', 'url' => ['/admin/distance/' . $type, 'voyage_id' => $id]],
            ['label' => 'Прибль', 'url' => ['/admin/income/'. $type, 'voyage_id' => $id]],
            ['label' => 'Загрузка', 'url' => ['/admin/loading/'. $type, 'voyage_id' => $id]],
            ['label' => 'Оплата', 'url' => ['/admin/rate/'. $type, 'voyage_id' => $id]],
            ['label' => 'Запчасти', 'url' => ['/admin/spare-part/'. $type, 'voyage_id' => $id]],
            ['label' => 'Разгрузка', 'url' => ['/admin/unloading/'. $type, 'voyage_id' => $id]],

        ]
    ]) ?>
</div>
<!-- //VOYAGE:NAV -->