<?php 

include('helper/config.php');

$kd_jadwal = $_GET['kd_jadwal'];
// print_r($_GET);
$query = mysql_query("update tbl_jadwal set status='Di Tolak' where kd_jadwal='$kd_jadwal'") 
		or die(mysql_error());
//exit();
if ($query) {
	header('location:approve.php?msg=success');
} else {
	header('location:approve.php?msg=failed');
}
?>