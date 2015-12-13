<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Connection;
//inicio cosas gestion tipo viaje
use app\models\TipoViajeForm;
use app\models\TipoViaje;
use yii\helpers\Html;
//fin cosas gestion tipo viaje

use mPDF; //Para el PDF

class SiteController extends Controller
{
	
	public function actionSaludar(){
		$saludar = "Hola mundo";
		return $this->render("saludar", ["saludar" => $saludar]);
	}

	public function actionPdf(){
        $mpdf = new mPDF;
        
       	$connection = new \yii\db\Connection(Yii::$app->db);
       	$connection -> open();
       	$sql = "Select * from usuario";
       	$command = $connection -> createCommand($sql);
       	$dataReader = $command -> query();
       	$str = "<table> <tbody>";
       	foreach($dataReader as $row) { 
       		$str = $str."<tr>";
       		foreach ($row as $col) {
       			$str = $str."<td>".$col."</td>";
       		}
       		$str = $str."</tr>";
       	}
       	$str = $str."</tbody></table>";
       	
        $mpdf -> WriteHTML($str);
        $mpdf -> Output();
        $connection -> close();
        exit;
	}
	
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCrearTViaje(){
        $model = new TipoViajeForm;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new TipoViaje;
                $table->NOMBRE_TIPO_DE_VIAJE = $model->nombre_tipo_viaje;
                $table->MONTO_MAXIMO = $model->monto_maximo;
                if ($table->insert()){
                    $msg = '<div class="alert alert-success" role="alert"><strong>Guardado!</strong> Tipo de viaje agregado correctamente.</div>';
                    $model->nombre_tipo_viaje = null;
                    $model->monto_maximo = null;
                }else{
                    $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> No se pudo agregar el Tipo de Viaje.</div>';
                }
                $table = new TipoViaje;
                $model = $table->find()->all();
                return $this->render("tipo-viaje", ["model" => $model, 'msg' => $msg]);
            }
            else{
                $model->getErrors();
            }
        }
        return $this->render("crear-tipo-viaje", ['model' => $model, 'msg' => $msg]);
    }
    
    public function actionVerTViaje()
    {
        $table = new TipoViaje;
        $msg = null;
        $model = $table->find()->all();
        return $this->render("tipo-viaje", ["model" => $model, 'msg' => $msg]);
    }
    
    public function actionBorrarTViaje()
    {
        $msg = null;
        if(Yii::$app->request->post())
        {
            $ID_TIPO_DE_VIAJE = Html::encode($_POST["ID_TIPO_DE_VIAJE"]);
            if((int) $ID_TIPO_DE_VIAJE)
            {
                if(TipoViaje::deleteAll("ID_TIPO_DE_VIAJE=:ID_TIPO_DE_VIAJE", [":ID_TIPO_DE_VIAJE" => $ID_TIPO_DE_VIAJE]))
                {
                    
                    $msg = '<div class="alert alert-success" role="alert"><strong>Eliminado!</strong> Tipo de viaje eliminado correctamente.</div>';
                }
                else
                {
                    $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> El Tipo de Viaje no se elimino.</div>';
                }
            }
            else
            {
                $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> El Tipo de Viaje no se elimino.</div>';
            }
        }
        $table = new TipoViaje;
        $model = $table->find()->all();
        return $this->render("tipo-viaje", ["model" => $model, 'msg' => $msg]);
    }
    
    public function actionEditarTViaje()
    {
        $model = new TipoViajeForm;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = TipoViaje::findOne($model->id_tipo_viaje);
                
                if($table)
                {
                    $table->NOMBRE_TIPO_DE_VIAJE = $model->nombre_tipo_viaje;
                    $table->MONTO_MAXIMO = $model->monto_maximo;
                    if ($table->update())
                    {
                        $msg = '<div class="alert alert-success" role="alert"><strong>Modificado!</strong> El Tipo de Viaje fue modificado.</div>';
                    }
                    else
                    {
                        $msg = '<div class="alert alert-warning" role="alert"><strong>Peligro!</strong> El tipo de viaje no se modifico.</div>';
                    }
                }
                else
                {
                    $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> Tipo de Viaje no encontrado.</div>';
                }
                $model = $table->find()->all();
                return $this->render("tipo-viaje", ["model" => $model, 'msg' => $msg]);
            }
            else
            {
                $model->getErrors();
            }
        }
        
        if (Yii::$app->request->get("ID_TIPO_DE_VIAJE"))
        {
            $ID_TIPO_DE_VIAJE = Html::encode($_GET["ID_TIPO_DE_VIAJE"]);
            if ((int) $ID_TIPO_DE_VIAJE)
            {
                $table = TipoViaje::findOne($ID_TIPO_DE_VIAJE);
                if($table)
                {
                    $model->id_tipo_viaje = $table->ID_TIPO_DE_VIAJE;
                    $model->nombre_tipo_viaje = $table->NOMBRE_TIPO_DE_VIAJE;
                    $model->monto_maximo = $table->MONTO_MAXIMO;
                }
                else
                {
                    return $this->redirect(["site/tipo-viaje"]);
                }
            }
            else
            {
                return $this->redirect(["site/tipo-viaje"]);
            }
        }
        else
        {
            return $this->redirect(["site/tipo-viaje"]);
        }
        return $this->render("editar-tipo-viaje", ["model" => $model, "msg" => $msg]);
    }
}
