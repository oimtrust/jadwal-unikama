<?php
include('helper/config.php');

//tangkap data dari form
$nidnz 				= $_POST['nidn'];
$nama_staffz		= $_POST['nama_staff'];
$fakultas_staffz	= $_POST['fakultas'];
$prodi_staffz		= $_POST['prodi'];
$alamat_staffz 		= $_POST['alamat_staff'];
$status_staffz 		= $_POST['status_staff'];

//update data di database sesuai nidn
$query = mysql_query("update tbl_staff set nama_staff='$nidnz', 
						nama_staff='$nama_staffz', 
						fakultas='$fakultas_staffz',
						prodi='$prodi_staffz', 
						alamat_staff='$alamat_staffz', 
						status_staff='$status_staffz' 
						where nidn='$nidnz'") or die(mysql_error());

if ($query) {
	header('location:dosen.php?msg=success');
} else {
	header('location:dosenedit.php?msg=failed');
}
?>