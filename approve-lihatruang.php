<html>
<head>
	<title></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="materialize/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="materialize/js/jquery.fusioncharts.js"></script>
<script type="text/javascript" src="materialize/js/jquery-1.4.js"></script>
<style type="text/css">
	th,td {
		text-align:center;
	}
</style>
</head>
<body>

	<?php 
include_once('helper/config.php');
include('helper/cek_login.php');
$tgl_hari_ini = date("Y-m-d");
error_reporting(0);
?>

	<div style="margin:auto; padding:50px 0 30px; text-align:center">
		<h2 style="color:#26a69a">Sistem Penjadwalan UNIKAMA</h2>
		<h2>Tanggal : <?php echo $tgl_hari_ini; ?></h2>
	</div>

	<section>
	<div style="margin:auto">


		<div class="content z-depth-4">

		<?php 



		$query = mysql_query("SELECT * FROM ruang");
		$sql = mysql_query("SELECT * FROM tbl_jadwal WHERE CURDATE() <= `tgl_awal` AND `tgl_akhir` OR status = 'Di Terima'");

		while ($data1 = mysql_fetch_assoc($sql)) {
			$getData = $data1['ruang'];
		}


		?>

		<div>
		<?php
			$username = $_SESSION['username'];
			$query_user_login = mysql_query("select * from users where username='$username'");
			
			$user_login = mysql_fetch_array($query_user_login);
		?>
		<span class="btn waves-effect waves-light red darken-2" style="cursor:default">
			Selamat Datang, <?php echo $user_login['nama_staff']; ?>!</span>
		 <button class="btn waves-effect waves-light red darken-2 right" type="button" Value="logout"
		  Onclick="window.location.href='approve.php'">Back <i class="material-icons right">
		  exit_to_app</i></button>
	<?php 
		if ($_SESSION['role'] == 'approve') {
			if ($data['username'] != 'approve') {?>
			<?php }
			} ?>
      </div>

		<table class="highlight responsive-table bordered z-depth-4">

			<thead>
				<th>Nama Ruang</th>
			</thead>

			<tbody>
			<?php 
				while ($data = mysql_fetch_assoc($query)) {
			 ?>
				<td>
					<button class="btn waves-effect waves-light" style="background-color:<?php echo ($getData==$data['nama_ruang'])?'red':'blue'; ?>">
						<?php echo $data['nama_ruang']; ?>
					</button>
				</td>
			<?php } ?>
			</tbody>
			
		</table>
		</div>
	</div>
	</section>

		<!-- style="background-color:red" -->

</body>
</html>