<?php 
include_once('helper/config.php');
include('helper/cek_login.php');

if ($_SESSION['role']=='admin'){
}
else {?><script type="text/javascript">
            window.location.href = "index.php"
    </script> 
  <h1>anda tidak berhak mengakses halamman ini</h1>
<?php 
  }

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - UNIKAMA</title>
<link rel="stylesheet" href="./css/style.css" type="text/css" />
<link rel="stylesheet" href="./materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="./materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="./materialize/js/jquery-1.11.3.min.js"></script>
</head>

<body>
<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<h2 style="color:26a69a">Sistem Penjadwalan UNIKAMA</h2>
</div>
<div style="margin:auto">
	<form action="auth.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Dasboard Admin</legend>
    		<div class="row center">
        <button class="btn waves-effect waves-light btn-large" type="button" Value="Home Page" Onclick="window.location.href='dosen.php'">Dosen / Staff<i class="material-icons right">subject</i></button><br><br>
        <button class="btn waves-effect waves-light btn-large" type="button" Value="Home Page" Onclick="window.location.href='ruang.php'">Ruang<i class="material-icons right">subject</i></button><br><br>
        <button class="btn waves-effect waves-light btn-large" type="button" Value="Home Page" Onclick="window.location.href='users.php'">User<i class="material-icons right">subject</i></button>
      </div>
		</fieldset>
     <button class="btn waves-effect red darken-2 right" type="button" Value="Logout" Onclick="window.location.href='logout.php'">Logout</button>
	</form>
<br><br>
	<div class="row center">
Copyright 2015
    </div>
  </div>
</div>
<script src="./materialize/js/materialize.min.js"></script>
</body>
</html>