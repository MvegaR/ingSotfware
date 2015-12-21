<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\FormGastos;
use app\models\Gastos;

class GastosController extends Controller{
	
	public $enableCsrfValidation = false;

    public function actionIndex(){
        return $this -> render("index");
    }

     public function actionCrear(){
        return $this -> render("crear-solicitud");
    }
     public function actionProcesar(){
        return $this -> render("procesar");
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*INICIO PARTE RAMÓN*/

	public function actionUpdate()
	{
		$model = new FormGastos;
		$msg = null;
		
		if($model->load(Yii::$app->request->post()))
		{
			if($model->validate())
			{
				$table = Gastos::findOne($model->ID_GASTO);
				//var_dump(isset($model));
				//print_r($model);
				if($table)
				{
					//$table->ID_GASTO = $model->ID_GASTO;
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
				$model = $table->find()->all();
				return $this->render("../gastos/", ["model" => $model, 'msg' => $msg]);
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
				$table = Gastos::findOne($ID_GASTO);
				if($table)
				{
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
		$table = new Gastos;
		$model = $table->find()->all();

		
		return $this->render("view",["model"=> $model]);
	}


	public function actionCreate(){
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
					$model->fechagasto=null;
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


?>
