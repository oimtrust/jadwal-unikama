<?php 
include('helper/config.php');

$kdjadwal = $_GET['kd_jadwal'];

$query = mysql_query("delete from tbl_jadwal where kd_jadwal ='$kdjadwal'") or die(mysql_error());

if ($query) {
	header('location:index.php?msg=success');
} else {
	header('location:index.php?msg=failed');
}
?>