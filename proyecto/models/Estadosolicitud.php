<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ESTADO_SOLICITUD".
 *
 * @property integer $ID_ESTADO
 * @property string $ESTADO
 */
class Estadosolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ESTADO_SOLICITUD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTADO'], 'required'],
            [['ESTADO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO' => 'Id  Estado',
            'ESTADO' => 'Estado',
        ];
    }
}
