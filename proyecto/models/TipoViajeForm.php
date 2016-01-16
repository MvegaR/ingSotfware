<?php

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\TipoViaje;

class TipoViajeForm extends Model{

    public $id_tipo_viaje;
    public $nombre_tipo_viaje;
    public $monto_maximo;

public function rules()
 {
  return [
   [['nombre_tipo_viaje'], 'required', 'message' => 'Campo requerido'],
   ['nombre_tipo_viaje', 'string'],
   ['nombre_tipo_viaje', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => 'Solo se aceptan caracteres alfanumericos'],
   ['monto_maximo', 'integer', 'message' => 'El monto debe ser un numero'],
   ['monto_maximo', 'required'],
   ['monto_maximo', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor mayor que 0'],
   ['id_tipo_viaje', 'integer'],
  ];
 }

 public static function nombrePorID($id){
        $tipo = TipoViaje::find()
                ->where(['ID_TIPO_DE_VIAJE' => $id])
                ->one();
        return $tipo;
 }
 
}