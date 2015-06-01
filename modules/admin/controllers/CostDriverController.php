<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\CostDriver;
use app\modules\admin\models\CostDriverSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * CostDriverController implements the CRUD actions for CostDriver model.
 */
class CostDriverController extends Controller
{
	/**
	 * Lists all CostDriver models.
	 * @return mixed
	 */
	public function actionIndex()
	{
        //$this->setCostDriver();
		$searchModel = new CostDriverSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single CostDriver model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($voyage_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($voyage_id),
		]);
	}

	/**
	 * Creates a new CostDriver model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new CostDriver;

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
        return $this->render('create', ['model' => $model,]);
	}

	/**
	 * Updates an existing CostDriver model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($voyage_id)
	{
		$model = $this->findModel($voyage_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing CostDriver model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($voyage_id)
	{
		$this->findModel($voyage_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the CostDriver model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CostDriver the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($voyage_id)
	{
		if (($model = CostDriver::findOne($voyage_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

    /**
     * Задает оплату водителя
     */
    public function setCostDriver() {
        $costDrivers = CostDriver::find()->all();
        foreach($costDrivers as $costDriver) {
            switch($costDriver->voyage->car->id) {
                case 0:
                case 1:
                case 2:
                case 3:
                    $costDriver->costs = 3.500*$costDriver->voyage->distance->fact;
                    $costDriver->save();
                    break;
                case 4:
                case 5:
                    $costDriver->costs = 4.000*$costDriver->voyage->distance->fact;
                    $costDriver->save();
                    break;
            }
            //
        }
    }
}
