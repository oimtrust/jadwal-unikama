<?php 
include_once('helper/config.php');

// terima data dari halaman daftar.php
$id_ruang   = mysql_real_escape_string($_POST['id_ruang']);
$nama_ruang   = mysql_real_escape_string($_POST['nama_ruang']);

// simpan data ke database
$query = mysql_query("insert into ruang values('$id_ruang ', '$nama_ruang')");

if ($query) {
  // jika berhasil menyimpan
  header('location: ruang.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: ruangtambah.php?msg=failed');
}
?>