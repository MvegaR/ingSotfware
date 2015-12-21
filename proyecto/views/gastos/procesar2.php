<?php
    require_once "sqlSolicitud.php"; 
    $insertasolicitud = new sqlSolicitud();
    $id_gasto        = $_POST['ID_GASTO'];
    $id_viaje      = $_POST['ID_VIAJE'];
    $nombregasto           = $_POST['NOMBRE_GASTO'];
    $montogasto           = $_POST['MONTO_GASTO'];
    $fechagasto           = $_POST['FECHA_GASTO'];
   
    //$idusuario        = 2;
    $estadosolicitud  = 'En espera de revision';
    if(!isset($id_viaje) || !isset($nombregasto) || !isset($montogasto) || !isset($fechagasto)){
        header('location: crear-solicitud.php?result=1');
    }

    $insertasolicitud->up_gasto($id_gasto,$id_viaje,$nombregasto,$montogasto,$fechagasto);
    header('location: index.php');

    ?>