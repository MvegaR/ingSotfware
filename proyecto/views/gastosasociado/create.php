<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gastosasociados */

$this->title = 'Create Gastosasociados';
$this->params['breadcrumbs'][] = ['label' => 'Gastosasociados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastosasociados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
