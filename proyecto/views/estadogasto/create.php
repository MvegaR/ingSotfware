<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadogasto */

$this->title = 'Create Estadogasto';
$this->params['breadcrumbs'][] = ['label' => 'Estadogastos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadogasto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
