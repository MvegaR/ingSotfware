<?php
session_start();

if(!empty($_SESSION['id'])) {
	include "conexion.php";
	$sql1= "delete from online WHERE onlineiduser='".$_SESSION['id']."'";
	$query = $con->query($sql1);
	$_SESSION = array();
}
session_unset();
session_destroy();
print "<script>window.location='../index.php';</script>";
?>