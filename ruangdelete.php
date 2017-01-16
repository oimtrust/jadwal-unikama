<?php 
include('helper/config.php');

$idruang = $_GET['idruang'];

$query = mysql_query("delete from ruang where id_ruang ='$idruang'") or die(mysql_error());

if ($query) {
	header('location:ruang.php?msg=success');
} else {
	header('location:ruang.php?msg=failed');
}
?>