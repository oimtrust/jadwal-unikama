<?php 
include_once('helper/config.php');

// terima data dari halaman daftar.php
$nama_pemesan	= mysql_real_escape_string($_POST['nama_pemesan']);
$instansi    	= mysql_real_escape_string($_POST['instansi']);
$ruang_dipesan 	= mysql_real_escape_string($_POST['ruang_dipesan']);
$tgl_awal		= mysql_real_escape_string($_POST['tgl_awal']);
$tgl_akhir    	= mysql_real_escape_string($_POST['tgl_akhir']);
$jrk_waktu		= mysql_real_escape_string($_POST['jarak_waktu']);

// simpan data ke database
$query = mysql_query("insert into approve values('', '$nama_pemesan', '$instansi', '$ruang_dipesan', '$tgl_awal', '$tgl_akhir', '$jrk_waktu')");

if ($query) {
  // jika berhasil menyimpan
  header('location: approve.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: approve_tambah.php?msg=failed');
}

//print_r($_POST);
?>