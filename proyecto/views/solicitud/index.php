<?php
use yii\helpers\Url;
use app\models\TipoViajeForm;

$this->title = 'Lista de Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?= $msg ?></h3>
<h3>Lista de sus Solicitudes</h3>
<table class="table">
    <tr>
        <td><strong></strong></td>
        <td><strong>ID</strong></td>
        <td><strong>Estado</strong></td>
        <!-- <td><strong>ID Tipo Viaje</strong></td> -->
        <td><strong>Tipo de Viaje</strong></td>
        <!--<td><strong>Monto Maximo</strong></td> -->
        <td><strong>Fecha de env&#237;o</strong></td>
        <td><strong>Descripci&#243;n</strong></td>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><a href="<?= Url::toRoute(["solicitud/detalle", "ID_SOLICITUD" => $row->ID_SOLICITUD]) ?>">Ver Detalle</a></td>
        <td><?= $row->ID_SOLICITUD ?></td>
        <td><?= $row->ESTADO_SOLICITUD ?></td>
        <!--<td><?= $row->ID_TIPO_DE_VIAJE ?></td>-->
        <td><?= TipoViajeForm::nombrePorID($row->ID_TIPO_DE_VIAJE)->NOMBRE_TIPO_DE_VIAJE; ?></td>
        <!--<td>$<?= TipoViajeForm::nombrePorID($row->ID_TIPO_DE_VIAJE)->MONTO_MAXIMO; ?></td> -->
        <td><?= $row->FECHA_SOLICITUD ?></td>
        <td width="400"><?= $row->CUERPO_SOLICITUD ?></td>
    </tr>
    <?php endforeach ?>
</table>
<a class="btn btn-lg btn-default" href="<?= Url::toRoute("solicitud/crear") ?>">Agregar Solicitud</a>