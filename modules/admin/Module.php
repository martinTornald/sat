<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\admin;

use yii\helpers\ArrayHelper;


/**
 * Class Module
 * @package app\modules\admin
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class Module extends \yii\base\Module
{
    public function getMenuItems()
    {
        $menuItemPresets = [
            'admin'   => ['label' => '<i class="fa fa-dashboard"></i> <span>Панель управления</span>', 'url' => ['/admin']],
            'user'    => ['label' => '<i class="fa fa-users"></i> <span>Пользователи</span>', 'url' => ['/user/admin']],
            //'packaii' => ['label' => '<i class="fa fa-cubes"></i> <span>Пакеты</span>', 'url' => ['/packaii']],
            //'gii'     => ['label' => '<i class="fa fa-code"></i> <span>Генератор кода</span>', 'url' => ['/gii']],
        ];

        $autoMenuItems = [
            'car'           => ['label' => '<i class="fa fa-car"></i> <span>Машины</span>',                     'url' => ['/admin/car']],
            'cost'          => ['label' => '<i class="fa fa-user"></i> <span>Стоимость</span>',                 'url' => ['/admin/cost']],
            'cost_driver'   => ['label' => '<i class="fa fa-user"></i> <span>Оплата водителей</span>',          'url' => ['/admin/cost-driver']],
            'customer'      => ['label' => '<i class="fa fa-user"></i> <span>Клиенты</span>',                   'url' => ['/admin/customer']],
            'distance'      => ['label' => '<i class="fa fa-user"></i> <span>Маршруты</span>',                  'url' => ['/admin/distance']],
            'driver'        => ['label' => '<i class="fa fa-user"></i> <span>Водители</span>',                  'url' => ['/admin/driver']],
            'driver_tool'   => ['label' => '<i class="fa fa-user"></i> <span>Инструменты водителей</span>',     'url' => ['/admin/driver-tool']],
            'income'        => ['label' => '<i class="fa fa-user"></i> <span>Доход</span>',                     'url' => ['/admin/income']],
            'insurance'     => ['label' => '<i class="fa fa-file-text-o"></i> <span>Страховые полисы</span>',   'url' => ['/admin/insurance']],
            'loading'       => ['label' => '<i class="fa fa-file-text-o"></i> <span>Погрузка</span>',           'url' => ['/admin/loading']],
            'owner'         => ['label' => '<i class="fa fa-user"></i> <span>Владельцы</span>',                 'url' => ['/admin/owner']],
            'rate'          => ['label' => '<i class="fa fa-user"></i> <span>Оплата перевозок</span>',          'url' => ['/admin/rate']],
            'spare_part'    => ['label' => '<i class="fa fa-user"></i> <span>Запчасти</span>',                  'url' => ['/admin/spare-part']],
            'status'        => ['label' => '<i class="fa fa-user"></i> <span>Статусы перевозок</span>',         'url' => ['/admin/status']],
            'tool'          => ['label' => '<i class="fa fa-user"></i> <span>Инструменты</span>',               'url' => ['/admin/tool']],
            'trailer'       => ['label' => '<i class="fa fa-user"></i> <span>Прицепы</span>',                   'url' => ['/admin/trailer']],
            'unloading'     => ['label' => '<i class="fa fa-user"></i> <span>Разгрузка</span>',                 'url' => ['/admin/unloading']],
            'voyage'        => ['label' => '<i class="fa fa-user"></i> <span>Перевозки</span>',                 'url' => ['/admin/voyage']],
        ];

        foreach (\Yii::$app->getModules() AS $name => $m) {
            switch ($name) {
                case 'gii':
                case 'debug':
                    break;
                case 'admin':
                case 'user':
               // case 'packaii':
                    $menuItems[] = $menuItemPresets[$name];
                    break;
                default:
                    $module          = \Yii::$app->getModule($name);
                    $autoMenuItems[] = [
                        'label' => '<i class="fa fa-cube"></i> <span>' . ucfirst($name) . '</span>',
                        'url'   => ['/' . $module->id]
                    ];
            }
        }

        $menuItems = ArrayHelper::merge($menuItems, $autoMenuItems);

        return $menuItems;
    }

    public function getControllers($module = null)
    {
        if ($module === null) {
            $module = \Yii::$app;
        } else {
            $module = \Yii::$app->getModule($module);
        }
        foreach (scandir($module->getControllerPath()) AS $i => $name) {
            if (substr($name, 0, 1) == '.') {
                continue;
            }
            $controllers[] = \yii\helpers\Inflector::camel2id(str_replace('Controller.php', '', $name));
        }
        return $controllers;
    }
}