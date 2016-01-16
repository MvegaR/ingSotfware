<?php

	namespace app\models;
	use yii;
	use yii\db\ActiveRecord;


	class DetalleViajeTabla extends ActiveRecord{

		public static function getDB()
		{
			return Yii::$app->db;

		}


		public static function tableName()
		{
			return "VIAJE";
		}
	}
?>