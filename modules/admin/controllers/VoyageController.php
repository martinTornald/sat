<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Car;
use app\modules\admin\models\Customer;
use app\modules\admin\models\Driver;
use app\modules\admin\models\SparePart;
use app\modules\admin\models\Status;
use app\modules\admin\models\Trailer;
use app\modules\admin\models\Voyage;
use app\modules\admin\models\VoyageSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * VoyageController implements the CRUD actions for Voyage model.
 */
class VoyageController extends Controller
{
	/**
	 * Lists all Voyage models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new VoyageSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Voyage model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Voyage model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Voyage;

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
            'customers'     => Customer::find()->all(),
            'cars'          => Car::find()->all(),
            'trailers'      => Trailer::find()->all(),
            'drivers'       => Driver::find()->all(),
            'statuses'      => Status::find()->all(),
        ]);
	}

	/**
	 * Updates an existing Voyage model.
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
                'customers'     => Customer::find()->all(),
                'cars'          => Car::find()->all(),
                'trailers'      => Trailer::find()->all(),
                'drivers'       => Driver::find()->all(),
                'statuses'      => Status::find()->all(),
			]);
		}
	}

	/**
	 * Deletes an existing Voyage model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the Voyage model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Voyage the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Voyage::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
