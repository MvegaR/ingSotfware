<?php
namespace app\controllers;
use Yii;
use app\models\ROL;
use yii\web\Controller;
use yii\web\UnauthorizedHttpException;

class PermisosController extends Controller{
	public static function permisoAdministrador(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Administrador"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}
	public static function permisoDocente(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Docente"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}
	public static function permisoDecano(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Decano"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;
	}

	public static function permisoDirector(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Director"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;
	}

	public static function permisoDocenteDirector(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Docente" && $rol != "Director"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}

	public static function permisoDocenteDecano(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Docente" && $rol != "Decano"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}

	public static function permisoDirectorDecano(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Director" && $rol != "Decano"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}

	public static function permisoDocenteDirectorDecano(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
		if( $rol != "Docente" && $rol != "Director" && $rol != "Decano"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}


}


?>