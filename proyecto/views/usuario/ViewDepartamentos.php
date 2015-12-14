<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this -> title = "Lista departamentos";
$this -> params['breadcrumbs'][] = ["label" => "Lista de usuarios", "url" => ["usuario/view"]];
$this -> params['breadcrumbs'][] = $this -> title;


?>


<a href = "<?= Url::toRoute("usuario/createdep") ?>" > Crear Departamento </a>

<h3> Lista de Departamentos </h3>
<div class ="table">
<table class = "table table-bordered table-hover table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th> </th>
	</tr>
<?php foreach($model as $dep){?>
	<tr>
		<th><?= $dep -> ID_DEPARTAMENTO ?></th>
		<th><?= $dep -> NOMBRE_DEPARTAMENTO ?></th>
		<th><a href = "<?= Url::toRoute(["usuario/updatedep", "id_departamento" => $dep -> ID_DEPARTAMENTO])?>">Editar</a> | <a href="#" data-toggle="modal" data-target="#ID_DEPARTAMENTO<?= $dep->ID_DEPARTAMENTO ?>">Eliminar</a>

<div class="modal fade" role="dialog" aria-hidden="true" id="ID_DEPARTAMENTO<?= $dep->ID_DEPARTAMENTO ?>">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

				<h4 class="modal-title">Eliminar Departamento</h4>

			</div>

			<div class="modal-body">

				<p>¿Realmente deseas eliminar el departamento con id <?= $dep->ID_DEPARTAMENTO ?>?</p>

			</div>

			<div class="modal-footer">

				<?= Html::beginForm(Url::toRoute("usuario/deletedep"), "POST") ?>

				<input type="hidden" name="ID_DEPARTAMENTO" value="<?= $dep->ID_DEPARTAMENTO ?>">

				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-primary">Eliminar</button>

				<?= Html::endForm() ?>

			</div>

		</div><!-- /.modal-content -->

		</div><!-- /.modal-dialog -->
</div></th>
	</tr>
<?php } ?>
</table>


</div>

