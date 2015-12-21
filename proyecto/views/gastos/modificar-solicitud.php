<?php   
    require_once "sqlSolicitud.php"; 
    $tiposdeviaje = new sqlSolicitud(); 
    //$tipos = $tiposdeviaje->get_tipos();
    $msj=null;
    if(isset($_GET['result'])){
        if($_GET['result'] == 1){
            $msj = '<div class="alert alert-success" role="alert"><strong>ENVIADA!</strong> ERROR !.</div>';
        }
    }
?>

 	<section>
        <h1><strong><?echo $msj?></strong></h1>
 		<h1><strong>Formulario para la edicion de gastos de viaje</strong></h1>
 		<form class="form-horizontal" action="procesar2.php" method="POST">

<div class="form-group">
                <label class="col-sm-2 control-label"><strong>Numero de gasto:</strong></label>
                <div class="col-sm-10"><input required="required" type="number" min="1" name="ID_VIAJE" class="form-control" placeholder="Ej: Ingrese solo numeros (Ej:1)"></div>
            </div>

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
                    <button type="submit" class="btn btn-default">Modificar Gastos</button>
                </div>
            </div>
        </form>
    </section>
