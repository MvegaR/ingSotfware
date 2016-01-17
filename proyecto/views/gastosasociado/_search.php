<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GastosasociadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gastosasociados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_GASTO_ASOCIADO') ?>

    <?= $form->field($model, 'ID_TIPO_DE_VIAJE') ?>

    <?= $form->field($model, 'NOMBRE_GASTO_ASOCIADO') ?>

    <?= $form->field($model, 'MONTO_GASTO_ASOCIADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
