<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\SparePart;
use app\modules\admin\models\SparePartSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * SparePartController implements the CRUD actions for SparePart model.
 */
class SparePartController extends Controller
{
	/**
	 * Lists all SparePart models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new SparePartSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single SparePart model.
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
	 * Creates a new SparePart model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new SparePart;

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
	 * Updates an existing SparePart model.
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
	 * Deletes an existing SparePart model.
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
	 * Finds the SparePart model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return SparePart the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($voyage_id)
	{
		if (($model = SparePart::findOne($voyage_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
