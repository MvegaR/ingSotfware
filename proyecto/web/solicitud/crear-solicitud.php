<?php   
    require_once "sqlSolicitud.php"; 
    $tiposdeviaje = new sqlSolicitud(); 
    $tipos = $tiposdeviaje->get_tipos();
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Solicitud de Viaje</title>
    <link href="../assets/bfaeb2be/css/bootstrap.css" rel="stylesheet">
</head> 
<body style="margin: 0% 15% 0% 15%;">
 	<section>
 		<h1><strong>Formulario para la creacion de solicitud de viaje</strong></h1>
 		<form class="form-horizontal" action="procesar.php" method="POST">
            <div class="form-group">
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
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Fecha Inicio:</strong></label>
                <div class="col-sm-10"><input type="date" required="required" name="dateI" value="<?php echo date("Y-m-d");?>"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Fecha Termino:</strong></label>
                <div class="col-sm-10"><input type="date" required="required" name="dateF" value="<?php echo date("Y-m-d");?>"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Origen:</strong></label>
                <div class="col-sm-10"><input required="required" type="text" name="origen" class="form-control" placeholder="Concepcion"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Detalle:</strong></label>
                <div class="col-sm-10"><textarea class="form-control" required="required" rows="3" id="descripcion" name="descripcion" placeholder="Incluir motivo del viaje y beneficios esperados."></textarea></div>
            </div>
            <div class="form-group">
                <label><strong><h2>Datos del destino</h2></strong></label>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Destino(s):</strong></label>
                <div class="col-sm-10">
                    <table class="table">
                        <tr><td><strong>Incluir</strong></td><td><strong>Pais</strong></td><td><strong>Ciudad</strong></td><td><strong>Medio de Transporte</strong></td><td><strong>Duracion en Dias</td></tr>
                        <tr><td><input type="checkbox" name="chk1" checked required="required"/></td><td><input type="text" name="pais1" required="required"/></td><td> <input type="text" name="ciudad1" required="required"/></td><td><input type="text" name="mediotrans1" required="required"/> </td><td> <input type="text" name="duracion1" required="required"/></td></tr>
                        <tr><td><input type="checkbox" name="chk2" id="chk2"/></td><td><input type="text" name="pais2" id="chk2"/></td><td><input type="text" name="ciudad2" id="ciudad2"/></td><td><input type="text" name="mediotrans2" id="mediotrans2"/> </td><td> <input type="text" name="duracion2" id="duracion2"/></td></tr>
                        <tr><td><input type="checkbox" name="chk3"/></td><td><input type="text" name="pais3"/></td><td> <input type="text" name="ciudad3"/></td><td><input type="text" name="mediotrans3"/> </td><td> <input type="text" name="duracion3"/></td></tr>
                        <tr><td><input type="checkbox" name="chk4"/></td><td><input type="text" name="pais4"/></td><td> <input type="text" name="ciudad4"/></td><td><input type="text" name="mediotrans4"/> </td><td> <input type="text" name="duracion4"/></td></tr>
                        <tr><td><input type="checkbox" name="chk5"/></td><td><input type="text" name="pais5"/></td><td> <input type="text" name="ciudad5"/></td><td><input type="text" name="mediotrans5"/> </td><td> <input type="text" name="duracion5"/></td></tr>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>
            </div>
        </form>
    </section>
</body> 
</html> 