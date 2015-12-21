<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>window.location='login.php';</script>";
}

?>
<html>
	<head>
		<title>.: HOME :.</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
		<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Bienvenido</h2>

</div>
</div>
</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/chat.js"></script>
	</body>
</html>