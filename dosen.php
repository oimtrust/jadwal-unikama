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
<title>Dosen - UNIKAMA</title>
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
	<h2 style="color:26a69a">Sistem Penjadwalan UNIKAMA</h2>
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
		$username = $_SESSION['username'];
		$query_user_login = mysql_query("select * from users where username='$username'");
		
		$user_login = mysql_fetch_array($query_user_login);
		?>
		<span class="btn waves-effect red darken-2">Selamat Datang, <?php echo $user_login['nama_staff']; ?>!</span>
		 <button class="btn waves-effect red darken-2 right" type="button" Value="Logout" Onclick="window.location.href='logout.php'">Logout</button>
      </div>
	<br /><br/>
	<table  class="highlight responsive-table bordered z-depth-4">
		<thead>
			<tr>
				<th>No</th>
				<th>NIDN/ NIPP</th>
				<th>Nama Staff</th>
				<th>Fakultas</th>
				<th>Progam Studi</th>
				<th>Alamat</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$batas	= 5;
					$pg 	= isset($_GET['pg']) ? $_GET['pg'] : "";

					if (empty($pg)) {
						$posisi	= 0;
						$pg 	= 1;
					} else{
						$posisi = ($pg - 1) * $batas;
					}

			$query = mysql_query("select * from tbl_staff limit $posisi, $batas");
			
			$i = 1 + $posisi;
			
			while ($data = mysql_fetch_array($query)) {
			?>
			<tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
				<td><?php echo $i; ?></td>
				<td>
					<?php 
					echo $data['nidn']; 
					
					// jika user yang login memiliki role sebagai admin, maka tampilkan menu untuk edit dan delete user
					if ($_SESSION['role'] == 'admin') {
					?>
					<div class="row-actions">
						<a href="dosenedit.php?nidn=<?php echo $data['nidn'];?>">Edit</a>
						<?php if ($data['username'] != 'admin') {?>
						 | <a href="dosendelete.php?nidn=<?php echo $data['nidn'];?>" class="delete">Delete</a>
						<?php } ?>
					</div>
					<?php } ?>
				</td>
				<td><?php echo $data['nama_staff']; ?></td>
				<td><?php echo $data['fakultas']; ?></td>
				<td><?php echo $data['prodi']; ?></td>
				<td><?php echo $data['alamat_staff']; ?></td>
				<td><?php echo $data['status_staff']; ?></td>
			</tr>
			<tr>
			<?php 
				$i++;
			} 
			?>
			</tr>
			<td>
				<?php 
					//Menghitung jumlah data
					$jml_data	= mysql_num_rows(mysql_query("select * from tbl_staff"));

					//Jumlah halaman
					$jml_halaman	= ceil($jml_data/$batas); //Ceil digunakan untuk pembulatan ke atas

					//Navigasi ke sebelumnya
					if ($pg > 1) {
						$link	= $pg-1;
						$prev	= "<ul class='pagination'>
									<li class='waves-effect'>
									<a href='?pg=$link'><i class='material-icons'>chevron_left</i> </a>
									</li>";
					}else{
						$prev	= "<i class='material-icons'>chevron_left</i>";
					}

					//Navigasi nomor
					$nmr 	= '';
					for ($i=1; $i < $jml_halaman; $i++) { 
						if ($i == $pg) {
							$nmr .= $i . " ";
						} else{
							$nmr .= "<li class='waves-effect'><a href='?pg=$i'>$i</a> </li>";
						}
					}

					//Navigasi ke selanjutnya
					if ($pg < $jml_halaman) {
						$link 	= $pg + 1;
						$next	= " <li class='waves-effect'>
									<a href='?pg=$link'><i class='material-icons'>chevron_right</i></a>
									</li><ul>";
					} else {
						$next	= " <i class='material-icons'>chevron_right</i>";
					}

					//Tampilkan navigasi
					echo $prev . $nmr . $next;
				 ?>
			</td>
		</tbody>
	</table>
<br>
<div class="row center">
<?php 
	if ($_SESSION['role'] == 'admin') {
?>
	<button class="btn waves-effect red darken-2" type="button" Value="Dashboard" Onclick="window.location.href='dosentambah.php'">Tambah Staff</button>
	<?php if ($data['username'] != 'admin') {?>
	<?php } ?>
	<?php } ?>
<button class="btn waves-effect red darken-2" type="button" Value="Dashboard" Onclick="window.location.href='dashboard.php'">Dashboard</button>
</div>
	</div>
</div><br>
	<div class="row center">
Copyright 2015
    </div>
<div class="clear"></div>
<div style="padding-bottom:50px;"></div>
</body>
</html>