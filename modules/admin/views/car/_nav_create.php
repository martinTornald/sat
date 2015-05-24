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
            ['label' => 'Машина'],
            ['label' => 'Страховой полис', 'options' => ['class' => 'disabled', 'onclick' => 'return false;']],
        ]
    ]) ?>
</div>
<!-- //VOYAGE:NAV -->