<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "GASTOS_ASOCIADOS".
 *
 * @property integer $ID_GASTO_ASOCIADO
 * @property integer $ID_TIPO_DE_VIAJE
 * @property string $NOMBRE_GASTO_ASOCIADO
 * @property double $MONTO_GASTO_ASOCIADO
 */
class Gastosasociados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'GASTOS_ASOCIADOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_DE_VIAJE'], 'integer'],
            [['NOMBRE_GASTO_ASOCIADO', 'MONTO_GASTO_ASOCIADO'], 'required'],
            [['MONTO_GASTO_ASOCIADO'], 'number'],
            [['NOMBRE_GASTO_ASOCIADO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_GASTO_ASOCIADO' => 'Id  Gasto  Asociado',
            'ID_TIPO_DE_VIAJE' => 'Id  Tipo  De  Viaje',
            'NOMBRE_GASTO_ASOCIADO' => 'Nombre  Gasto  Asociado',
            'MONTO_GASTO_ASOCIADO' => 'Monto  Gasto  Asociado',
        ];
    }
}
