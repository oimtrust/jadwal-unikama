<?php
include('helper/config.php');

session_start();

// terima data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	// kalau username dan password kosong
	header('location:admin.php?error=1');
	break;
} else if (empty($username)) {
	// kalau username saja yang kosong
	header('location:admin.php?error=2');
	break;
} else if (empty($password)) {
	// kalau password saja yang kosong
	header('location:admin.php?error=3');
	break;
}

$query = mysql_query("select * from users where username='$username' and password='$password'");

$data = mysql_fetch_array($query);

if(mysql_num_rows($query)==1){//jika berhasil akan bernilai 1

$_SESSION['username'] = $data['username'];
$_SESSION['role'] = $data['role'];

if($data['role']=='admin'){
		header('location:dashboard.php');
}
	else if($data['role']=='member'){
		header('location:login.php');
	}
}
 else {
	// kalau username ataupun password tidak terdaftar di database
	header('location:admin.php?error=4');
}
?>