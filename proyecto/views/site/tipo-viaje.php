<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Tipos de Viaje';
$this->params['breadcrumbs'][] = $this->title;
?>

<h3>Lista de Tipos de Viaje</h3>
<h3><?= $msg ?></h3>
<table class="table">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Monto M&#225;ximo</th>
        <th></th>
        <th></th>
    </tr>
    <?php $contador = 1; ?>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?php echo $contador++; ?></td>
        <td><?= $row->NOMBRE_TIPO_DE_VIAJE ?></td>
        <td>$<?= $row->MONTO_MAXIMO ?></td>
        <td><a href="<?= Url::toRoute(["site/editar-t-viaje", "ID_TIPO_DE_VIAJE" => $row->ID_TIPO_DE_VIAJE]) ?>">Editar</a></td>
        <td>
            <a href="#" data-toggle="modal" data-target="#ID_TIPO_DE_VIAJE_<?= $row->ID_TIPO_DE_VIAJE ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="ID_TIPO_DE_VIAJE_<?= $row->ID_TIPO_DE_VIAJE ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar Tipo de Viaje</h4>
                              </div>
                              <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">¿Realmente quiere eliminar el Tipo de Viaje "<?= $row->NOMBRE_TIPO_DE_VIAJE ?>"?</div>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/borrar-t-viaje"), "POST") ?>
                                    <input type="hidden" name="ID_TIPO_DE_VIAJE" value="<?= $row->ID_TIPO_DE_VIAJE ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div>
                      </div>
            </div>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<a class="btn btn-lg btn-default" href="<?= Url::toRoute("site/crear-t-viaje") ?>">Agregar Tipo de Viaje</a>