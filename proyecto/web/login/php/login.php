<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				break;
			}
			if($user_id==null){
				print "<script>window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				$ip = $_SERVER['REMOTE_ADDR'];
				$date = date("Y-m-d");
				$username = username_userid($user_id);
				$sql = "insert into online(onlineuser,lastdate,ip,onlineiduser) value (\"$username\",\"$date\",\"$ip\",\"$user_id\")";
			$query = $con->query($sql);
			if($query!=null){
				$_SESSION['id'] = $user_id;
				$_SESSION['username'] = $username;
				print "<script>window.location='../index.php';</script>";
			}			
			}
		}
	}
}

function username_userid($id){
	    include "conexion.php";
        $username = 'nombre';
        $result = $con->query('select username from user where id='.$id);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $username= $row['username'];
        }
        return $username;
}

?>