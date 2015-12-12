<?php
    require_once "sqlSolicitud.php"; 
    $insertasolicitud = new sqlSolicitud();
    $tipoviaje        = $_POST['tipoviaje'];
    $descripcion      = $_POST['descripcion'];
    $fechai           = $_POST['dateI'];
    $fechat           = $_POST['dateF'];
    $origen           = $_POST['origen'];
    $insertasolicitud->set_viaje($origen,$fechai,$fechat);
    $idviaje          = $insertasolicitud->ultimo_id_viaje();
    $fechaSolicitud   = date("Y-m-d H:i:s");
    $idusuario        = 2;
    $estadosolicitud  = 'En espera de revision';
    if(!isset($tipoviaje) || !isset($descripcion) || !isset($fechai) || !isset($fechat) || !isset($origen)){
        header('location: crear-solicitud.php');
    }
    for($i = 1; $i<6; $i++){
    	if(isset($_POST['chk'.$i]) && $_POST['chk'.$i] == true && isset($_POST['pais'.$i]) && isset($_POST['ciudad'.$i]) && isset($_POST['mediotrans'.$i]) && isset($_POST['duracion'.$i])){
    		$insertasolicitud->set_destino($idviaje,$_POST['duracion'.$i],$_POST['mediotrans'.$i],$_POST['ciudad'.$i],$_POST['pais'.$i]);
    	}
    }
    $insertasolicitud->set_solicitud($idusuario,$tipoviaje,$idviaje,$fechaSolicitud,$estadosolicitud,$descripcion);
    header('location: index.php?result=1');
?>