<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadosolicitud */

$this->title = 'Update Estadosolicitud: ' . ' ' . $model->ID_ESTADO;
$this->params['breadcrumbs'][] = ['label' => 'Estadosolicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO, 'url' => ['view', 'id' => $model->ID_ESTADO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadosolicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
