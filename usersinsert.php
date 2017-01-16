<?php 
include_once('helper/config.php');

// terima data dari halaman daftar.php
$username 	= mysql_real_escape_string($_POST['username']);
$password 	= mysql_real_escape_string($_POST['password']);
$email		= mysql_real_escape_string($_POST['email']);
$nidn		= mysql_real_escape_string($_POST['nidn']);
$nama_staff	= mysql_real_escape_string($_POST['nama_staff']);
$role		= mysql_real_escape_string($_POST['role']);
//$role		= 'member'; // variabel untuk settingan default level yang mendaftar

// simpan data ke database
$query = mysql_query("insert into users values('', '$nidn', '$username', '$password', '$email', '$nama_staff', '$role')");

if ($query) {
	// jika berhasil menyimpan
	header('location: users.php?msg=success');
} else {
	// jika gagal menyimpan
	header('location: users.php?msg=failed');
}
?>