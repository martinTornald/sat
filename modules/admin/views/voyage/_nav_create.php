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
            ['label' => 'Перевозка'],
            ['label' => 'Стоимость перевозки', 'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Оплата водителя',  'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Маршрут', 'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Прибль',  'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Загрузка', 'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Оплата',  'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            //['label' => 'Запчасти', 'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
            ['label' => 'Разгрузка',  'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
        ]
    ]) ?>
</div>
<!-- //VOYAGE:NAV -->