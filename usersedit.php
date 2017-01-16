<?php 
include_once('helper/config.php');
include('helper/cek_login.php');

if ($_SESSION['role']=='admin'){
}
else {?><script type="text/javascript">
            window.location.href = "index.php"
    </script> 
	<h1>anda tidak berhak mengakses halamman ini</h1>
<?php }

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Users - UNIKAMA</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="materialize/js/jquery-1.11.3.min.js"></script>
</head>

<body>
<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<h2 style="color:26a69a">Sistem Penjadwalan UNIKAMA</h2>
</div>
<div style="margin:auto">
	<form action="usersupdate.php" method="post" style="width:400px; margin:auto;">
		<fieldset class="rounded_3">
			<legend>Edit Users</legend>
			<?php 
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
			$message = $_GET['msg'];
			
			if ($message == 'success') {
			?>
			<div class="info">Success</div>
			<?php } else if ($message == 'failed') {?>
			<div class="error">Error</div>
			<?php } ?>
			
			
			<?php 
			// terima id_user dari halaman users
			$user_id = $_GET['uid'];
			
			$query = mysql_query("select * from users where id_user='$user_id'");
			
			$data = mysql_fetch_array($query);
			?>
			

			<div class="input-field col s6">
      		<i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="username" required value="<?php echo $data['username']; ?>" disabled>
          <label for="icon_prefix">Username</label>
    </div>
			<div class="input-field col s6">
      		<i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" class="validate" name="password" required value="<?php echo $data['password']; ?>">
          <label for="icon_prefix">Password</label>
    </div>	

    <div class="input-field col s6">
      		<i class="material-icons prefix">verified_user</i>
          <input id="icon_prefix" type="email" class="validate" name="email" required value="<?php echo $data['email']; ?>">
          <label for="icon_prefix">Email</label>
    </div>

    <div class="input-field col s6">
    	<div class="input-field col s6">
    		Nama User
    	</div>
    </div>

	<div class="input-field col s6">
      	<div class="input-field col s6">
            <?php 
              $result = mysql_query("select * from dosen");
              echo '<select name="fullname" class="browser-default"';
              echo '<option>---</option>';
              while ($row = mysql_fetch_array($result)) {
                  echo '<option value"' . $row['nama_dosen'] . '">' . $row['nama_dosen'] . '</option>';
                }
                  echo '</select>';
            ?>
          </div>
    </div>	

    <div class="input-field col s6">
    	<div class="input-field col s6">
    		Status User
    	</div>
    </div>
			
		
			<?php
			// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
			if ($_SESSION['role'] == 'admin') {
				if ($data['username'] != 'admin') {
			?>
			<div>
			<select class="browser-default" name="role">
      <option value="member">Member</option>
      <option value="admin">Admin</option>
      <option value="approve">Approve</option>
    </select>
    </div>
			<?php 
				}
			} 
			?>
			<div class="row center">
				<?php if ($logged_in) { ?>
				<button class="btn waves-effect waves-light" type="submit" name="submit">Update User<i class="material-icons right">send</i></button> 
				<br><br>
				<?php } else {?>
				<span class="left"><a href="login.php">Login</a></span>
				<?php } ?>
				<button class="btn waves-effect waves-light" type="button" Value="lihat data" Onclick="window.location.href='users.php'">Lihat Data<i class="material-icons right">subject</i></button>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $data['id_user']; ?>" />
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