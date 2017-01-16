<?php
$logged_in = false;

//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}

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
<title>Tambah Users - LABICT</title>
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
	<form action="usersinsert.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Tambah Users</legend>
			
			<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 			
			$message = $_GET['msg'];
			if ($message == 'success') {
			?>
			<div class="info">Success</div>
			<?php } else if ($message == 'failed') {?>
			<div class="error">Error</div>
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

    <div class="input-field col s6">
      		<i class="material-icons prefix">verified_user</i>
          <input id="icon_prefix" type="email" class="validate" name="email" required>
          <label for="icon_prefix">Email</label>
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        NIDN User
      </div>
    </div>

    <div class="input-field col s6">
          <div class="input-field col s6">
            <?php 
              $result = mysql_query("select * from tbl_staff");
              echo '<select name="nidn" id="nidn" class="browser-default"';
              echo '<option>---</option>';
              while ($row = mysql_fetch_array($result)) {
                  echo '<option value="' . $row['nidn'] . '">' . $row['nidn'] . '</option>';
                }
                  echo '</select>';
            ?>
          </div>
    </div>  

    <div class="input-field col s6">
      <div class="input-field col s6">
        Nama User
      </div>
    </div>

    <div class="input-field col s6">
          <div class="input-field col s6">
            <select name="nama_staff" id="nama_staff" class="browser-default">
              <option value="">-Nama Staff-</option>
            </select>
          </div>
    </div>  

    <div class="input-field col s6">
      <div class="input-field col s6">
        Status User
      </div>
    </div>

		<div class="input-field col s6">
        <div class="input-field col s6">
            <select class="browser-default" name="role">
                <option value="admin">Admin</option>
                <option value="member">Member</option>
                <option value="approve">Approve</option>
              </select>
        </div>
    </div>	

    		<div class="row center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Tambah<i class="material-icons right">send</i></button> 
         <button class="btn waves-effect red darken-2" type="button" Value="Dashboard" Onclick="window.location.href='users.php'">Cancel</button>
      </div>

		</fieldset>

	</form>

<br>
	<div class="row center">
Copyright 2015
    </div>
  </div>
</div>
<script src="materialize/js/materialize.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
   $('#nidn').change(function(){
      $('#nama_staff').after('<span class="loading">Tunggu..sedang load data Nama Staff..</span>');
    $('#nama_staff').load('userscari.php?nidn=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
</body>
</html>