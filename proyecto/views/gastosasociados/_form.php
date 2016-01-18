<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoViaje

?>

<div class="gastosasociados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_TIPO_DE_VIAJE')-> dropDownList(
			ArrayHelper::Map(TipoViaje::find() -> all(), "ID_TIPO_DE_VIAJE", "NOMBRE_TIPO_DE_VIAJE" ), 
			["prompt" => "Seleccione un tipo"] 
			);
    ?>

    <?= $form->field($model, 'NOMBRE_GASTO_ASOCIADO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTO_GASTO_ASOCIADO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
