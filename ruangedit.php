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
<title>Edit Ruang - UNIKAMA</title>
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
	<form action="ruangupdate.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Ruang UNIKAMA</legend>
			
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
      // terima nip dari halaman dosen
      $idruang = $_GET['idruang'];
      
      $query = mysql_query("select * from ruang where id_ruang ='$idruang'");
      
      $data = mysql_fetch_array($query);
      ?>

			<div class="input-field col s6">
      		<i class="material-icons prefix">vpn_key</i>
          <input id="icon_prefix" type="text" class="validate" name="id_ruang" required value="<?php echo $data['id_ruang']; ?>" disabled>
          <label for="icon_prefix">Kode Ruang</label>
    </div>
			<div class="input-field col s6">
      		<i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" class="validate" name="nama_ruang" required value="<?php echo $data['nama_ruang']; ?>">
          <label for="icon_prefix">Nama Ruang</label>
    </div>	

    		<div class="row center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Update Ruang<i class="material-icons right">send</i></button> 
        <button class="btn waves-effect red darken-2" type="button" Value="Dashboard" Onclick="window.location.href='ruang.php'">Cancel</button>
      </div>
<input type="hidden" name="id_ruang" value="<?php echo $data['id_ruang']; ?>" />
		</fieldset>
	</form>
<br>
	<div class="row center">
Copyright 2015
    </div>
  </div>
</div>
<script src="materialize/js/materialize.min.js"></script>
</body>
</html>