<?php

namespace app\models;
use yii\base\Model;
use app\models\Viaje;

class SolicitudMet extends Model
{
    
    public $id;
    public $iduser;
    public $idtipoviaje;
    public $idviaje; // tabla viaje
    public $origen;  // tabla viaje
    public $fechai;  // tabla viaje
    public $fechat;  // tabla viaje
    public $fecha;
    public $estado;
    public $cuerpo;


    public $check1, $check2, $check3, $check4, $check5;
    public $pais1, $pais2, $pais3, $pais4, $pais5;
    public $ciudad1, $ciudad2, $ciudad3, $ciudad4, $ciudad5;
    public $transporte1, $transporte2, $transporte3, $transporte4, $transporte5;
    public $duracion1, $duracion2, $duracion3, $duracion4, $duracion5;
    public function rules(){
        return [
                    ['idtipoviaje', 'required', 'message' => 'Campo requerido'],
                    ['idtipoviaje', 'integer', 'message' => 'Debe indicar un ID valido (numero)'],
                    ['fechai', 'required', 'message' => 'Campo requerido'],
                    ['fechat', 'required', 'message' => 'Campo requerido'],
                    ['origen', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['origen', 'required', 'message' => 'Campo requerido'],
                    ['cuerpo', 'required', 'message' => 'Campo requerido'],
                    ['check1', 'required', 'message' => 'Campo requerido'],
                    ['check1', 'integer'],
                    ['pais1', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['pais1', 'required', 'message' => 'Campo requerido'],
                    ['ciudad1', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['ciudad1', 'required', 'message' => 'Campo requerido'],
                    ['transporte1', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['transporte1', 'required', 'message' => 'Campo requerido'],
                    ['duracion1', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion1', 'required', 'message' => 'Campo requerido'],
                    ['check2', 'default', 'value' => null],
                    ['check3', 'default', 'value' => null],
                    ['check4', 'default', 'value' => null],
                    ['check5', 'default', 'value' => null],
                    ['pais2', 'default', 'value' => null],
                    ['pais2', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['pais3', 'default', 'value' => null],
                    ['pais3', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['pais4', 'default', 'value' => null],
                    ['pais4', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['pais5', 'default', 'value' => null],
                    ['pais5', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['ciudad2', 'default', 'value' => null],
                    ['ciudad2', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['ciudad3', 'default', 'value' => null],
                    ['ciudad3', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['ciudad4', 'default', 'value' => null],
                    ['ciudad4', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['ciudad5', 'default', 'value' => null],
                    ['ciudad5', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['transporte2', 'default', 'value' => null],
                    ['transporte2', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['transporte3', 'default', 'value' => null],
                    ['transporte3', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['transporte4', 'default', 'value' => null],
                    ['transporte4', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['transporte5', 'default', 'value' => null],
                    ['transporte5', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y numeros'],
                    ['duracion2', 'default', 'value' => null],
                    ['duracion2', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion3', 'default', 'value' => null],
                    ['duracion3', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion4', 'default', 'value' => null],
                    ['duracion4', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion5', 'default', 'value' => null],
                    ['duracion5', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                ];
    }
    
 public static function ultimoID(){
        $tipo = Viaje::find() // AQ instance
    ->select('max(ID_VIAJE) as ID_VIAJE')
                ->one();
        return $tipo->ID_VIAJE;
 }
    
}