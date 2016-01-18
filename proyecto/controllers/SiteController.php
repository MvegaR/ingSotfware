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
//Inicio Ramon
use yii\widgets\ActiveForm;
use app\models\FormGastos;
use app\models\Gastos;
use yii\base\Model;
use yii\helpers\Url;
 //Para el PDF
use mPDF;
use yii\web\UnauthorizedHttpException;

class SiteController extends Controller
{

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*INICIO PARTE RAMÓN 2*/
	public function actionUpdategas()
    {
    	PermisosController::permisoDocenteDirectorDecano();
        $model = new FormGastos;
        $msg = null;
        
        if($model->load(Yii::$app->request->post())) //esto falla, pero da true.
        {
        	//$table = GASTOS::findOne($model->ID_GASTO); //RAMON
        	$table = Gastos::findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE AND G.ID_GASTO = ".$model -> ID_GASTO.
										" AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> one();

        	
        	if(!$table) throw new UnauthorizedHttpException;

			$model -> ID_GASTO = $table -> ID_GASTO;
			$model -> id_viaje = $table -> ID_VIAJE; 
			//porque falla hay que hacer esto, no sé por qué:
			$model -> estadogasto = (int)Yii::$app->request->post()["FormGastos"]["estadogasto"];
			$model -> nombregasto = $table -> NOMBRE_GASTO;
			$model -> montogasto = $table -> MONTO_GASTO;
			$model -> fechagasto = $table -> FECHA_GASTO;

            if($model->validate())
            {
                
                if($table)
                {
                	
                    $table->ID_GASTO = $model->ID_GASTO;
                    $table->ID_ESTADO_GASTO = $model->estadogasto;

                    if ($table->update())
                    {
                        $msg = "El estado de gasto ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El estado de gasto no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El Gasto seleccionado no ha sido encontrado";
                }
                $table = new Gastos;
				//$model = $table->find()->all();
				$model = $table -> findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE
										AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> all(); //MARCOS
				return $this->render("formu", ["model" => $model, 'msg' => $msg]);
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("ID_GASTO"))
        {
            $ID_GASTO = Html::encode($_GET["ID_GASTO"]);
            if ((int) $ID_GASTO)
            {
               // $table = GASTOS::findOne($ID_GASTO); //Ramón
            	        	$table = Gastos::findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE AND G.ID_GASTO = ".$ID_GASTO.
										" AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> one(); //Marcos
        		if(!$table) throw new UnauthorizedHttpException;

                if($table)
                {
                   	$model->ID_GASTO = $table->ID_GASTO;
                    $model->estadogasto = $table->ID_ESTADO_GASTO;
                }
                else
                {
                    return $this->redirect(["site/formu"]);
                }
            }
            else
            {
                return $this->redirect(["site/formu"]);
            }
        }
        else
        {
            return $this->redirect(["site/formu"]);
        }
        return $this->render("updategas", ["model" => $model, "msg" => $msg]);
    }

	public function actionFormu(){
		PermisosController::permisoDocenteDirectorDecano();
		$table = new GASTOS;
		//$model = $table->find()->all(); //RAMÓN

		$model = $table -> findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE
										AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> all(); //MARCOS

		return $this->render("formu",["model"=> $model]);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*FIN PARTE RAMÓN 2*/
	public function actionSaludar(){
		$saludar = "Hola mundo";
		return $this->render("saludar", ["saludar" => $saludar]);
	}

	public function actionPdf(){
		if (Yii::$app->request->get("ID_SOLICITUD")){
			$ID_SOLICITUD = Html::encode($_GET["ID_SOLICITUD"]);
			$mpdf = new mPDF;
			$connection = new \yii\db\Connection(Yii::$app->db);
			$connection -> open();
			$str = '<table border=0 cellspacing=0 cellpadding=2><tbody><tr><td><img src="http://www.ubiobio.cl/mcc/images/ubbdescargagradientesolo.png"/></td><td><h1>RENDICION DE GASTOS</h1><br>Fecha: '.date("d-m-Y").'</td></tr></table>';
$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$sql = "Select ID_SOLICITUD, ID_TIPO_DE_VIAJE, ID_VIAJE, FECHA_SOLICITUD, CUERPO_SOLICITUD from SOLICITUD_DE_VIAJE where ID_SOLICITUD=".$ID_SOLICITUD;
			$command = $connection -> createCommand($sql);
			$dataReader = $command -> query();
			$str = "<h2>- SOLICITUD:</h2><table border=1 cellspacing=0 cellpadding=2><tbody><tr><td>ID</td><td>FECHA SOLICITUD</td><td>CUERPO SOLICITUD</td></tr>";
			$dos = 1;
			foreach($dataReader as $row) {
				$ID_TIPO_DE_VIAJE = $row->ID_TIPO_DE_VIAJE;
				$str = $str."<tr>";
				foreach ($row as $col) {
					if($dos == 2) $ID_TIPO_DE_VIAJE = $col;
					else if($dos == 3) $ID_VIAJE = $col;
					else $str = $str."<td>".$col."</td>";
					$dos = $dos+1;
				}
				$str = $str."</tr>";
			}
			$str = $str."</tbody></table>";
			
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$sql = "Select * from TIPO_DE_VIAJE where ID_TIPO_DE_VIAJE='".$ID_TIPO_DE_VIAJE."'";
			$command = $connection -> createCommand($sql);
			$dataReader = $command -> query();
			$str = "<h2>- TIPO DE VIAJE DE LA SOLICITUD:</h2><table border=1 cellspacing=0 cellpadding=2><tbody><tr><td>ID</td><td>NOMBRE TIPO DE VIAJE</td><td>MONTO TIPO DE VIAJE</td></tr>";
			foreach($dataReader as $row) { 
				$str = $str."<tr>";
				foreach ($row as $col) {
					$str = $str."<td>".$col."</td>";
				}
				$str = $str."</tr>";
			}
			$str = $str."</tbody></table>";
			
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$sql = "Select * from VIAJE where ID_VIAJE='".$ID_VIAJE."'";
			$command = $connection -> createCommand($sql);
			$dataReader = $command -> query();
			$str = "<h2>- VIAJE DE LA SOLICITUD:</h2><table border=1 cellspacing=0 cellpadding=2><tbody><tr><td>ID</td><td>ORIGEN</td><td>FECHA INICIO</td><td>FECHA TERMINO</td></tr>";
			foreach($dataReader as $row) { 
				$str = $str."<tr>";
				foreach ($row as $col) {
					$str = $str."<td>".$col."</td>";
				}
				$str = $str."</tr>";
			}
			$str = $str."</tbody></table>";
			
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$sql = "Select ID_DESTINO, DURACION_VIAJE_DIAS, MEDIO_DE_TRANSPORTE, CIUDAD_DESTINO, PAIS_DESTINO from DESTINO where ID_VIAJE='".$ID_VIAJE."'";
			$command = $connection -> createCommand($sql);
			$dataReader = $command -> query();
			$str = "<h2>- DESTINO(S) DEL VIAJE:</h2><table border=1 cellspacing=0 cellpadding=2><tbody><tr><td>ID</td><td>DURACION</td><td>MEDIO DE TRANSPORTE</td><td>CIUDAD DESTINO</td><td>PAIS DESTINO</td></tr>";
			foreach($dataReader as $row) { 
				$str = $str."<tr>";
				foreach ($row as $col) {
					$str = $str."<td>".$col."</td>";
				}
				$str = $str."</tr>";
			}
			$str = $str."</tbody></table>";
			
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$sql = "Select ID_GASTO, NOMBRE_GASTO, MONTO_GASTO, FECHA_GASTO from GASTOS where ID_VIAJE='".$ID_VIAJE."'";
			$command = $connection -> createCommand($sql);
			$dataReader = $command -> query();
			$str = "<h2>- GASTO(s) ASOCIADOS AL VIAJE:</h2><table border=1 cellspacing=0 cellpadding=2><tbody><tr><td>ID</td><td>NOMBRE</td><td>MONTO</td><td>FECHA</td></tr>";
			$id_gasto = 1;
			foreach($dataReader as $row) { 
				$str = $str."<tr>";
				foreach ($row as $col) {
					if($id_gasto == 1) $ID_GASTO = $col;
					$id_gasto++; 
					$str = $str."<td>".$col."</td>";
				}
				$str = $str."</tr>";
			}
			$str = $str."</tbody></table>";
			
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$str = '<h2>- IMAGEN(ES) ASOCIADAS A CADA GASTO:</h2><p><img src="http://www.teacherclaudio.cl/wp-content/uploads/2014/07/Boleta_01.png"/></p>
<p><img src="http://am-sur.com/am-sur/peru/selva-m/Oxapampa-notizen-d/003-busbillet-Lobato-9-okt-2008.gif"/></p>
<p><img src="http://www.cosale.cl/wp-content/uploads/2013/10/boleta.jpg"/></p>
<p><img src="https://www.reclamos.cl/files/boleta_1_0.jpg"/></p>';
			$mpdf -> WriteHTML($str);
///////////////////////////////////////////////////////////////////
			$mpdf -> Output();
			$connection -> close();
			exit;
		}
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
	/* INICIO PARTE DE RAÚL. */
	public function actionCrearTViaje(){
		PermisosController::permisoAdministrador();
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
		PermisosController::permisoAdministrador();
		$table = new TipoViaje;
		$msg = null;
		$model = $table->find()->all();
		return $this->render("tipo-viaje", ["model" => $model, 'msg' => $msg]);
	}
	
	public function actionBorrarTViaje()
	{
		PermisosController::permisoAdministrador();
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
		PermisosController::permisoAdministrador();
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

	/* FIN PARTE RAÚL */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*INICIO PARTE RAMÓN*/

	public function actionUpdate()
	{
		PermisosController::permisoDocenteDirectorDecano();
		$model = new FormGastos;
		$msg = null;
		
		if($model->load(Yii::$app->request->post()))
		{
			if($model->validate())
			{
				
				//$table = Gastos::findOne($model->ID_GASTO); //RAMÓN
				$table = Gastos::findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE AND G.ID_GASTO = ".$model -> ID_GASTO.
										" AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> one(); //Marcos
				//var_dump(isset($model));
				//print_r($model);
				if(!$table) throw new UnauthorizedHttpException;
				if($table)
				{
					//$table->ID_GASTO = $model->ID_GASTO;
					$table->ID_GASTO = $model->ID_GASTO;
					$table->ID_VIAJE = $model->id_viaje;
					$table->NOMBRE_GASTO = $model->nombregasto;
					$table->MONTO_GASTO = $model->montogasto;
					$table->FECHA_GASTO = $model->fechagasto;
					if ($table->update())
					{
						$msg = "El Gasto ha sido actualizado correctamente";
					}
					else
					{
						$msg = "El Gasto no ha podido ser actualizado";
					}
				}
				else
				{
					$msg = "El Gasto seleccionado no ha sido encontrado";
				}$table = new Gastos;
				//$model = $table->find()->all(); //Ramon
				$model = $table -> findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE
										AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> all(); //MARCOS
				return $this->render("view", ["model" => $model, 'msg' => $msg]);
			}
			else
			{
				$model->getErrors();
			}
		}
		
		if (Yii::$app->request->get("ID_GASTO"))
		{
			$ID_GASTO = Html::encode($_GET["ID_GASTO"]);
			if ((int) $ID_GASTO)
			{
				$table = Gastos::findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE AND G.ID_GASTO = ".$ID_GASTO.
										" AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> one(); //Marcos
        		if(!$table) throw new UnauthorizedHttpException;
				if($table)
				{
					$model->ID_GASTO = $table->ID_GASTO;
					$model->id_viaje = $table->ID_VIAJE;
					$model->nombregasto = $table->NOMBRE_GASTO;
					$model->montogasto = $table->MONTO_GASTO;
					$model->fechagasto = $table->FECHA_GASTO;

				}
				else
				{
					return $this->redirect(["site/view"]);
				}
			}
			else
			{
				return $this->redirect(["site/view"]);
			}
		}
		else
		{
			return $this->redirect(["site/view"]);
		}
		return $this->render("update", ["model" => $model, "msg" => $msg]); 
	}


	public function actionDelete()
	{
		PermisosController::permisoDocenteDirectorDecano();
		if(Yii::$app->request->post())
		{
			$ID_GASTO = Html::encode($_POST["ID_GASTO"]);
			if((int)$ID_GASTO)
			{
				if(Gastos::deleteAll("ID_GASTO=:ID_GASTO", [":ID_GASTO" => $ID_GASTO]))
				{
					echo "Gasto con id $ID_GASTO eliminado con éxito, redireccionando ...";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
				}
				else
				{
					echo "Ha ocurrido un error al eliminar el gasto, redireccionando ...";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>"; 
				}
			}
			else
			{
				echo "Ha ocurrido un error al eliminar el gasto, redireccionando ...";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
			}
		}
		else
		{
			return $this->redirect(["site/view"]);
		}
	}

	
	public function actionView(){
		PermisosController::permisoDocenteDirectorDecano();
		$table = new Gastos;
		//$model = $table->find()->all(); //RAMÓN
		$model = $table -> findBySql("SELECT DISTINCT G.*
										FROM GASTOS G, VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE G.ID_VIAJE = J.ID_VIAJE
										AND J.ID_VIAJE = S.ID_VIAJE
										AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> all(); //MARCOS

		
		return $this->render("view",["model"=> $model]);
	}


	public function actionCreate(){
		PermisosController::permisoDocenteDirectorDecano();
		$model = new FormGastos;
		$msg = null;
		if($model->load(Yii::$app->request->post()))
		{   
			if($model->validate())
			{
				$table = new Gastos;
				$table->ID_VIAJE = $model->id_viaje;
				$table->NOMBRE_GASTO = $model->nombregasto;
				$table->MONTO_GASTO = $model->montogasto;
				$table->FECHA_GASTO = $model->fechagasto;
				if($table->insert()){
					$msg = "Registro guardado correctamente";
					$model->id_viaje=null;
					$model->nombregasto=null;
					$model->montogasto=null;
				}
				else{
					$msg = "Ha ocurrido un error";
				}
			}
			else
			{
				$model->getErrors();
			}
		}
		return $this->render("create", ['model' => $model, 'msg' => $msg]);
	}

	/*FIN PARTE RAMÓN*/


}
