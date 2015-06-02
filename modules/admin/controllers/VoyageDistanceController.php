<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Voyage;
use app\modules\admin\models\VoyageDistance;
use app\modules\admin\models\VoyageDistanceSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;

/**
 * VoyageDistanceController implements the CRUD actions for VoyageDistance model.
 */
class VoyageDistanceController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' 	=> true,
						'actions'   => ['index', 'view', 'create', 'update', 'delete'],
						'roles'     => ['@']
					]
				]
			]
		];
	}

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            return true;
        } else {
            return false;
        }
    }

	/**
	 * Lists all VoyageDistance models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new VoyageDistanceSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single VoyageDistance model.
	 * @param integer $id
     *
	 * @return mixed
	 */
	public function actionView($id)
	{
        $resolved = \Yii::$app->request->resolve();
        $resolved[1]['_pjax'] = null;
        $url = Url::to(array_merge(['/'.$resolved[0]],$resolved[1]));
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember($url);
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new VoyageDistance model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new VoyageDistance;

		try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', [
            'model' => $model,
            'voyages' => Voyage::find()->all()
        ]);
	}

	/**
	 * Updates an existing VoyageDistance model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
                'voyages' => Voyage::find()->all()
			]);
		}
	}

	/**
	 * Deletes an existing VoyageDistance model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
	}

	/**
	 * Finds the VoyageDistance model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return VoyageDistance the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = VoyageDistance::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

    protected function setDriverDistance() {
        $voyages = Voyage::find()->all();

        foreach($voyages as $voyage) {
            $loadingDate = strtotime($voyage->loading->fact);
            $unloadingDate = strtotime($voyage->unloading->fact);
            if ($loadingDate < $unloadingDate) {
                $timeformat = 60*60*24;
                $days =  ($unloadingDate - $loadingDate) / $timeformat;
                $distancePlan = $voyage->distance->fact / $days;

                for($i = 0; $i < $days; $i++) {
                    $driverDistance = new DriverDistance();
                    $driverDistance->voyage_id = $voyage->id;
                    $date = $loadingDate + $i*$timeformat;
                    $driverDistance->date = date('Y-m-d',$date);
                    $driverDistance->distance = $distancePlan;
                    $driverDistance->is_tent = ($voyage->car->id == 4 || $voyage->car->id == 5) ? 0 : 1;
                    $driverDistance->save();
                }

            } else {
                continue;
            }

        }
    }
}
