<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this -> title = "Lista departamentos";
$this -> params['breadcrumbs'][] = ["label" => "Lista de usuarios", "url" => ["usuario/view"]];
$this -> params['breadcrumbs'][] = $this -> title;


?>


<a href = "#" > Crear Departamento </a>

<h3> Lista de Departamentos </h3>
<div class ="table">
<table class = "table table-bordered table-hover table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Funciones</th>
	</tr>
<?php foreach($model as $dep){?>
	<tr>
		<th><?= $dep -> ID_DEPARTAMENTO ?></th>
		<th><?= $dep -> NOMBRE_DEPARTAMENTO ?></th>
		<th><a href = "#" >Editar</a> | <a href = "#" >Eliminar</a></th>
	</tr>
<?php } ?>
</table>


</div>

