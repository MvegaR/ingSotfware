<?php
namespace app\models;
use yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;


class Usuario extends \yii\db\ActiveRecord{

	public $id_usuario;
		#public $nombre_usuario;
	public $id_departamento;
	public $id_rol;
		#public $email;
	public $password;
	public $password_repeat;
	public $reCaptcha;

	public static function tableName(){
		return "USUARIO";
	}
	
	public function rules(){

		return [
		["NOMBRE_USUARIO", "required", "message" => "Campo requerido."],
		["NOMBRE_USUARIO", "string", "message" => "Debe de ser una cadena de texto"],
		["NOMBRE_USUARIO", "unique", "on"=>"insert", "message" => "Usuario ya existe"],
		["NOMBRE_USUARIO", "match", "pattern" => "/^[a-záéíóúñ]+$/i", "message" => "Solo se aceptan letras"],
		#["NOMBRE_USUARIO", "match", "pattern" => "/^[ ]+$/i","not" => true, "message" => "No se acepta espacios."],
		["id_departamento", "integer", "message" => "Debe de ser un número"],
		["id_rol", "required", "message" => "Campo requerido."],
		["EMAIL", "required", "message" => "Campo requerido."],
		["EMAIL", "email", "message" => "Debe ser un Email valido."],
		["EMAIL", "unique", "on" => "insert", "message" => "Email ya registrado"],
		["password", "required", "message" => "Campo requerido."],
		["password", "string", "message" => "Debe ingresar una cadena de texto."],
		["password_repeat", "required", "message" => "Campo requerido."],
		["password_repeat", "compare", "compareAttribute" => "password","message" => "No son iguales."],
		[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],

		];
	}

	public function attributeLabels(){

		return [
		"NOMBRE_USUARIO" => "Nombre de usuario", "id_departamento" => "Departamento", 
		"id_rol" => "Rol del usuario", "password" => "Contraseña", "password_repeat" => "Repita contraseña", "reCaptcha" => "Verifique su humanidad"];

	}


}

?>