<?php

use yii\helpers\Html;



$this->title = 'Actualizar Gastos Asociados con ID: ' . ' ' . $model->ID_GASTO_ASOCIADO;
$this->params['breadcrumbs'][] = ['label' => 'Gastos Asociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_GASTO_ASOCIADO, 'url' => ['view', 'id' => $model->ID_GASTO_ASOCIADO]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="gastosasociados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
