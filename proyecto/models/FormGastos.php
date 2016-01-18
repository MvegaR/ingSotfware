<?php

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\Gastos;

class FormGastos extends Model{

public $ID_GASTO;
public $id_viaje;
public $nombregasto;
public $estadogasto;
public $montogasto;
public $fechagasto;


public function rules()
 {
  return [
   //['ID_GASTO', 'required', 'message' => 'Campo requerido'],
   ['ID_GASTO', 'integer', 'message' => 'Id incorrecto'],
   ['id_viaje', 'required', 'message' => 'Campo requerido'],
   ['id_viaje', 'integer', 'message' => 'Id incorrecto'],
   ['nombregasto', 'required', 'message' => 'Campo requerido'],
   ['nombregasto', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['montogasto', 'required', 'message' => 'Campo requerido'],
   ['montogasto', 'number', 'message' => 'Sólo números'],
   ['fechagasto', 'required', 'message' => 'Campo requerido'],
   ['fechagasto', 'default', 'value' => "0000-00-00 00:00:00"],

  ];
 }
 
}