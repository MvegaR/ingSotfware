<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gastosasociados */

$this->title = $model->ID_GASTO_ASOCIADO;
$this->params['breadcrumbs'][] = ['label' => 'Gastosasociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastosasociados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_GASTO_ASOCIADO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_GASTO_ASOCIADO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
