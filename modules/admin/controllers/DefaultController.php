<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models\Car;
use app\modules\admin\models\Customer;
use app\modules\admin\models\Driver;
use app\modules\admin\models\Loading;
use app\modules\admin\models\Unloading;
use app\modules\admin\models\Voyage;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default backend controller
 *
 * Usually renders a customized dashboard for logged in users
 */
class DefaultController extends Controller
{
    /**
     * Behaviors, eg. access control
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions'       => ['index', 'view-config'],
                        'allow'         => true,
                        'roles'         => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return in_array(
                                \Yii::$app->user->identity->username,
                                \Yii::$app->getModule('user')->admins
                            );
                        }
                    ],
                ]
            ]
        ];
    }

    /**
     * Actions defined in classes, eg. error page
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Application dashboard
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'cars' => Car::find()->orderBy('id DESC')->all(),
            'voyages' => Voyage::find()->orderBy('id DESC')->all(),
            'customers' => Customer::find()->all(),
            'drivers' => Driver::find()->all(),
            'loadings' => Loading::find()->orderBy('voyage_id DESC')->all(),
            'unloadings' => Unloading::find()->orderBy('voyage_id DESC')->all(),
        ]);
    }

    /**
     * Application configuration
     * @return string
     */
    public function actionViewConfig()
    {
        $config  = $GLOBALS['config'];
        $modules = $config['modules'];
        unset($config['modules']);
        $components = $config['components'];
        unset($config['components']);
        $params = $config['params'];
        unset($config['params']);
        return $this->render('view-config',
                             [
                                 'config'     => $config,
                                 'modules'    => $modules,
                                 'components' => $components,
                                 'params'     => $params
                             ]
        );
    }

}
