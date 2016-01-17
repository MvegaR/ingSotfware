<?php   
    $id_usuario = 3;
    require_once "sqlSolicitud.php"; 
    $sql = new sqlSolicitud($id_usuario);
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
    <title>Sus Solicitudes de Viaje</title>
    <link href="../assets/bfaeb2be/css/bootstrap.css" rel="stylesheet">
</head> 
<body style="margin: 0% 15% 0% 15%;">
 	<section>
                <?php echo $msj; ?>
 		<h1><strong>Sus Solicitudes de Viaje</strong></h1>
            <table class="table">
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Estado</strong></td>
                <td><strong>Tipo de Viaje</strong></td>
                <td><strong>Monto Maximo</strong></td>
                <td><strong>Fecha de la solicitud</strong></td>
                <td><strong>Descripcion</strong></td>
            </tr>
            <?php $contador = 1; ?>
            <?php foreach ($solicitudes as $row): ?>
                <tr>
                    <td><?php echo $contador; $contador++;?></td>
                    <td><?php  echo Estadosolicitud::find($row -> ID_ESTADO)->one() -> ESTADO; ?></td>
                    <td><?php echo $row['NOMBRE_TIPO_DE_VIAJE']; ?></td>
                    <td>$<?php echo $row['MONTO_MAXIMO']; ?></td>
                    <td><?php echo $row['FECHA_SOLICITUD']; ?></td>
                    <td width="400"><?php echo $row['CUERPO_SOLICITUD']; ?></td>
                </tr>
            <?php endforeach ?>
            </table>
            <a class="btn btn-lg btn-default" href="crear-solicitud.php">Crear Solicitud</a>
    </section>
</body> 
</html> 