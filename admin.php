<?php 
session_start();

include_once('helper/config.php');

if (!empty($_SESSION['username'])) {
	//header('location:index.php');
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - UNIKAMA</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="materialize/js/jquery-1.11.3.min.js"></script>
</head>

<body>
<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<h2 style="color:26a69a">Sistem Penjadwalan Unikama</h2>
</div>
<div style="margin:auto">
	<form action="auth.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Login</legend>
			<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
			$error = $_GET['error'];
			
			if ($error == 1) {
			?>
			<div class="error">Username dan Password belum diisi.</div>
			<?php } else if ($error == 2) {?>
			<div class="error">Username belum diisi.</div>
			<?php } else if ($error == 3) {?>
			<div class="error">Password belum diisi.</div>
			<?php } else if ($error == 4) {?>
			<div class="error">Username dan Password tidak terdaftar.</div>
			<?php } ?>
			
			<div class="input-field col s6">
      		<i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="username" required>
          <label for="icon_prefix">Username</label>
    </div>
			<div class="input-field col s6">
      		<i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" class="validate" name="password" required>
          <label for="icon_prefix">Password</label>
    </div>	
    		<div class="row center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Masuk<i class="material-icons right">send</i></button> <!-- 
        <button class="btn waves-effect waves-light" type="button" Value="Home Page" Onclick="window.location.href='usersdaftar.php'">Daftar<i class="material-icons right">subject</i></button> -->
      </div>
		</fieldset>
	</form>
<br><br>
	<div class="row center">
Copyright 2015
    </div>
  </div>
</div>
<script src="materialize/js/materialize.min.js"></script>
</body>
</html>