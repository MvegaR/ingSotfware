<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor".
 *
 * @property integer $ID
 * @property string $Nombre
 * @property integer $edad
 */
class Profesor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'edad'], 'required'],
            [['edad'], 'integer'],
            [['Nombre'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nombre' => 'Nombre',
            'edad' => 'Edad',
        ];
    }
}
