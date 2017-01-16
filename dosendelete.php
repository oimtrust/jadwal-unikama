<?php 
include('helper/config.php');

$nidn = $_GET['nidn'];

$query = mysql_query("delete from tbl_staff where nidn='$nidn'") or die(mysql_error());

if ($query) {
	header('location:dosen.php?msg=success');
} else {
	header('location:dosen.php?msg=failed');
}
?>