<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadosolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estadosolicituds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadosolicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estadosolicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO',
            'ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
