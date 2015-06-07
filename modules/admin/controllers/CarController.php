<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\base\CarInaction;
use app\modules\admin\models\Car;
use app\modules\admin\models\Owner;
use app\modules\admin\models\Insurance;
use app\modules\admin\models\CarSearch;
use app\modules\admin\models\Voyage;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{
    /**
     * Lists all Car models.
     * @return mixed
     */
    public function actionInaction()
    {
        return $this->render('inaction', [
            'cars' => Car::find()->all(),
        ]);
    }

    public function actionInactionUpdate()
    {
        $this->updateInaction();
        $this->getInaction();

        return $this->redirect(Url::to('inaction'));
    }

    /**
     * Lists all Car models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarSearch;
        $dataProvider = $searchModel->search($_GET);

        Url::remember();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Car model.
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
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Car;

        try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }


        return $this->render('create', [
            'model' => $model,
            'owner' => Owner::find()->all(),
            'years' => $this->getYears(),
        ]);
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            //return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
                'owner' => Owner::find()->all(),
                'years' => $this->getYears(),
            ]);
        }
    }

    /**
     * Deletes an existing Car model.
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
     * Finds the Car model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Car the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Car::findOne($id)) !== null) {
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
    public function getYears()
    {
        $years = array();
        $currentYear = date('Y');
        for ($year = $currentYear; $year > 1949; $year--) {
            array_push($years, array(
                    'id' => $year,
                    'year' => $year,
                )
            );
        }
        return $years;
    }

    /**
     * Задает простои машин
     */
    public function updateInaction() {
        $cars = Car::find()->all();
        $voyage_prev = null;
        $voyage_next = null;

        foreach ($cars as $car) {
            $inactions = $car->carInactions;
            $skey = 0;
            $voyages = $car->voyages;

            if (count($voyages) > 1) {
                foreach ($voyages as $key => $voyage) {
                    if (strtotime($voyage->loading->fact) < strtotime($voyages[$skey]->loading->fact)) {
                        $skey = $key;
                    }
                }
                $voyage_prev = $voyages[$skey];
                array_splice ($voyages,$skey,1);
                $skey = 0;
            }
            while (count($voyages) > 0) {
                $skey = 0;
                foreach ($voyages as $key => $voyage) {
                    if (strtotime($voyage->loading->fact) <= strtotime($voyages[$skey]->loading->fact)) {
                        $skey = $key;
                    }
                }

                $voyage_next = $voyages[$skey];
                array_splice ($voyages,$skey,1);
                if(strtotime($voyage_prev->unloading->fact) < strtotime($voyage_next->loading->fact)) {

                    $isInaction = false;
                    foreach ($inactions as $inaction) {
                        if($inaction->voyage_prev == $voyage_prev->id && $inaction->voyage_next == $voyage_next->id) {
                            $isInaction = true;
                            break;
                        }
                    }

                    if(!$isInaction) {
                        $carInaction = new CarInaction();
                        $carInaction->car_id = $car->id;
                        $carInaction->voyage_prev = $voyage_prev->id;
                        $carInaction->voyage_next = $voyage_next->id;
                        $carInaction->save(false);
                    }

                    $voyage_prev = $voyage_next;

                }



            }
        }
    }
    /**
     * Задает простои машин
     */
    public function setInaction() {
        $cars = Car::find()->all();
        $voyage_prev = null;
        $voyage_next = null;

        foreach ($cars as $car) {
            $skey = 0;
            $voyages = $car->voyages;

            if (count($voyages) > 1) {
                foreach ($voyages as $key => $voyage) {
                    if (strtotime($voyage->loading->fact) < strtotime($voyages[$skey]->loading->fact)) {
                        $skey = $key;
                    }
                }
                $voyage_prev = $voyages[$skey];
                array_splice ($voyages,$skey,1);
                $skey = 0;
            }
            while (count($voyages) > 0) {
                $skey = 0;
                foreach ($voyages as $key => $voyage) {
                    if (strtotime($voyage->loading->fact) <= strtotime($voyages[$skey]->loading->fact)) {
                        $skey = $key;
                    }
                }

                $voyage_next = $voyages[$skey];
                array_splice ($voyages,$skey,1);
                if(strtotime($voyage_prev->unloading->fact) < strtotime($voyage_next->loading->fact)) {
                    $carInaction = new CarInaction();
                    $carInaction->car_id = $car->id;
                    $carInaction->voyage_prev = $voyage_prev->id;
                    $carInaction->voyage_next = $voyage_next->id;
                    $voyage_prev = $voyage_next;

                    $carInaction->save(false);
                }



            }
        }
    }

    public function getInaction() {
        $fileStat = fopen('statistics/stat.csv', 'w');
        $cars = Car::find()->all();
        foreach ($cars as $car) {
            $quarterInactions = $car->quarterInaction;
            foreach ($quarterInactions as $quarterInaction) {
                fputcsv($fileStat, array($car->id,$quarterInaction['start'],$quarterInaction['end'],$quarterInaction['count']));
            }
        }
        fclose($fileStat);
    }
}
