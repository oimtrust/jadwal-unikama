<?php 
include_once('helper/config.php');

// terima data dari halaman daftar.php
$nidn			= mysql_real_escape_string($_POST['nidn']);
$nama_staff		= mysql_real_escape_string($_POST['nama_staff']);
$hari			= mysql_real_escape_string($_POST['hari']);
$tgl_awal    	= mysql_real_escape_string($_POST['tgl_awal']);
$tgl_akhir    	= mysql_real_escape_string($_POST['tgl_akhir']);
$ruang			= mysql_real_escape_string($_POST['ruang']);
$status	    	= mysql_real_escape_string($_POST['status']);

// simpan data ke database
$query = mysql_query("insert into tbl_jadwal values('', '$nidn', '$nama_staff', '$hari', '$tgl_awal', '$tgl_akhir', '$ruang', '$status')");

if ($query) {
  // jika berhasil menyimpan
  header('location: index.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: jadwaltambah.php?msg=failed');
  
}

?>