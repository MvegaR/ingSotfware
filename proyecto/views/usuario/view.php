<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Lista de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("usuario/create")?>">Crear usuario</a>

<h3> Lista de usuarios </h3>
<div class="panel panel-default">
<table class="table table-bordered table-striped table-hover">
	<thead>
<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Rol</th>
	<th>ID Departamento</th>
	<th>E-mail</th>
	<th>Funciones</th>
</tr>
</thead>
<tbody>
<?php foreach($model as $usuario){ ?>
<tr>
	<th><?= $usuario -> ID_USUARIO ?></th>
	<th><?= $usuario -> NOMBRE_USUARIO ?></th>
	<th><?= $usuario -> ROL ?></th>
	<th><?php if($usuario -> ID_DEPARTAMENTO != ""){echo $usuario -> ID_DEPARTAMENTO;}else{echo "No tiene";} ?></th>
	<th><?= $usuario -> EMAIL ?></th>
	<th> <a href = "<?= Url::toRoute(["usuario/update", "id_usuario" => $usuario -> ID_USUARIO])?>">Editar</a> | <?php if($usuario -> ROL != "administrador"){ ?>
<a href="#" data-toggle="modal" data-target="#ID_USUARIO<?= $usuario->ID_USUARIO ?>">Eliminar</a>

<div class="modal fade" role="dialog" aria-hidden="true" id="ID_USUARIO<?= $usuario->ID_USUARIO ?>">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

				<h4 class="modal-title">Eliminar Usuario</h4>

			</div>

			<div class="modal-body">

				<p>¿Realmente deseas eliminar al usuario con id <?= $usuario->ID_USUARIO ?>?</p>

			</div>

			<div class="modal-footer">

				<?= Html::beginForm(Url::toRoute("usuario/delete"), "POST") ?>

				<input type="hidden" name="ID_USUARIO" value="<?= $usuario->ID_USUARIO ?>">

				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-primary">Eliminar</button>

				<?= Html::endForm() ?>

			</div>

		</div><!-- /.modal-content -->

		</div><!-- /.modal-dialog -->
</div><!-- /.modal --> </th> <?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>




