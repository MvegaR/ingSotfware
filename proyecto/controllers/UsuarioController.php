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
use app\models\DepartamentoTabla;
use app\models\DepartamentoForm;
use yii\helpers\Url;
use yii\helpers\Html;



class UsuarioController extends controller{

	public function actionView(){

		$tabla = new UsuarioTabla();
		return $this -> render("View", ["model" => $tabla -> find() -> all()] );
	}

	public function actionUpdate(){

		$model = new Usuario();
		$msg = null;

		if($model -> load(Yii::$app->request->post())){
			if($model -> validate()){
				$tabla = UsuarioTabla::findOne($_GET["id_usuario"]);
				if($tabla){
					$tabla -> NOMBRE_USUARIO = $model -> NOMBRE_USUARIO;
					$tabla -> ID_DEPARTAMENTO = $model -> id_departamento;
					$tabla -> ID_ROL = $model -> id_rol;
					$tabla -> EMAIL = $model -> EMAIL;
					if($tabla -> PASSWORD != $model -> password){
						$tabla -> PASSWORD = sha1($model -> password);
					}

					if($tabla -> update()){
						$msg = '<div class="alert alert-success" role="alert">Usuario actualizado correctamente.</div>';
					}else{
						$msg = '<div class="alert alert-danger" role="alert">Error al actualizar o no existen cambios</div>';
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
					$model -> id_usuario = $tabla -> ID_USUARIO;
					$model -> NOMBRE_USUARIO = $tabla -> NOMBRE_USUARIO;
					$model -> id_departamento = $tabla -> ID_DEPARTAMENTO;
					$model -> id_rol = $tabla -> ID_ROL;
					$model -> EMAIL = $tabla -> EMAIL;
					$model -> password = $tabla -> PASSWORD;
					$model -> password_repeat = $tabla -> PASSWORD;
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
		return $this -> render("Update", ["model" => $model, "msg" => $msg]);
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
		$model = new Usuario();
		$msg = null;

		if($model-> load(Yii::$app->request->post())){
			if($model -> validate()){
				$table = new UsuarioTabla;

				$table -> NOMBRE_USUARIO = $model -> NOMBRE_USUARIO;
				$table -> ID_DEPARTAMENTO = $model -> id_departamento;
				

				$table -> ID_ROL = $model -> id_rol;

				$table -> EMAIL = $model -> EMAIL;
				$table -> PASSWORD = sha1($model -> password);
				$table -> ID_USUARIO = null;
				$table -> AUTHKEY = "asdf";
				$table -> ACCESSTOKEN = "asdf";
				if($table -> insert()){
					$msg = '<div class="alert alert-success" role="alert">Registro insertado correctamente</div>';
					$model = new Usuario();
				}else{
					$msg = '<div class="alert alert-danger" role="alert">Error al insertar registro</div>';
				}
			}
		}else{
			$model -> getErrors();
		}

		return $this->render("Create",["model" => $model, "msg" => $msg]);
	}

	public function actionViewdep(){
		$tabla = new DepartamentoTabla;
		return $this -> render("ViewDepartamentos", ["model" => $tabla -> find() -> all()]);
	}

	public function actionCreatedep(){
		$model = new DepartamentoForm;
		$msg = null;

		if($model -> load(Yii::$app -> request -> post())){
			if($model -> validate()){
				$tabla = new DepartamentoTabla;
				$tabla -> NOMBRE_DEPARTAMENTO = $model -> NOMBRE_DEPARTAMENTO;
				if($tabla -> insert()){
					$msg = '<div class="alert alert-success" role="alert">Registro insertado correctamente</div>';
					$model = new DepartamentoForm;
				}else{
					$msg = '<div class="alert alert-danger" role="alert">Error al insertar registro</div>';
				}
			}

		}else{
			$model -> getErrors();
		}


		return $this -> render("CreateDep", ["model" => $model, "msg" => $msg]);
	}

	public function actionDeletedep(){

		if(Yii::$app -> request -> post()){
			$id = Html::encode($_POST["ID_DEPARTAMENTO"]);
			if((int) $id){
				if(DepartamentoTabla::deleteAll("ID_DEPARTAMENTO = :id",[":id" => $id])){
					return $this -> redirect((["usuario/viewdep"]));
				}else{
					echo "Ha ocurrido un error al eliminar.";
					echo "<meta html-equiv='refresh' content='3;".Url::toRoute("usuario/viewdep")."'>";
				}
			}else{
				echo "Ha ocurrido un error al eliminar.";
				echo "<meta html-equiv='refresh' content='3;".Url::toRoute("usuario/viewdep")."'>";
			}

		}else{
			return $this -> redirect((["usuario/viewdep"]));
		}

	}


	public function actionUpdatedep(){

		$model = new DepartamentoForm();
		$msg = null;

		if($model -> load(Yii::$app->request->post())){
			if($model -> validate()){
				$tabla = DepartamentoTabla::findOne($_GET["id_departamento"]);
				if($tabla){
					$tabla -> NOMBRE_DEPARTAMENTO = $model -> NOMBRE_DEPARTAMENTO;
				
					if($tabla -> update()){
						$msg = '<div class="alert alert-success" role="alert">Departamento actualizado correctamente.</div>';
					}else{
						$msg = '<div class="alert alert-danger" role="alert">Error al actualizar o no existen cambios</div>';
					}
				}else{
					$msg = '<div class="alert alert-warning" role="alert">Departamento no encontrado.</div>';
				}

			}

		}


		if(Yii::$app -> request -> get("id_departamento")){
			$id_departamento = Html::encode($_GET["id_departamento"]);
			if((int) $id_departamento){
				$tabla = DepartamentoTabla::findOne($id_departamento);
				if($tabla){
					
					$model -> NOMBRE_DEPARTAMENTO = $tabla -> NOMBRE_DEPARTAMENTO;
					
				}else{
					$msg = "Tabla no encontrada";
					return $this->redirect(["usuario/viewdep"]);
				}
			}else{
				$msg = "ID no valido";
				return $this->redirect(["usuario/viewdep"]);
			}
		}else{
			return $this->redirect(["usuario/viewdep"]);
		}
		return $this -> render("Updatedep", ["model" => $model, "msg" => $msg]);
	}

}
	




?>