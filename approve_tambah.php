<?php


include_once('helper/config.php');
include('helper/cek_login.php');

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data - UNIKAMA</title>
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
	<form action="approve_insert.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Tambah Data</legend>
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
          <input id="icon_prefix" type="text" class="validate" name="nama_pemesan" required>
          <label for="icon_prefix">Nama Pemesan</label>
    </div>

    <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" class="validate" name="instansi" required>
          <label for="icon_prefix">Instansi</label>
    </div> 

    <div class="input-field col s6">
      <div class="input-field col s6">
        Ruang Yang Dipesan
      </div>
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        <?php 

        $result = mysql_query("select * from ruang");
          echo '<select name="ruang_dipesan" class="browser-default"';
          echo '<option>---Pilih Ruang---</option>';
          while ($row = mysql_fetch_array($result)) {
            echo '<option value="' . $row['id_ruang'] . '">' . $row['nama_ruang'] . '</option>';
          }
          echo '</select>';
        ?>
      </div>
    </div>
	
	    <div class="input-field col s6">
      		<i class="material-icons prefix">date_range</i>
          <input id="icon_prefix" type="date" class="validate" name="tgl_awal" required>    
      </div>

      <div class="input-field col s6">
          <i class="material-icons prefix">date_range</i>
          <input id="icon_prefix" type="date" class="validate" name="tgl_akhir" required>    
      </div>

    <div class="input-field col s6">
          <i class="material-icons prefix">schedule</i>
          <input id="icon_prefix" type="text" class="validate" name="jarak_waktu" required>
          <label for="icon_prefix">Jangka Waktu</label>
    </div>
	
	

    		<div class="row center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Tambah<i class="material-icons right">send</i></button>
        <button class="btn waves-effect red darken-2" type="button" Value="Cancel" Onclick="window.location.href='approve.php'">Cancel <i class="material-icons right">input</i> </button>
      </div>
		</fieldset>
	</form>
<br>
	<div class="row center">
Copyright 2015
    </div>
  </div>
<script src="materialize/js/materialize.min.js"></script>
</body>
</html>