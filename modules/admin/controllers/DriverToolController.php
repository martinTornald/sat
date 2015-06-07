<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Driver;
use app\modules\admin\models\DriverTool;
use app\modules\admin\models\DriverToolSearch;
use app\modules\admin\models\Tool;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * DriverToolController implements the CRUD actions for DriverTool model.
 */
class DriverToolController extends Controller
{
	/**
	 * Lists all DriverTool models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new DriverToolSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single DriverTool model.
	 * @param integer $driver_id
	 * @param integer $tool_id
	 * @return mixed
	 */
	public function actionView($driver_id, $tool_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($driver_id, $tool_id),
		]);
	}

	/**
	 * Creates a new DriverTool model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DriverTool;

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
            'drivers' => Driver::find()->all(),
            'tools' => Tool::find()->all(),
        ]);
	}

	/**
	 * Updates an existing DriverTool model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $driver_id
	 * @param integer $tool_id
	 * @return mixed
	 */
	public function actionUpdate($driver_id, $tool_id)
	{
		$model = $this->findModel($driver_id, $tool_id);

		if ($model->load($_POST) && $model->save()) {
            // return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
                'drivers' => Driver::find()->all(),
                'tools' => Tool::find()->all(),
			]);
		}
	}

	/**
	 * Deletes an existing DriverTool model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $driver_id
	 * @param integer $tool_id
	 * @return mixed
	 */
	public function actionDelete($driver_id, $tool_id)
	{
		$this->findModel($driver_id, $tool_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the DriverTool model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $driver_id
	 * @param integer $tool_id
	 * @return DriverTool the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($driver_id, $tool_id)
	{
		if (($model = DriverTool::findOne(['driver_id' => $driver_id, 'tool_id' => $tool_id])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
