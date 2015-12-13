<?php
	namespace app\models;
	use yii;
	use yii\base\Model;
	use himiklab\yii2\recaptcha\ReCaptchaValidator;


	class Usuario extends \yii\db\ActiveRecord{

		public $id_usuario;
		#public $nombre_usuario;
		public $id_departamento;
		public $rol;
		#public $email;
		public $password;
		public $password_repeat;
		public $reCaptcha;

		public static function tableName(){
			return "USUARIO";
		}
	
		public function rules(){

			return [
						["NOMBRE_USUARIO", "required", "message" => "Compo requerido."],
						["NOMBRE_USUARIO", "string", "message" => "Debe de ser una cadena de texto"],
						["NOMBRE_USUARIO", "unique", "message" => "Usuario ya existe"],
						["NOMBRE_USUARIO", "match", "pattern" => "/^[a-záéíóúñ\s]+$/i", "message" => "Solo se aceptan letras"],
						["id_departamento", "integer", "message" => "Debe de ser un número"],
						["rol", "required", "message" => "Compo requerido."],
						["EMAIL", "required", "message" => "Compo requerido."],
						["EMAIL", "email", "message" => "Debe ser un Email valido."],
						["EMAIL", "unique", "message" => "Email ya registrado"],
						["password", "required", "message" => "Compo requerido."],
						["password", "string", "message" => "Debe ingresar una cadena de texto."],
						["password_repeat", "required", "message" => "Compo requerido."],
						["password_repeat", "compare", "compareAttribute" => "password","message" => "No son iguales."],
						[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],

			];
		}

		public function attributeLabels(){

			return [
				"NOMBRE_USUARIO" => "Nombre de usuario", "id_departamento" => "ID del departamento", 
				"rol" => "Rol del usuario", "password" => "Contraseña", "password_repeat" => "Repita contraseña", "reCaptcha" => "Verifique su humanidad"];

		}


	}

?>