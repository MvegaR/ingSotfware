<?php   
    require_once "sqlSolicitud.php"; 
    $sql = new sqlSolicitud();
    //$id_usuario = 2;
    $solicitudes = $sql->get_solicitud();
    $msj = null;
    if(isset($_GET['result'])){
        if($_GET['result'] == 1){
            $msj = '<div class="alert alert-success" role="alert"><strong>ENVIADA!</strong> Solicitud enviada correctamente.</div>';
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gastos por viaje</title>
    <link href="../assets/bfaeb2be/css/bootstrap.css" rel="stylesheet">
</head> 
<body style="margin: 0% 15% 0% 15%;">
 	<section>
                <?php echo $msj; ?>
 		<h1><strong>Gastos por viajes</strong></h1>
            <table class="table">
            <tr>
                <td><strong>#</strong></td>
                <td><strong>ID Gasto</strong></td>
                <td><strong>ID Viaje</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Monto</strong></td>
                <td><strong>Fecha</strong></td>
                <td><strong>Editar</strong></td>
                <td><strong>Eliminar</strong></td>
                
            </tr>
            <?php $contador = 1; ?>
            <?php foreach ($solicitudes as $row): ?>
                <tr>
                    <td><?php echo $contador; $contador++;?></td>
                    <td><?php echo $row['ID_GASTO']; ?></td>
                    <td><?php echo $row['ID_VIAJE']; ?></td>
                    <td><?php echo $row['NOMBRE_GASTO']; ?></td>
                    <td><?php echo $row['MONTO_GASTO']; ?></td>
                    <td><?php echo $row['FECHA_GASTO']; ?></td>
                    <td><a href="modificar-solicitud.php"><button type="submit" >Modificar Gastos</button></a></td>
                    <td><button type="submit" >Eliminar Gastos</button></td> 
                </tr>
            <?php endforeach ?>
            </table>
            <a class="btn btn-lg btn-default" href="crear-solicitud.php">Crear Solicitud</a>
    </section>
</body> 
</html> 