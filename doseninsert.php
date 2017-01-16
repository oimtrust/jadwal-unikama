<?php 
include_once('helper/config.php');

// terima data dari halaman daftar.php
$nidn   			= mysql_real_escape_string($_POST['nidn']);
$nama_staff   		= mysql_real_escape_string($_POST['nama_staff']);
$fakultas_staff		= mysql_real_escape_string($_POST['fakultas']);
$prodi_staff		= mysql_real_escape_string($_POST['prodi']);
$alamat_staff    	= mysql_real_escape_string($_POST['alamat_staff']);
$status_staff		= mysql_real_escape_string($_POST['status_staff']);

// simpan data ke database
$query = mysql_query("insert into tbl_staff values('$nidn',
						'$nama_staff','$fakultas_staff',
						'$prodi_staff','$alamat_staff', 
						'$status_staff')");

if ($query) {
  // jika berhasil menyimpan
  header('location: dosen.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: dosentambah.php?msg=failed');
}
?>