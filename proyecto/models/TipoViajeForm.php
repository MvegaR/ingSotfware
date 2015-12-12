<?php

namespace app\models;
use Yii;
use yii\base\Model;

class TipoViajeForm extends Model{

    public $id_tipo_viaje;
    public $nombre_tipo_viaje;
    public $monto_maximo;

public function rules()
 {
  return [
   ['nombre_tipo_viaje', 'required', 'message' => 'Campo requerido'],
   ['nombre_tipo_viaje', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['monto_maximo', 'integer', 'message' => 'Monto incorrecto'],
   ['monto_maximo', 'required'],
   ['id_tipo_viaje', 'integer'],
  ];
 }
 
}