<?php
	namespace app\models;
	use yii;


	class Usuario extends \yii\db\ActiveRecord{

		public $id_usuario;
		public $nombre_usuario;
		public $id_departamento;
		public $rol;
		public $email;
		public $password;
		public $password_repeat;
	

	

		public function rules(){

			return [
						["nombre_usuario", "required", "message" => "Compo requerido."],
						["nombre_usuario", "string", "message" => "Debe de ser una cadena de texto"],
						["id_departamento", "integer", "message" => "Debe de ser un número"],
						["rol", "required", "message" => "Compo requerido."],
						["email", "required", "message" => "Compo requerido."],
						["email", "email", "message" => "Debe ser un Email valido."],
						["password", "required", "message" => "Compo requerido."],
						["password", "string", "message" => "Debe ingresar una cadena de texto."],
						["password_repeat", "required", "message" => "Compo requerido."],
						["password_repeat", "compare", "compareAttribute" => "password","message" => "No son iguales."],

			];
		}

		public function attributeLabels(){

			return [
				"nombre_usuario" => "Nombre de usuario", "id_departamento" => "ID del departamento", 
				"rol" => "Rol del usuario", "password" => "Contraseña", "password_repeat" => "Repita contraseña"];

		}


	}

?>