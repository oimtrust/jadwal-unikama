<?php
include('helper/config.php');

//tangkap data dari form
$kd_jadwal 		= $_POST['kd_jadwal'];
$nidn			= $_POST['nidn'];
$nama_staff		= $_POST['nama_staff'];
$hari			= $_POST['hari'];
$tgl_awal 		= $_POST['tgl_awal'];
$tgl_akhir 		= $_POST['tgl_akhir'];
$ruang			= $_POST['ruang'];
$status		 	= $_POST['status'];

//update data di database sesuai kd_jadwal
$query = mysql_query("update tbl_jadwal set kd_jadwal='$kd_jadwal',
						nidn='$nidn', nama_staff='$nama_staff', hari='$hari',
						tgl_awal='$tgl_awal', tgl_akhir='$tgl_akhir',
						ruang='$ruang', status='$status' where kd_jadwal='$kd_jadwal'")
or die(mysql_error());

if ($query) {
	header('location:index.php?msg=success');
} else {
	header('location:index.php?msg=failed');
}
?>