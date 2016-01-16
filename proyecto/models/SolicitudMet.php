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
    public $anhoi, $mesi, $diai;
    public $fechat;  // tabla viaje
    public $anhot, $mest, $diat;
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
                    ['anhoi', 'required', 'message' => 'Campo requerido'],
                    ['anhoi', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['anhoi', 'string', 'length' => [4,4], 'tooLong' => 'Valor debe tener 4 cifras, Ej: 2016', 'tooShort' => 'Valor debe tener 4 cifras, Ej: 2016'],
                    ['anhoi', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['anhoi', 'compare', 'compareValue' => 2015, 'operator' => '>=', 'message' => 'Ingrese un valor entre 2015 y 2020'],
                    ['anhoi', 'compare', 'compareValue' => 2020, 'operator' => '<=', 'message' => 'Ingrese un valor entre 2015 y 2020'],
                    ['mesi', 'required', 'message' => 'Campo requerido'],
                    ['mesi', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['mesi', 'string', 'length' => [2,2], 'tooLong' => 'Valor debe tener 2 cifras, Ej: 01', 'tooShort' => 'Valor debe tener 2 cifras, Ej: 11'],
                    ['mesi', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['mesi', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 01 y 12'],
                    ['mesi', 'compare', 'compareValue' => 12, 'operator' => '<=', 'message' => 'Ingrese un valor entre 01 y 12'],
                    ['diai', 'required', 'message' => 'Campo requerido'],
                    ['diai', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['diai', 'string', 'length' => [2,2], 'tooLong' => 'Valor debe tener 2 cifras, Ej: 01', 'tooShort' => 'Valor debe tener 2 cifras, Ej: 22'],
                    ['diai', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['diai', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 01 y 31'],
                    ['diai', 'compare', 'compareValue' => 31, 'operator' => '<=', 'message' => 'Ingrese un valor entre 01 y 31'],
                    ['anhot', 'required', 'message' => 'Campo requerido'],
                    ['anhot', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['anhot', 'string', 'length' => [4,4], 'tooLong' => 'Valor debe tener 4 cifras, Ej: 2016', 'tooShort' => 'Valor debe tener 4 cifras, Ej: 2016'],
                    ['anhot', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['anhot', 'compare', 'compareValue' => 2015, 'operator' => '>=', 'message' => 'Ingrese un valor entre 2015 y 2020'],
                    ['anhot', 'compare', 'compareValue' => 2020, 'operator' => '<=', 'message' => 'Ingrese un valor entre 2015 y 2020'],
                    ['mest', 'required', 'message' => 'Campo requerido'],
                    ['mest', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['mest', 'string', 'length' => [2,2], 'tooLong' => 'Valor debe tener 2 cifras, Ej: 01', 'tooShort' => 'Valor debe tener 2 cifras, Ej: 11'],
                    ['mest', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['mest', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 01 y 12'],
                    ['mest', 'compare', 'compareValue' => 12, 'operator' => '<=', 'message' => 'Ingrese un valor entre 01 y 12'],
                    ['diat', 'required', 'message' => 'Campo requerido'],
                    ['diat', 'string', 'message' => 'Debe indicar un valor valido (numero)'],
                    ['diat', 'string', 'length' => [2,2], 'tooLong' => 'Valor debe tener 2 cifras, Ej: 01', 'tooShort' => 'Valor debe tener 2 cifras, Ej: 22'],
                    ['diat', 'match', 'pattern' => '/^[0-9]*$/i', 'message' => 'Sólo se aceptan numeros'],
                    ['diat', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 01 y 31'],
                    ['diat', 'compare', 'compareValue' => 31, 'operator' => '<=', 'message' => 'Ingrese un valor entre 01 y 31'],
                    ['origen', 'required', 'message' => 'Campo requerido'],
   ['origen', 'match', 'pattern' => '/^[a-z0-9_-]{3,15}$/', 'message' => 'Solo se aceptan caracteres alfanumericos sin espacios'],
                    ['cuerpo', 'required', 'message' => 'Campo requerido'],
                    ['check1', 'required', 'message' => 'Campo requerido'],
                    ['check1', 'integer'],
                    ['pais1', 'required', 'message' => 'Campo requerido'],
                    ['ciudad1', 'required', 'message' => 'Campo requerido'],
                    ['transporte1', 'required', 'message' => 'Campo requerido'],
                    ['duracion1', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion1', 'required', 'message' => 'Campo requerido'],
                    ['duracion1', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion1', 'compare', 'compareValue' => 365, 'operator' => '<=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['check2', 'default', 'value' => null],
                    ['check3', 'default', 'value' => null],
                    ['check4', 'default', 'value' => null],
                    ['check5', 'default', 'value' => null],
                    ['pais2', 'default', 'value' => null],
                    ['pais3', 'default', 'value' => null],
                    ['pais4', 'default', 'value' => null],
                    ['pais5', 'default', 'value' => null],
                    ['ciudad2', 'default', 'value' => null],
                    ['ciudad3', 'default', 'value' => null],
                    ['ciudad4', 'default', 'value' => null],
                    ['ciudad5', 'default', 'value' => null],
                    ['transporte2', 'default', 'value' => null],
                    ['transporte3', 'default', 'value' => null],
                    ['transporte4', 'default', 'value' => null],
                    ['transporte5', 'default', 'value' => null],
                    ['duracion2', 'default', 'value' => null],
                    ['duracion2', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion2', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion2', 'compare', 'compareValue' => 365, 'operator' => '<=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion3', 'default', 'value' => null],
                    ['duracion3', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion3', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion3', 'compare', 'compareValue' => 365, 'operator' => '<=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion4', 'default', 'value' => null],
                    ['duracion4', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion4', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion4', 'compare', 'compareValue' => 365, 'operator' => '<=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion5', 'default', 'value' => null],
                    ['duracion5', 'integer', 'message' => 'Sólo se aceptan numeros (Dias)'],
                    ['duracion5', 'compare', 'compareValue' => 1, 'operator' => '>=', 'message' => 'Ingrese un valor entre 1 y 365'],
                    ['duracion5', 'compare', 'compareValue' => 365, 'operator' => '<=', 'message' => 'Ingrese un valor entre 1 y 365'],
                ];
    }
    
 public static function ultimoID(){
        $tipo = Viaje::find() // AQ instance
    ->select('max(ID_VIAJE) as ID_VIAJE')
                ->one();
        return $tipo->ID_VIAJE;
 }
    
}