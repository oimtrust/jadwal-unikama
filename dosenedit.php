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
<title>Edit Staff - UNIKAMA</title>
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
	<form action="dosenupdate.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Data Dosen/ Staff</legend>
			
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
      // terima nidn dari halaman staff
      $nidn = $_GET['nidn'];
      
      $query = mysql_query("select * from tbl_staff where nidn='$nidn'");
      
      $data = mysql_fetch_array($query);
      ?>

			<div class="input-field col s6">
      		<i class="material-icons prefix">vpn_key</i>
          <input id="icon_prefix" type="text" class="validate" name="nidn" required value="<?php echo $data['nidn']; ?>" disabled>
          <label for="icon_prefix">NIDN/ NIPP</label>
    </div>

		<div class="input-field col s6">
      		<i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nama_staff" required value="<?php echo $data['nama_staff']; ?>">
          <label for="icon_prefix">Nama Staff</label>
    </div>	

    <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" class="validate" name="fakultas" required value="<?php echo $data['fakultas']; ?>">
          <label for="icon_prefix">Fakultas</label>
    </div>

    <div class="input-field col s6">
          <i class="material-icons prefix">class</i>
          <input id="icon_prefix" type="text" class="validate" name="prodi" required value="<?php echo $data['prodi']; ?>">
          <label for="icon_prefix">Prodi</label>
    </div>

    <div class="input-field col s6">
      		<i class="material-icons prefix">location_on</i>
          <textarea id="textarea1" class="materialize-textarea" name="alamat_staff" required><?php echo $data['alamat_staff']; ?></textarea>
          <label for="textarea1">Alamat Staff</label>
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        Status Staff
      </div>
    </div>

      <div>
      <select class="browser-default" name="status_staff">
      <option value="Tetap">Tetap</option>
      <option value="Tidak Tetap">Tidak Tetap</option>
    </select>
    </div>

    		<div class="row center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Update Data Staff<i class="material-icons right">send</i></button> 
      </div>
<input type="hidden" name="nidn" value="<?php echo $data['nidn']; ?>" />
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