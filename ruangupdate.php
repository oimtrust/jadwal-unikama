<?php
include('helper/config.php');

//tangkap data dari form
$id_ruang = $_POST['id_ruang'];
$nama_ruang = $_POST['nama_ruang'];

//update data di database sesuai id_lab
$query = mysql_query("update ruang set id_ruang='$id_ruang', nama_ruang='$nama_ruang' where id_ruang='$id_ruang'") or die(mysql_error());

if ($query) {
	header('location:ruang.php?msg=success');
} else {
	header('location:ruang.php?msg=failed');
}
?>