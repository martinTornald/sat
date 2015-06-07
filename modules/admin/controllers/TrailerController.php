<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Owner;
use app\modules\admin\models\Trailer;
use app\modules\admin\models\TrailerSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * TrailerController implements the CRUD actions for Trailer model.
 */
class TrailerController extends Controller
{
	/**
	 * Lists all Trailer models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new TrailerSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Trailer model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($id),
            'owner' => Owner::find()->all(),
            'years' => $this->getYears(),
		]);
	}

	/**
	 * Creates a new Trailer model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Trailer;

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
	 * Updates an existing Trailer model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
           // return $this->redirect(Url::previous());
		}
        return $this->render('update', [
            'model' => $model,
            'owner' => Owner::find()->all(),
            'years' => $this->getYears(),
        ]);
	}

	/**
	 * Deletes an existing Trailer model.
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
	 * Finds the Trailer model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Trailer the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Trailer::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

    /**
     * Возвращает список годов
     *
     * @return array
     */
    public function getYears() {
        $years = array();
        $currentYear = date('Y');
        for($year = $currentYear;  $year > 1949;  $year--) {
            array_push($years, array(
                    'id' => $year,
                    'year'=> $year,
                )
            );
        }
        return $years;
    }
}
