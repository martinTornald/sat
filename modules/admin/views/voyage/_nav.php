<?php
use yii\bootstrap\Nav;
?>
<!-- VOYAGE:NAV -->
<?= Nav::widget([
    'options' => [
        'class' => 'nav-pills'
    ],
    'items' => [
        ['label' => 'Перевозка', 'url' => ['/admin/voyage/update', 'id' => $id]],
        ['label' => 'Стоимость перевозок', 'url' => ['/admin/cost/update', 'voyage_id' => $id]],
        ['label' => 'Оплата водителя', 'url' => ['/admin/cost-driver/update', 'voyage_id' => $id]],
        ['label' => 'Маршрут', 'url' => ['/admin/distance/update', 'voyage_id' => $id]],
        ['label' => 'Прибль', 'url' => ['/admin/income/update', 'voyage_id' => $id]],
        ['label' => 'Загрузка', 'url' => ['/admin/loading/update', 'voyage_id' => $id]],
        ['label' => 'Оплата', 'url' => ['/admin/rate/update', 'voyage_id' => $id]],
        ['label' => 'Запчасти', 'url' => ['/admin/spare-part/update', 'voyage_id' => $id]],
        ['label' => 'Разгрузка', 'url' => ['/admin/unloading/update', 'voyage_id' => $id]],

    ]
]) ?>
<!-- //VOYAGE:NAV -->