<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\base\model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;


class DepartamentoForm extends ActiveRecord{

	
	public $reCaptcha;

	public static function tableName(){

		return "DEPARTAMENTO";
	}
	
	public function rules(){
		return [
		["NOMBRE_DEPARTAMENTO", "required", "message" => "Ingrese nombre departamento"],
		#["NOMBRE_DEPARTAMENTO", "match", "pattern" => "/^[!\"#$%&/(/)=?¡¿¨~'\\*<\+\-\{\}\[\]>,.;@|°¬]/+$", "not" => true, "message"=> "Caracteres no permitidos: ! \ \" # $ % & / ( ) = ? ¡ ¿ ¨ ~ ' \ * - < +  - [ ] { } > , . ; @ | ° ¬"],
		["NOMBRE_DEPARTAMENTO", "match", "pattern" => "/^[a-záéíóúñ\s]+$/i", "message" => "Solo se aceptan letras"],
		["NOMBRE_DEPARTAMENTO", "unique", "message" => "Departamento ya existe"],
		["NOMBRE_DEPARTAMENTO", "string", "message" => "Debe de ser una cadena de texto"],
		[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],
		];
	}

	public function attributeLabels(){
		return ["reCaptcha" => "Verifique su humanidad"];
	}


}







?>

