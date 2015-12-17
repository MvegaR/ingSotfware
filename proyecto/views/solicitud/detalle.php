<?php
use yii\helpers\Url;
use app\models\TipoViajeForm;

$this->title = 'Detalle Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Detalle de Solicitud:</h3>
<label class="col-sm-2 control-label">Solicitud: </label>
<div class="col-sm-10">
<table class="table">
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Estado</strong></td>
        <!-- <td><strong>ID Tipo Viaje</strong></td> -->
        <td><strong>Nombre Tipo Viaje</strong></td>
        <td><strong>Monto Maximo</strong></td>
        <td><strong>Fecha de la solicitud</strong></td>
        <td><strong>Descripcion</strong></td>
    </tr>
    <tr>
        <td><?= $modelsolicitud->ID_SOLICITUD ?></td>
        <td><?= $modelsolicitud->ESTADO_SOLICITUD ?></td>
        <!--<td><?= $modelsolicitud->ID_TIPO_DE_VIAJE ?></td>-->
        <td><?= TipoViajeForm::nombrePorID($modelsolicitud->ID_TIPO_DE_VIAJE)->NOMBRE_TIPO_DE_VIAJE; ?></td>
        <td>$<?= TipoViajeForm::nombrePorID($modelsolicitud->ID_TIPO_DE_VIAJE)->MONTO_MAXIMO; ?></td>
        <td><?= $modelsolicitud->FECHA_SOLICITUD ?></td>
        <td width="400"><?= $modelsolicitud->CUERPO_SOLICITUD ?></td>
    </tr>
</table>
</div>
<label class="col-sm-2 control-label">Viaje: </label>
<div class="col-sm-10">
<table class="table">
    <tr>
        <td><strong>Origen</strong></td>
        <td><strong>Fecha Inicio</strong></td>
        <td><strong>Fecha Termino</strong></td>
    </tr>
    <tr>
        <td><?= $modelviaje->ORIGEN_VIAJE ?></td>
        <td><?= $modelviaje->FECHA_INICIO_DIRECCION ?></td>
        <td><?= $modelviaje->FECHA_TERMINO_DIRECCION ?></td>
    </tr>
</table>
</div>
<label class="col-sm-2 control-label">Destino(s): </label>
<div class="col-sm-10">
    <table class="table">
         <tr>
             <td><strong>Pais</strong></td>
             <td><strong>Ciudad</strong></td>
             <td><strong>Medio Transporte</strong></td>
             <td><strong>Duracion en Dias</strong></td>
         </tr>
         <?php foreach ($modeldestino as $row): ?>
                <tr>
                    <td><?php echo $row['PAIS_DESTINO']; ?></td>
                    <td><?php echo $row['CIUDAD_DESTINO']; ?></td>
                    <td><?php echo $row['MEDIO_DE_TRANSPORTE']; ?></td>
                    <td><?php echo $row['DURACION_VIAJE_DIAS']; ?></td>
                </tr>
        <?php endforeach ?>
    </table>
</div>
<a class="btn btn-default" href="<?= Url::toRoute("/solicitud") ?>">Volver</a>