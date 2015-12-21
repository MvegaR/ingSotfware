<?php   
    require_once "sqlSolicitud.php"; 
    $tiposdeviaje = new sqlSolicitud(); 
    $tipos = $tiposdeviaje->get_tipos();
    $msj=null;
    if(isset($_GET['result'])){
        if($_GET['result'] == 1){
            $msj = '<div class="alert alert-success" role="alert"><strong>ENVIADA!</strong> ERROR !.</div>';
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear declaracion de Gastos de viaje</title>
    <link href="../assets/bfaeb2be/css/bootstrap.css" rel="stylesheet">
</head> 
<body style="margin: 0% 15% 0% 15%;">
 	<section>
        <h1><strong><?echo $msj?></strong></h1>
 		<h1><strong>Formulario para la creacion de gastos de viaje</strong></h1>
 		<form class="form-horizontal" action="procesar.php" method="POST">
           <!-- <div class="form-group">
                <label><strong><h2>Datos del viaje</h2></strong></label>
            </div>
            <div class="form-group">
 			    <center><label class="col-sm-2 control-label">Tipo de Viaje: </label></center>
                <div class="col-sm-10">
 			    <table class="table">
 				    <tr>
 					    <td><strong>#</strong></td>
 					    <td><strong>Tipo</strong></td>
 					    <td><strong>Monto Maximo</strong></td>
 				    </tr>
 	        	    <?php foreach ($tipos as $row): ?>
 	        	        <tr>
 	        	    	    <td><input type="radio" name="tipoviaje" value="<?php echo $row['ID_TIPO_DE_VIAJE']; ?>" checked></td>
 	        	    	    <td><?php echo $row['NOMBRE_TIPO_DE_VIAJE']; ?></td>
 	        	    	    <td>$<?php echo $row['MONTO_MAXIMO']; ?></td>
 	        	        </tr>
 	                <?php endforeach ?>
 	            </table>
                </div>
            </div> -->
            
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Numero de viaje:</strong></label>
                <div class="col-sm-10"><input required="required" type="number" min="1" name="ID_VIAJE" class="form-control" placeholder="Ej: Ingrese solo numeros (Ej:1)"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Nombre Gasto:</strong></label>
                <div class="col-sm-10"><input required="required" type="text" name="NOMBRE_GASTO" class="form-control" placeholder="Ej: Viaje a sede Chillan"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Monto Gasto:</strong></label>
                <div class="col-sm-10"><input required="required" type="number" min="0" name="MONTO_GASTO" class="form-control" placeholder="Ej: Ingrese solo numeros (Ej:200000)"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Fecha Gasto:</strong></label>
                <div class="col-sm-10"><input type="date" required="required" name="FECHA_GASTO" value="<?php echo date("Y-m-d");?>"></div>
            </div>
            <div class="form-group">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Enviar Gastos</button>
                </div>
            </div>
        </form>
    </section>
</body> 
</html> 