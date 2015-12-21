<?php
    require_once "sqlSolicitud.php"; 
    $insertasolicitud = new sqlSolicitud();
   // $id_gasto        = $_POST['ID_GASTO'];
    $id_viaje      = $_POST['ID_VIAJE'];
    $nombregasto           = $_POST['NOMBRE_GASTO'];
    $montogasto           = $_POST['MONTO_GASTO'];
    $fechagasto           = $_POST['FECHA_GASTO'];
   
    //$idusuario        = 2;
    $estadosolicitud  = 'En espera de revision';
    if(!isset($id_viaje) || !isset($nombregasto) || !isset($montogasto) || !isset($fechagasto)){
        header('location: crear-solicitud.php?result=1');
    }

    $insertasolicitud->set_gasto($id_viaje,$nombregasto,$montogasto,$fechagasto);
    header('location: index.php');
   // $insertasolicitud->up_gasto($id_viaje,$nombregasto,$montogasto,$fechagasto);
    /*for($i = 1; $i<6; $i++){
    	if(isset($_POST['chk'.$i]) && $_POST['chk'.$i] == true && isset($_POST['pais'.$i]) && isset($_POST['ciudad'.$i]) && isset($_POST['mediotrans'.$i]) && isset($_POST['duracion'.$i])){
    		$insertasolicitud->set_destino($idviaje,$_POST['duracion'.$i],$_POST['mediotrans'.$i],$_POST['ciudad'.$i],$_POST['pais'.$i]);
    	}
    }*/
    /*$insertasolicitud->set_gasto($idusuario,$tipoviaje,$idviaje,$fechaSolicitud,$estadosolicitud,$descripcion);
    header('location: index.php?result=1');*/
?>