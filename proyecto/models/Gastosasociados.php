<?php

namespace app\models;

use Yii;


class Gastosasociados extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'GASTOS_ASOCIADOS';
    }

    public function rules()
    {
        return [
            [['ID_TIPO_DE_VIAJE'], 'integer'],
            [['NOMBRE_GASTO_ASOCIADO', 'MONTO_GASTO_ASOCIADO'], 'required'],
            [['MONTO_GASTO_ASOCIADO'], 'number'],
            [['NOMBRE_GASTO_ASOCIADO'], 'string', 'max' => 255]
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'ID_GASTO_ASOCIADO' => 'Id  Gasto  Asociado',
            'ID_TIPO_DE_VIAJE' => 'Tipo  De  Viaje',
            'NOMBRE_GASTO_ASOCIADO' => 'Nombre  Gasto  Asociado',
            'MONTO_GASTO_ASOCIADO' => 'Monto  Gasto  Asociado',
        ];
    }
}
