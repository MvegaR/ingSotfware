<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->ID_GASTO_ASOCIADO;
$this->params['breadcrumbs'][] = ['label' => 'Gastos Asociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastosasociados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID_GASTO_ASOCIADO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_GASTO_ASOCIADO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea borrar este Gasto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_GASTO_ASOCIADO',
            'ID_TIPO_DE_VIAJE',
            'NOMBRE_GASTO_ASOCIADO',
            'MONTO_GASTO_ASOCIADO',
        ],
    ]) ?>

</div>
