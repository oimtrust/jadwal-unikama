<?php
include_once('helper/config.php');
include('helper/cek_login.php');
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Jadwal - UNIKAMA</title>
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
	<form action="jadwalupdate.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Update Jadwal</legend>
			
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
      $kdjadwal = $_GET['kd_jadwal'];
      
      $query = mysql_query("select * from tbl_jadwal where kd_jadwal='$kdjadwal'");
      
      $data   = mysql_fetch_array($query);
      ?>

		<div class="input-field col s6">
      <input id="icon_prefix" type="text" class="validate" name="kd_jadwal" required value="<?php echo $data['kd_jadwal']; ?>" disabled hidden>
		  <label for="icon_prefix" hidden>Kode Jadwal</label>
    </div>	

    <div>  

      <?php
        $username = $_SESSION['username'];
        $query_staff_nidn = mysql_query("select * from users where username='$username'");
  
        $staff_nidn = mysql_fetch_array($query_staff_nidn);
      ?>
    <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nidn" required readonly hidden value="<?php echo $staff_nidn['nidn']; ?>">
    </div>
    </div>

    <div>  

      <?php
        $username = $_SESSION['username'];
        $query_user_login = mysql_query("select * from users where username='$username'");
  
        $user_login = mysql_fetch_array($query_user_login);
      ?>
    <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nama_staff" required readonly value="<?php echo $user_login['nama_staff']; ?>">
          <label for="icon_prefix">Nama Pemesan</label>
    </div>
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        Tanggal Awal
      </div>
    </div>

    <div class="input-field col s6">
      		<i class="material-icons prefix">hourglass_empty</i>
       <input id="icon_prefix" type="date" class="validate" name="tgl_awal" required value="<?php echo $data['tgl_awal']; ?>">    
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        Tanggal Akhir
      </div>
    </div>
	
	<div class="input-field col s6">
      		<i class="material-icons prefix">hourglass_full</i>
       <input id="icon_prefix" type="date" class="validate" name="tgl_akhir" required value="<?php echo $data['tgl_akhir']; ?>">    
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        Hari
      </div>
    </div>
		
    <div class="input-field col s6">
		  <div class="input-field col s6">
			  <select class="browser-default" name="hari">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
	        <option value="Rabu">Rabu</option>
	        <option value="Kamis">Kamis</option>
	        <option value="Jum'at">Jum'at</option>
	        <option value="Sabtu">Sabtu</option>
          <option value="Minggu">Minggu</option>
        </select>
      </div>	
    </div>

    <div class="input-field col s6">
      <div class="input-field col s6">
        Nama Ruang
      </div>
    </div>

    <div class="input-field col s6">
    	<div class="input-field col s6">
    		<?php 

				$result = mysql_query("select * from ruang");
    			echo '<select name="ruang" class="browser-default"';
    			echo '<option>---Pilih Ruang---</option>';
    			while ($row = mysql_fetch_array($result)) {
    				echo '<option value="' . $row['nama_ruang'] . '">' . $row['nama_ruang'] . '</option>';
    			}
    			echo '</select>';
    		?>
    	</div>
    </div>
	
	Status : 
      <input name="status" type="radio" value="Pending" id="pending" checked="checked" /><label for="pending">Pending</label>
	<br>

    		<div class="row center">
        <button class="btn waves-effect waves-light" 
            type="submit" name="submit">Update<i class="material-icons right">send</i></button>
        <button class="btn waves-effect red darken-2" 
            type="button" Value="Cancel" Onclick="window.location.href='index.php'">Cancel <i class="material-icons right">input</i></button>
      </div>
      <input type="hidden" name="kd_jadwal" value="<?php echo $data['kd_jadwal']; ?>" />
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