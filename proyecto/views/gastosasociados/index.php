<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Gastos Asociados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastosasociados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Gasto asociado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_GASTO_ASOCIADO',
            'ID_TIPO_DE_VIAJE',
            'NOMBRE_GASTO_ASOCIADO',
            'MONTO_GASTO_ASOCIADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
