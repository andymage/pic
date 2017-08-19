<?php

namespace backend\controllers;

use Yii;
use common\models\Pivote;
use common\models\PivoteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PivoteController implements the CRUD actions for Pivote model.
 */
class PivoteController extends Controller
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
     * Lists all Pivote models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PivoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pivote model.
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
     * Creates a new Pivote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pivote();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pivote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $id = 1;
        $model = Pivote::findOne($id);
        if (empty($model)) {
            $model = New Pivote;
            $model->id = 1;
            $model->id_pic = 0;
            $model->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pivote model.
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
     * Finds the Pivote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pivote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pivote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPeticion(){
        $pivote = Pivote::findOne(1)->id;
        $ch = curl_init();
        // definimos la URL a la que hacemos la petición
        curl_setopt($ch, CURLOPT_URL,"http://10.14.60.41/pic/backend/web/index.php/horario/ip?id=" . $pivote);
        // indicamos el tipo de petición: POST
        // definimos cada uno de los parámetros
        //curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");
         
        // recibimos la respuesta y la guardamos en una variable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $remote_server_output = curl_exec ($ch);
        curl_close ($ch);

        $ch = curl_init();
        // definimos la URL a la que hacemos la petición
        curl_setopt($ch, CURLOPT_URL,$remote_server_output);
        // indicamos el tipo de petición: POST
        // definimos cada uno de los parámetros
        //curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");
         
        // recibimos la respuesta y la guardamos en una variable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $remote_server_output = curl_exec ($ch);
        curl_close ($ch);
        // cerramos la sesión cURL
    }
}
