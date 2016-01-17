<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadogasto */

$this->title = 'Update Estadogasto: ' . ' ' . $model->ID_ESTADO_GASTO;
$this->params['breadcrumbs'][] = ['label' => 'Estadogastos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_GASTO, 'url' => ['view', 'id' => $model->ID_ESTADO_GASTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadogasto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
