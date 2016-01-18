<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\TipoViajeForm;
use app\models\Estadosolicitud;

$this->title = 'Lista de Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?= $msg ?></h3>
<h3>Lista de sus Solicitudes</h3>
<table class="table">
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Estado</strong></td>
        <!-- <td><strong>ID Tipo Viaje</strong></td> -->
        <td><strong>Tipo de Viaje</strong></td>
        <!--<td><strong>Monto Maximo</strong></td> -->
        <td><strong>Fecha de env&#237;o</strong></td>
        <td><strong>Descripci&#243;n</strong></td>
        <td><strong></strong></td>
        <td><strong></strong></td>
        <td><strong></strong></td>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->ID_SOLICITUD; ?></td>
        <td><?= Estadosolicitud::findOne($row -> ID_ESTADO) -> ESTADO; ?></td>
        
        <td><?php if(TipoViajeForm::nombrePorID($row->ID_TIPO_DE_VIAJE))echo TipoViajeForm::nombrePorID($row->ID_TIPO_DE_VIAJE)->NOMBRE_TIPO_DE_VIAJE; ?></td>
       
        <td><?= $row->FECHA_SOLICITUD ?></td>
        <td width="400"><?= $row->CUERPO_SOLICITUD ?></td>
        <td><a href="<?= Url::toRoute(["solicitud/detalle", "ID_SOLICITUD" => $row->ID_SOLICITUD]) ?>">Ver Detalle</a></td>
        <?php if($row->ID_ESTADO == "2"){
                  echo '<td><a href="'.Url::toRoute(["site/pdf", "ID_SOLICITUD" => $row->ID_SOLICITUD]).'">Generar PDF</a></td>';
                  echo '<td><strong></strong></td>';
              }
              else{
                  echo '<td><strong></strong></td>';
        ?><td>
            <a href="#" data-toggle="modal" data-target="#ID_SOLICITUD_<?= $row->ID_SOLICITUD ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="ID_SOLICITUD_<?= $row->ID_SOLICITUD ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar Solicitud</h4>
                              </div>
                              <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">¿Realmente quiere eliminar la solicitud "<?= $row->ID_SOLICITUD ?>"?</div>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("solicitud/borrar-solicitud"), "POST") ?>
                                    <input type="hidden" name="ID_SOLICITUD" value="<?= $row->ID_SOLICITUD ?>">
                                    <input type="hidden" name="ID_VIAJE" value="<?= $row->ID_VIAJE ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div>
                      </div>
            </div>
        </td><?php
              }
        ?>
    </tr>
    <?php endforeach ?>
</table>
<a class="btn btn-lg btn-default" href="<?= Url::toRoute("solicitud/crear") ?>">Agregar Solicitud</a>