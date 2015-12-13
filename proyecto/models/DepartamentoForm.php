<?php
namespace app\models;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;


class DepartamentoForm extends Model{

	$nombre_departamento;
	$reCaptcha;
	
	public function rules(){
		return [
		["nombre_departamento", "required", "message" => "Nombre departamento"],
		["nombre_departamento"], "string", "message" => "Debe de ser una cadena de texto"],
		[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],
		];
	}


}







?>

