<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\admin;
use Yii;
use yii\helpers\ArrayHelper;


/**
 * Class Module
 * @package app\modules\admin
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/admin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/admin/messages',
            'fileMap' => [
                'modules/admin/voyage' => 'voyage.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/admin/' . $category, $message, $params, $language);
    }

    public function getMenuItems()
    {
        $menuItemPresets = [
            'admin'   => ['label' => '<i class="fa fa-dashboard"></i> <span>Панель управления</span>', 'url' => ['/admin']],
            'user'    => ['label' => '<i class="fa fa-users"></i> <span>Пользователи</span>', 'url' => ['/user/admin']],
            //'packaii' => ['label' => '<i class="fa fa-cubes"></i> <span>Пакеты</span>', 'url' => ['/packaii']],
            'gii'     => ['label' => '<i class="fa fa-code"></i> <span>Генератор кода</span>', 'url' => ['/gii']],
        ];

        $autoMenuItems = [
            'car'           => ['label' => '<i class="fa fa-car"></i> <span>Машины</span>',                     'url' => ['/admin/car']],
            'cost'          => ['label' => '<i class="fa fa-money"></i> <span>Стоимость перевозок</span>',      'url' => ['/admin/cost']],
            'cost_driver'   => ['label' => '<i class="fa fa-credit-card"></i> <span>Оплата водителей</span>',   'url' => ['/admin/cost-driver']],
            'customer'      => ['label' => '<i class="fa fa-user"></i> <span>Клиенты</span>',                   'url' => ['/admin/customer']],
            'distance'      => ['label' => '<i class="fa fa-road"></i> <span>Маршруты</span>',                  'url' => ['/admin/distance']],
            'driver'        => ['label' => '<i class="fa fa-location-arrow"></i> <span>Водители</span>',        'url' => ['/admin/driver']],
            'driver_tool'   => ['label' => '<i class="fa fa-plug"></i> <span>Инструменты водителей</span>',     'url' => ['/admin/driver-tool']],
            'income'        => ['label' => '<i class="fa fa-bar-chart"></i> <span>Прибль</span>',               'url' => ['/admin/income']],
            'insurance'     => ['label' => '<i class="fa fa-file-text-o"></i> <span>Страховые полисы</span>',   'url' => ['/admin/insurance']],
            'loading'       => ['label' => '<i class="fa fa-download"></i> <span>Погрузка</span>',              'url' => ['/admin/loading']],
            'owner'         => ['label' => '<i class="fa fa-street-view"></i> <span>Владельцы</span>',          'url' => ['/admin/owner']],
            'rate'          => ['label' => '<i class="fa fa-plus-circle"></i> <span>Оплата перевозок</span>',   'url' => ['/admin/rate']],
            'spare_part'    => ['label' => '<i class="fa fa-cogs"></i> <span>Запчасти</span>',                  'url' => ['/admin/spare-part']],
            'status'        => ['label' => '<i class="fa fa-check-square"></i> <span>Статусы перевозок</span>', 'url' => ['/admin/status']],
            'tool'          => ['label' => '<i class="fa fa-wrench"></i> <span>Инструменты</span>',             'url' => ['/admin/tool']],
            'trailer'       => ['label' => '<i class="fa fa-truck"></i> <span>Прицепы</span>',                  'url' => ['/admin/trailer']],
            'unloading'     => ['label' => '<i class="fa fa-upload"></i> <span>Разгрузка</span>',               'url' => ['/admin/unloading']],
            'voyage'        => ['label' => '<i class="fa fa-share-alt"></i> <span>Перевозки</span>',            'url' => ['/admin/voyage']],
        ];

        foreach (\Yii::$app->getModules() AS $name => $m) {
            switch ($name) {

                case 'debug': break;
                case 'packaii': break;
                case 'gii':  // break;
                case 'admin':
                case 'user':

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
