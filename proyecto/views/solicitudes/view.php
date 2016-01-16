<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Lista de solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>

<h3> Lista de solicitudes </h3>
<div class="panel panel-default">
<table class="table table-bordered table-striped table-hover">
	<thead>
<tr>
	<th>ID Solicitud</th>
	<th>ID Usuario</th>
	<th>Descripción</th>
	<th>Estado</th>
	<th></th>
	
</tr>
</thead>
<tbody>
<?php foreach($model as $solicitud): ?>
<tr>
	<td><?= $solicitud -> ID_SOLICITUD ?></td>
	<td><?= $solicitud -> ID_USUARIO ?></td>
	<td><?= $solicitud -> CUERPO_SOLICITUD ?></td>
	<td><?= $solicitud -> ESTADO_SOLICITUD ?> <a href = "<?= Url::toRoute(["solicitudes/update", "ID_SOLICITUD" => $solicitud -> ID_SOLICITUD])?>">Editar</a></td>
	<th> <a href = "<?= Url::toRoute(["solicitudes/detalle", "ID_SOLICITUD" => $solicitud -> ID_SOLICITUD])?>">Detalles</a>
<?php endforeach ?>
</table>	
