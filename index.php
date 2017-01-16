<?php 
include_once('helper/config.php');
include('helper/cek_login.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$username = $_SESSION['username'];
	$query_user_login = mysql_query("select * from users where username='$username'");
	$user_login = mysql_fetch_array($query_user_login);
	
	?>

Hi <?php echo $user_login['role']; ?>! - Sistem Penjadwalan UNIKAMA </title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="materialize/js/jquery-1.11.3.min.js"></script>
<style type="text/css">
	th,td {
		text-align:center;
	}
</style>
</head>

<body>
<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<h2 style="color:#26a69a">Sistem Penjadwalan UNIKAMA</h2>
</div>
<div style="margin:auto">
	<div class="content z-depth-4">
	
	<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 	
	$message = $_GET['msg'];
	
	if ($message == 'success') {
	?>
	<div class="info">Success</div>
	<?php } else if ($message == 'failed') {?>
	<div class="error">Error</div>
	<?php } ?>

	<div>
	<?php
	//$username = $_SESSION['username'];
	$query_user_login = mysql_query("select * from users where username='$username'");
	
	$user_login = mysql_fetch_array($query_user_login);
	?>
	<span class="btn waves-effect waves-light red darken-2" style="cursor:default">
		Selamat Datang, <?php echo $user_login['nama_staff']; ?>!</span>
	 <button class="btn waves-effect waves-light red darken-2 right" type="button" Value="logout"
	  Onclick="window.location.href='logout-dosen.php'">Logout <i class="material-icons right">
	  exit_to_app</i></button>

      </div>
     <br /><br/>
	<table  class="highlight responsive-table bordered z-depth-4">
		<thead>
			<tr>
				<th>No</th>
				<th>Action</th>
				<th>Hari</th>
				<th>Tanggal Awal</th>
				<th>Tanggal Akhir</th>
				<th>Ruang</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			//$user = $_SESSION['username'];
			$query = mysql_query("select
									jadwal.kd_jadwal,
									jadwal.hari,
									jadwal.tgl_awal,
									jadwal.tgl_akhir,
									jadwal.ruang,
									jadwal.status
								from
									tbl_jadwal as jadwal
								where
									nama_staff='$user_login[nama_staff]'");          	
			
			$i = 1;
			
			while ($data = mysql_fetch_array($query)) {
			?>
			<tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
				<td><?php echo $i; ?></td>
				<td>
					<?php 
					 $data['kd_jadwal']; 
					
					// jika user yang login memiliki role sebagai member, maka tampilkan menu untuk edit dan delete user
					if ($_SESSION['role'] == 'member') {
					?>
					<div class="row-actions">
						<a href="jadwaledit.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>">Edit</a>
						<?php if ($data['username'] != 'member') {?>
						 | <a href="jadwaldelete.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>" class="delete">Delete</a>
						<?php } ?>
					</div>
					<?php } ?>
				</td>
				<td><?php echo $data['hari']; ?></td>
				<td><?php echo $data['tgl_awal']; ?></td>
				<td><?php echo $data['tgl_akhir']; ?></td>
				<td><?php echo $data['ruang']; ?></td>
				<td><span style="color:red"><?php echo $data['status'];?></span></td>
			</tr>
			<?php 
				$i++;
			} 
			?>
		</tbody>
	</table>
<br>
<div class="row center">
<?php 
if ($_SESSION['role'] == 'member') {
					?>
					
						<button class="btn waves-effect red darken-2" type="button" Value="Dashboard" Onclick="window.location.href='jadwaltambah.php'">Tambah Jadwal</button>
						<?php if ($data['username'] != 'member') {?>
						<?php } ?>
					
					<?php } ?>
</div>
	</div>
</div><br>
	
	
</div><br>
	<div class="row center">
<span style="color:#26a69a">Copyright 2015</span>
    </div>
<div class="clear"></div>
<div style="padding-bottom:50px;"></div>
</body>
</html>