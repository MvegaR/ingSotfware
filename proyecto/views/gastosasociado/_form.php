<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gastosasociados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gastosasociados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_TIPO_DE_VIAJE')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_GASTO_ASOCIADO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTO_GASTO_ASOCIADO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
