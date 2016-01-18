<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Detalles';
$this -> params['breadcrumbs'][] = ["label" => "Lista de solicitudes", "url" => ["/solicitudes/view"]];
$this->params['breadcrumbs'][] = $this->title;
?>



<a href="<?= Url::toRoute("solicitudes/view") ?>" > Ver lista de solicitudes</a>


<h3> Detalles </h3>
<caption><b>Detalles de Usuario solicitante</caption>
<div class="container">
<table class="table table-condensed">
	
	<thead>

<tr>
	<th>Usuario</th>
	<th>Nombre</th>
	<th>Departamento</th>
	<th>Rol</th>
	<th>Email</th>
	
</tr>
</thead>


<tr>
	<td><?= $modelusuario -> ID_USUARIO ?></td>
	<td><?= $modelusuario -> NOMBRE_USUARIO ?></td>
	<td><?= $modelusuario -> ID_DEPARTAMENTO ?></td>
	<td><?= $modelusuario -> ID_ROL ?></td>
	<td><?= $modelusuario -> EMAIL ?></td>
</tr>

</table>
</div>	

<caption><b>Detalles de Solicitud</b></caption>
<div class="container">
<table class="table table-condensed">

	<thead>
		
<tr>
	<th>ID Solicitud</th>
	<th>ID Usuario</th>
	<th>Fecha Solicitud</th>
	
	
</tr>
</thead>


<tr>
	<td><?= $modelsolicitud -> ID_SOLICITUD ?></td>
	<td><?= $modelsolicitud -> ID_USUARIO ?></td>
	<td><?= $modelsolicitud -> FECHA_SOLICITUD ?></td>
	
</tr>


</table>
</div>

<caption><b>Detalle de Viaje</b></caption>
<div class="container">
<table class="table table-condensed">
	<thead>
		
<tr>
	<th>ID Viaje</th>
	<th>Origen</th>
	<th>Fecha de Incio</th>
	<th>Fecha de Termino</th>

</tr>
</thead>


<tr>
	<td><?= $modelviaje -> ID_VIAJE ?></td>
	<td><?= $modelviaje -> ORIGEN_VIAJE ?></td>
	<td><?= $modelviaje -> FECHA_INICIO_DIRECCION ?></td>
	<td><?= $modelviaje -> FECHA_TERMINO_DIRECCION ?></td>
</tr>

</table>	
</div>

<caption><b>Detalles de Destino </b></caption>
<div class="container">
<table class="table table-condensed">
	<thead>
		
<tr>
	<th>ID Destino</th>
	<th>Duracion (Días)</th>
	<th>Medio de Transporte</th>
	<th>Cidudad de Destino</th>
	<th>Pais de Destino</th>
</tr>
</thead>

<tr>
	<?php foreach ($modeldestino as $row): ?>
	<td><?= $row -> ID_DESTINO ?></td>
	<td><?= $row-> DURACION_VIAJE_DIAS ?></td>
	<td><?= $row -> MEDIO_DE_TRANSPORTE ?></td>
	<td><?= $row -> CIUDAD_DESTINO ?></td>
	<td><?= $row -> PAIS_DESTINO ?></td>
</tr>
 <?php endforeach ?>

</table>
</div>

