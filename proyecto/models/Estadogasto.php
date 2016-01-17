<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_gasto".
 *
 * @property integer $ID_ESTADO_GASTO
 * @property string $ESTADO_GASTO
 *
 * @property Gastos[] $gastos
 */
class Estadogasto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_gasto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTADO_GASTO'], 'required'],
            [['ESTADO_GASTO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_GASTO' => 'Id  Estado  Gasto',
            'ESTADO_GASTO' => 'Estado  Gasto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGastos()
    {
        return $this->hasMany(Gastos::className(), ['ID_ESTADO_GASTO' => 'ID_ESTADO_GASTO']);
    }
}
