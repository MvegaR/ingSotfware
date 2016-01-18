<?php

use yii\helpers\Html;



$this->title = 'Crear Gastos Asociados';
$this->params['breadcrumbs'][] = ['label' => 'Gastos Asociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastosasociados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
