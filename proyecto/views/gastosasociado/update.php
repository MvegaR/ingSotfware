<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gastosasociados */

$this->title = 'Update Gastosasociados: ' . ' ' . $model->ID_GASTO_ASOCIADO;
$this->params['breadcrumbs'][] = ['label' => 'Gastosasociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_GASTO_ASOCIADO, 'url' => ['view', 'id' => $model->ID_GASTO_ASOCIADO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gastosasociados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
