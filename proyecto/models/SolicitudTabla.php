<?php

	namespace app\models;
	use yii;
	use yii\db\ActiveRecord;


	class SolicitudTabla extends ActiveRecord{

		public static function getDB()
		{
			return Yii::$app->db;

		}


		public static function tableName()
		{
			return "SOLICITUD_DE_VIAJE";
		}
	}
?>