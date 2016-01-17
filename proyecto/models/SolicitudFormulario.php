<?php

	namespace app\models;
	use yii;
	use yii\db\ActiveRecord;


	class SolicitudFormulario extends ActiveRecord{

		public static function getDB()
		{
			return Yii::$app->db;

		}

		public static function tableName()
		{
			return "SOLICITUD_DE_VIAJE";
		}
	

	public function rules()
	{
		return[
				["ID_ESTADO", "required", "message" => "Campo requerido."]

				];

	}

}
?>