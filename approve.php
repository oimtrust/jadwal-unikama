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
<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<h2 style="color:#26a69a">Sistem Penjadwalan UNIKAMA</h2>
</div>

<section> <!-- Form Pemesan-->
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
		<span class="btn waves-effect waves-light red darken-2" style="cursor:default">
			Selamat Datang, <?php echo $user_login['nama_staff']; ?>!</span>
		 <button class="btn waves-effect waves-light red darken-2 right" type="button" Value="logout"
		  Onclick="window.location.href='approve-logout.php'">Logout <i class="material-icons right">
		  exit_to_app</i></button>
	<?php 
		if ($_SESSION['role'] == 'approve') {
		?>
			<button class="btn waves-effect light-blue darken-1" type="button" Value="Dashboard" Onclick="window.location.href='approve-lihatruang.php'">Lihat Ruang</button>
		<?php

						 if ($data['username'] != 'approve') {?>
							<?php } ?>
						
						<?php } ?>
      </div>

     <br /><br/>
	<table  class="highlight responsive-table bordered z-depth-4">
		<thead>
			<tr>
				<th>No</th>
				<th>Action</th>
				<th type="hidden"></th>
				<th>Nama Pemesan</th>
				<th>Instansi</th>
				<th>Ruang Dipesan</th>
				<th>Hari</th>
				<th>Tanggal Awal</th>
				<th>Tanggal Akhir</th>
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

				$query = mysql_query("select
										jadwal.kd_jadwal,
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Pending' limit $posisi, $batas");
			
			$i = 1 + $posisi;
			
			while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
				<td><?php echo $i; ?></td>
				<td>
					<?php 
					$data['kd_jadwal']; 
					
					// jika user yang login memiliki role sebagai approve, maka tampilkan menu untuk terima dan ditolak
					if ($_SESSION['role'] == 'approve') {
					?>
					<div class="row-actions">
						<a href="approve_terima.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>">Di Terima</a>
						<?php if ($data['username'] != 'approve') {?>
						 | <a href="approve_tolak.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>" class="delete">Di Tolak</a>
						<?php } ?>
					</div>
					<?php } ?>
				</td>
				<td type="hidden"><?php $data['kd_jadwal']; ?></td>
				<td><?php echo $data['nama_staff']; ?></td>
				<td><?php echo $data['instansi']; ?></td>
				<td><?php echo $data['ruang']; ?></td>
				<td><?php echo $data['hari'];?></td>
				<td><?php echo $data['tgl_awal']; ?></td>
				<td><?php echo $data['tgl_akhir']; ?></td>
				<td><span style="color:red"><?php echo $data['status']; ?></td>
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
					$jml_data	= mysql_num_rows(mysql_query("select
										jadwal.kd_jadwal,
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Pending'"));

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
	</div>
</div><br>

</section> <!-- Form Pemesan-->

<section> <!-- Form Di Tolak-->
<div style="margin:auto">
	<div class="content z-depth-4">
		<div style="text-align:center">
			<h4 class="btn waves-effect red darken-3">Tabel Pemesan Ditolak</h4>
		</div>
		<button class="btn waves-effect teal amber darken-4" type="button" Value="Dashboard" Onclick="window.location.href='approve_print_tolak.php'">Cetak Data Ditolak</button>
		<div>
			<table id="TableTolak" class="highlight responsive-table bordered z-depth-4">
				<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemesan</th>
				<th>Instansi</th>
				<th>Ruang Dipesan</th>
				<th>Hari</th>
				<th>Tanggal Awal</th>
				<th>Tanggal Akhir</th>
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

				$query = mysql_query("select
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Di Tolak' limit $posisi, $batas");
			
			$i = 1+$posisi;
			
			while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
				<td><?php echo $i; ?></td>
				<td><?php echo $data['nama_staff']; ?></td>
				<td><?php echo $data['instansi']; ?></td>
				<td><?php echo $data['ruang']; ?></td>
				<td><?php echo $data['hari'];?></td>
				<td><?php echo $data['tgl_awal']; ?></td>
				<td><?php echo $data['tgl_akhir']; ?></td>
				<td><span style="color:red"><?php echo $data['status']; ?></td>
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
					$jml_data	= mysql_num_rows(mysql_query("select
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Di Tolak'"));

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
		</div>
	</div>
</div>	
</div><br>

</section> <!-- Form Di Tolak-->

<section> <!-- Form Di Terima-->
<div style="margin:auto">
	<div class="content z-depth-4">
		<div style="text-align:center">
			<h4 class="btn waves-effect red darken-3">Tabel Pemesan Di Terima</h4>
		</div>
		<button class="btn waves-effect teal amber darken-4" type="button" Value="Dashboard" Onclick="window.location.href='approve_print_terima.php'">Cetak Data Diterima</button>
		<div>
			<table id="TableTerima" class="highlight responsive-table bordered z-depth-4">
				<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemesan</th>
				<th>Instansi</th>
				<th>Ruang Dipesan</th>
				<th>Hari</th>
				<th>Tanggal Awal</th>
				<th>Tanggal Akhir</th>
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

				$query = mysql_query("select
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Di Terima' limit $posisi, $batas");
			
			$i = 1+$posisi;
			
			while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
				<td><?php echo $i; ?></td>
				<td><?php echo $data['nama_staff']; ?></td>
				<td><?php echo $data['instansi']; ?></td>
				<td><?php echo $data['ruang']; ?></td>
				<td><?php echo $data['hari'];?></td>
				<td><?php echo $data['tgl_awal']; ?></td>
				<td><?php echo $data['tgl_akhir']; ?></td>
				<td><span style="color:red"><?php echo $data['status']; ?></td>
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
					$jml_data	= mysql_num_rows(mysql_query("select
										jadwal.nama_staff,
										staff.fakultas as instansi,
										jadwal.ruang,
										jadwal.hari,
										jadwal.tgl_awal,
										jadwal.tgl_akhir,
										jadwal.status
									from
										tbl_jadwal as jadwal
									left join tbl_staff as staff on jadwal.nidn = staff.nidn
									where jadwal.status='Di Terima'"));

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
		</div>
	</div>
</div>	
</div><br>

</section> <!-- Form Di Terima-->

<section> <!-- Form Grafik-->
<div style="margin:auto">
	<div class="content z-depth-4">
		<div style="text-align:center">
			<h4 class="btn waves-effect red darken-3">Grafik Jumlah Pemesan Ruangan</h4>
		</div>

		<div>
			<table id="TablePesan" class="highlight responsive-table bordered z-depth-4">
				<thead>
    				<tr> <th>Ruang</th> <th>Jumlah Pemesan</th></tr>
    			</thead>
    			<tbody >
    				<?php
						//QUERY MENGHITUNG JUMLAH SISWA SESUAI DENGAN KODE KELAS
        				$query_pemesan = "SELECT `status`, COUNT(*) FROM tbl_jadwal AS jdwal WHERE `status` = 'Di Terima' OR `status` = 'Di Tolak' GROUP BY `status`";
        				$result_pemesan = mysql_query($query_pemesan);
        				$data_pemesan = mysql_fetch_assoc($result_pemesan);

        					?>
        					<tr>
        						<td><?php echo $data_pemesan['status']; ?></td>
        						<td><?php echo $data_pemesan['COUNT(*)']; ?></td>
        					</tr>
    			</tbody>
			</table>

			<br>
<div class="row center">
<?php 
if ($_SESSION['role'] == 'approve') {
					?>
					
		<button class="btn waves-effect red darken-2" type="button" Value="Lihat Grafik" Onclick="window.location.href='grafik.php'">Lihat Grafik</button>
			<?php if ($data['username'] != 'approve') {?>
						<?php } ?>
					
					<?php } ?>
</div>
		</div>
	</div>
</div>	
</div><br>

</section> <!-- Form Grafik-->


	<div class="row center">
<span style="color:#26a69a">Copyright 2015</span>
    </div>
<div class="clear"></div>
<div style="padding-bottom:50px;"></div>
</body>
</html>