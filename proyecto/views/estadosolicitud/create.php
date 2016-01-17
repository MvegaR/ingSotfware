<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadosolicitud */

$this->title = 'Create Estadosolicitud';
$this->params['breadcrumbs'][] = ['label' => 'Estadosolicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadosolicitud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
