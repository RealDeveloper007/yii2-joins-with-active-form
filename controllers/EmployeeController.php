<?php

namespace app\controllers;

use Yii;
use app\models\Employee;
use app\models\EmployeeDetails;
use app\models\Designations;
use app\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new Employee();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'Emodel' => $this->findEModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $data['model'] = new Employee();
        $data['Emodel'] = new EmployeeDetails();
        $data['Designations'] = Designations::find()->where(['status'=>1])->asArray()->all();
            
        if(Yii::$app->request->ispost)
        {
            $GetData = Yii::$app->request->post(); 
        if ($data['model']->load(Yii::$app->request->post()) && $data['model']->save()) 
        {
            $data['Emodel']->emplyoee_id = $data['model']->id;
            $data['Emodel']->designation = $GetData['EmployeeDetails']['designation'];
            $data['Emodel']->salary      = $GetData['EmployeeDetails']['salary'];
            if($data['Emodel']->save())
            {
                return $this->redirect(['view', 'id' => $data['model']->id]);
            }
        }
        }
            
        return $this->render('create', [
            'data' => $data,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {        
        $data['model'] = $this->findModel($id);
        $data['Emodel'] = $this->findEModel($id);
        $data['Designations'] = Designations::find()->where(['status'=>1])->asArray()->all();
            

        if(Yii::$app->request->ispost)
        {
            $GetData = Yii::$app->request->post(); 
//            print_r($GetData); die;
        if ($data['model']->load(Yii::$app->request->post()) && $data['model']->save()) 
        {
            $data['Emodel']->emplyoee_id = $id;
            $data['Emodel']->designation = $GetData['EmployeeDetails']['designation'];
            $data['Emodel']->salary      = $GetData['EmployeeDetails']['salary'];
            if($data['Emodel']->save())
            {
                return $this->redirect(['view', 'id' => $data['model']->id]);
            }
        }
        }

        return $this->render('update', [
            'data' => $data,
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    protected function findEModel($id)
    {
        if (($model = EmployeeDetails::findOne(['emplyoee_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
