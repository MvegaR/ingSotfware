<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ROL".
 *
 * @property integer $ID_ROL
 * @property string $ROL
 */
class ROL extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ROL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ROL'], 'required'],
            [['ROL'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ROL' => 'Id  Rol',
            'ROL' => 'Rol',
        ];
    }
}
