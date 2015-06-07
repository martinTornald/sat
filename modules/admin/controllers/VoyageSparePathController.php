<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\VoyageSparePath;
use app\modules\admin\models\VoyageSparePathSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * VoyageSparePathController implements the CRUD actions for VoyageSparePath model.
 */
class VoyageSparePathController extends Controller
{
	/**
	 * Lists all VoyageSparePath models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new VoyageSparePathSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single VoyageSparePath model.
	 * @param integer $voyage_id
	 * @param integer $spare_part_id
	 * @return mixed
	 */
	public function actionView($voyage_id, $spare_part_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($voyage_id, $spare_part_id),
		]);
	}

	/**
	 * Creates a new VoyageSparePath model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new VoyageSparePath;

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
	 * Updates an existing VoyageSparePath model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $voyage_id
	 * @param integer $spare_part_id
	 * @return mixed
	 */
	public function actionUpdate($voyage_id, $spare_part_id)
	{
		$model = $this->findModel($voyage_id, $spare_part_id);

		if ($model->load($_POST) && $model->save()) {
            // return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing VoyageSparePath model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $voyage_id
	 * @param integer $spare_part_id
	 * @return mixed
	 */
	public function actionDelete($voyage_id, $spare_part_id)
	{
		$this->findModel($voyage_id, $spare_part_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the VoyageSparePath model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $voyage_id
	 * @param integer $spare_part_id
	 * @return VoyageSparePath the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($voyage_id, $spare_part_id)
	{
		if (($model = VoyageSparePath::findOne(['voyage_id' => $voyage_id, 'spare_part_id' => $spare_part_id])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
