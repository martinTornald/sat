<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\StatIncome;
use app\modules\admin\models\StatIncomeSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;

/**
 * StatIncomeController implements the CRUD actions for StatIncome model.
 */
class StatIncomeController extends Controller
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
	 * Lists all StatIncome models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new StatIncomeSearch;
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
	 * Displays a single StatIncome model.
	 * @param integer $stat_id
     *
	 * @return mixed
	 */
	public function actionView($stat_id)
	{
        $resolved = \Yii::$app->request->resolve();
        $resolved[1]['_pjax'] = null;
        $url = Url::to(array_merge(['/'.$resolved[0]],$resolved[1]));
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember($url);
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($stat_id),
		]);
	}

	/**
	 * Creates a new StatIncome model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new StatIncome;

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
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing StatIncome model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $stat_id
	 * @return mixed
	 */
	public function actionUpdate($stat_id)
	{
		$model = $this->findModel($stat_id);

		if ($model->load($_POST) && $model->save()) {
            $model->fact = $model->plan - $model->stat->statExpense->fullExpense;
            $model->save(['fact']);
            //return $this->redirect(Url::previous());
		}
        return $this->render('update', [
            'model' => $model,
        ]);
	}

	/**
	 * Deletes an existing StatIncome model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $stat_id
	 * @return mixed
	 */
	public function actionDelete($stat_id)
	{
        try {
            $this->findModel($stat_id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$stat_id',',');
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
	 * Finds the StatIncome model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $stat_id
	 * @return StatIncome the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($stat_id)
	{
		if (($model = StatIncome::findOne($stat_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
