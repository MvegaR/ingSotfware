<?php 

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<a href="<?= Url::toRoute("site/create")?>">Crear un nuevo gasto</a>


<h3>Lista de Gastos</h3>
<table class="table table-bordered"> 
<tr>
	<th> ID Gasto</th>
	<th> ID Viaje</th>
	<th> Nombre Gasto</th>
	<th> Monto Gasto</th>
	<th> Fecha Gasto</th>
	<th> Editar Gasto</th>
	<th> Eliminar Gasto</th>

</tr>
<?php foreach ($model as $row): ?>
<tr>
	<td><?= $row->ID_GASTO?></td>
	<td><?= $row->ID_VIAJE?></td>
	<td><?= $row->NOMBRE_GASTO?></td>
	<td><?= $row->MONTO_GASTO?></td>
	<td><?= $row->FECHA_GASTO?></td>
	<td><a href="<?= Url::toRoute(["site/update", "ID_GASTO" => $row->ID_GASTO]) ?>">Editar</a></td>
	 <td>
            <a href="#" data-toggle="modal" data-target="#ID_GASTO<?= $row->ID_GASTO ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="ID_GASTO<?= $row->ID_GASTO ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar Gasto</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar gasto con id <?= $row->ID_GASTO ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
                                    <input type="hidden" name="ID_GASTO" value="<?= $row->ID_GASTO ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </td>
</tr>
<?php endforeach ?>
</table>

