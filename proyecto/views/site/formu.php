<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Estadogasto;
?>

<h1> Lista de gastos </h1>
<table class="table table-bordered"> 
<tr>
    <th> ID Gasto</th>
    <th> ID Viaje</th>
    <th> ID Estado Gasto</th>
    <th> Nombre Gasto</th>
    <th> Monto Gasto</th>
    <th> Fecha Gasto</th>
    <th> Aceptar/Rechazar Gasto</th>
</tr>
 <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->ID_GASTO ?></td>
        <td><?= $row->ID_VIAJE ?></td>
        <td><?= Estadogasto::findOne($row->ID_ESTADO_GASTO) -> ESTADO_GASTO?></td>
        <td><?= $row->NOMBRE_GASTO ?></td>
        <td><?= $row->MONTO_GASTO ?></td>
        <td><?= $row->FECHA_GASTO ?></td>
        <td><a href="<?= Url::toRoute(["site/updategas", "ID_GASTO" => $row->ID_GASTO]) ?>">Cambiar Estado</a></td>
    </tr>
    <?php endforeach ?>
</table>