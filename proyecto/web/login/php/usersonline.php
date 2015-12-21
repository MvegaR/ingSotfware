<?php 
session_start();
$users = users_online($_SESSION['id']);

function users_online($id){
	    include "conexion.php";
        $result = $con->query('select * from online where onlineiduser<>'.$id);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
}

?>
<table class="table">
	<tr>
		<td><strong>#</strong></td>
 		<td><strong>Nombre</strong></td>
 	</tr>
	<tr>
		<td>1</td>
 		<td><?php echo $_SESSION['username'] ?> (TU)</td>
 	</tr>
 	<?php $count = 2; ?>
 	<?php foreach ($users as $row): ?>
 	<tr>
 	    <td><?php echo $count++; ?></td>
 	    <?php echo '<td><a href="javascript:void(0)" onclick="javascript:chatWith('; echo "'"; echo $row['onlineuser']; echo "'"; echo ')">'.$row['onlineuser'].'</a></td>'; ?>
 	</tr>
 	<?php endforeach ?>

</table>