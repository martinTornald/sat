<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Insurance;
use app\modules\admin\models\InsuranceSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * InsuranceController implements the CRUD actions for Insurance model.
 */
class InsuranceController extends Controller
{
	/**
	 * Lists all Insurance models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new InsuranceSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Insurance model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($car_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($car_id),
		]);
	}

	/**
	 * Creates a new Insurance model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Insurance;

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
	 * Updates an existing Insurance model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($car_id)
	{
		$model = $this->findModel($car_id);

		if ($model->load($_POST) && $model->save()) {
            // return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Insurance model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($car_id)
	{
		$this->findModel($car_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the Insurance model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Insurance the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($car_id)
	{
		if (($model = Insurance::findOne($car_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
