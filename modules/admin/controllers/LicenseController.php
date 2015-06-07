<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\License;
use app\modules\admin\models\LicenseSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * LicenseController implements the CRUD actions for License model.
 */
class LicenseController extends Controller
{
	/**
	 * Lists all License models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new LicenseSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single License model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($driver_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($driver_id),
		]);
	}

	/**
	 * Creates a new License model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new License;

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
	 * Updates an existing License model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($driver_id)
	{
		$model = $this->findModel($driver_id);

		if ($model->load($_POST) && $model->save()) {
            // return $this->redirect(Url::previous());
		}
        return $this->render('update', [
            'model' => $model,
        ]);
	}

	/**
	 * Deletes an existing License model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($driver_id)
	{
		$this->findModel($driver_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the License model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return License the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($driver_id)
	{
		if (($model = License::findOne($driver_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
