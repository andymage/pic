<?php

namespace backend\controllers;

use Yii;
use common\models\Horario;
use common\models\Pic;
use common\models\HorarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * HorarioController implements the CRUD actions for Horario model.
 */
class HorarioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Horario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HorarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Horario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Horario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Horario();
        $pic = self::idPic();
        $tipo = Horario::$tipos;
        $dias = Horario::$dias;

        if (Yii::$app->request->isPost) {
            $dias = Yii::$app->request->post('Horario')['dia'];
            foreach ($dias as $key => $value) {
                $model = new Horario();
                $model->id_pic = Yii::$app->request->post('Horario')['id_pic'];
                $model->dia = $value;
                $model->hora = Yii::$app->request->post('Horario')['hora'];
                $model->tipo = Yii::$app->request->post('Horario')['tipo'];
                $model->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'pic' => $pic,
                'tipo' => $tipo,
                'dias' => $dias
            ]);
        }
    }

    /**
     * Updates an existing Horario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pic = self::idPic();
        $tipo = Horario::$tipos;
        $dias = Horario::$dias;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'pic' => $pic,
                'tipo' => $tipo,
                'dias' => $dias
            ]);
        }
    }

    /**
     * Deletes an existing Horario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Horario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Horario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Horario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function idPic(){
        $array = Pic::find()->all();
        $array = ArrayHelper::map($array, 'id', 'nombre');
        return $array;
    }

    public function actionIp(){
        $id = 1;
        $busqueda = Horario::find()
            ->where(['id_pic' => $id])
            ->all();
        $hora = date('H:i');
        $url = '';
        foreach ($busqueda as $key => $value) {
            $horario = explode(':', $value->hora);
            $horario = $horario[0] . ':' . $horario[1];
            if ($hora == $horario) {
                if ($value->tipo == Horario::ENCENDIDO) {
                    $url = $value->idPic->ip_encendido;
                }
                else{
                    $url = $value->idPic->ip_apagado;
                }
            }
        }
        echo $url;
    }
}
