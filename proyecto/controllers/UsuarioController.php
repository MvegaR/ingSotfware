<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Connection;

use app\models\Usuario;
use app\models\UsuarioTabla;
use yii\helpers\Url;
use yii\helpers\Html;



class UsuarioController extends controller{

	public function actionView(){

		$tabla = new UsuarioTabla();
		return $this -> render("View", ["model" => $tabla -> find() -> all()] );
	}

	public function actionUpdate(){

		$models = new Usuario();
		$msg = null;

		if($models -> load(Yii::$app->request->post())){
			if($models -> validate()){
				$tabla = UsuarioTabla::findOne($_GET["id_usuario"]);
				if($tabla){
					$tabla -> NOMBRE_USUARIO = $models -> nombre_usuario;
					$tabla -> ID_DEPARTAMENTO = $models -> id_departamento;
					$tabla -> ROL = $models -> rol;
					$tabla -> EMAIL = $models -> email;
					if($tabla -> PASSWORD != $models -> password){
						$tabla -> PASSWORD = sha1($models -> password);
					}

					if($tabla -> update()){
						$msg = '<div class="alert alert-success" role="alert">Usuario actualizado correctamente.</div>';
					}else{
						$msg = '<div class="alert alert-danger" role="alert">Error al actualizar</div>';
					
					}
				}else{
					$msg = '<div class="alert alert-warning" role="alert">Usuario no encontrado.</div>';
				}

			}

		}


		if(Yii::$app -> request -> get("id_usuario")){
			$id_usuario = Html::encode($_GET["id_usuario"]);
			if((int) $id_usuario){
				$tabla = UsuarioTabla::findOne($id_usuario);
				if($tabla){
					$models -> id_usuario = $tabla -> ID_USUARIO;
					$models -> nombre_usuario = $tabla -> NOMBRE_USUARIO;
					$models -> id_departamento = $tabla -> ID_DEPARTAMENTO;
					$models -> rol = $tabla -> ROL;
					$models -> email = $tabla -> EMAIL;
					$models -> password = $tabla -> PASSWORD;
					$models -> password_repeat = $tabla -> PASSWORD;

				}else{
					$msg = "Tabla no encontrada";
					return $this->redirect(["usuario/view"]);
				}

			}else{
				$msg = "ID no valido";
				return $this->redirect(["usuario/view"]);
			}
		}else{
			
			return $this->redirect(["usuario/view"]);
		}

		return $this -> render("Update", ["models" => $models, "msg" => $msg]);
	}

	public function actionDelete(){

		if(Yii::$app -> request -> post()){
			$id = Html::encode($_POST["ID_USUARIO"]);
			if((int) $id){
				if(UsuarioTabla::deleteAll("ID_USUARIO = :id",[":id" => $id])){
					return $this -> redirect((["usuario/view"]));
				}else{
					echo "Ha ocurrido un error al eliminar.";
					echo "<meta html-equiv='refresh' content='3;".Url::toRoute("usuario/view")."'>";
				}
			}else{
				echo "Ha ocurrido un error al eliminar.";
				echo "<meta html-equiv='refresh' content='3;".Url::toRoute("usuario/view")."'>";
			}

		}else{

			return $this -> redirect((["usuario/view"]));
		}

	}


	public function actionCreate(){
		$models = new Usuario();
		$msg = null;

		if($models-> load(Yii::$app->request->post())){
			if($models -> validate()){
				$table = new UsuarioTabla;
				$table -> NOMBRE_USUARIO = $models -> nombre_usuario;
				$table -> ID_DEPARTAMENTO = $models -> id_departamento;
				$table -> ROL = $models -> rol;
				$table -> EMAIL = $models -> email;
				$table -> PASSWORD = sha1($models -> password);
				$table -> ID_USUARIO = null;
				$table -> AUTHKEY = "asdf";
				$table -> ACCESSTOKEN = "asdf";
				if($table -> insert()){
					$msg = '<div class="alert alert-success" role="alert">Registro insertado correctamente</div>';
					$models = new Usuario();
				}else{
					$msg = '<div class="alert alert-danger" role="alert">Error al insertar registro</div>';
				}
			}
		}else{
			$models -> getErrors();
		}

		return $this->render("Create",["models" => $models,"msg" => $msg]);
	}

}

?>