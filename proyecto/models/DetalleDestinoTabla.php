<?php

	namespace app\models;
	use yii;
	use yii\db\ActiveRecord;


	class DetalleDestinoTabla extends ActiveRecord{

		public static function getDB()
		{
			return Yii::$app->db;

		}


		public static function tableName()
		{
			return "DESTINO";
		}
	}
?>