<?php 
	include_once('helper/config.php');
	include('helper/cek_login.php');

	$html = '<h2 style="text-align:center;">Laporan Pemesanan Ruang</h2>
		<h4 style="margin-top: 10pt; text-align:center; margin-collapse:collapse;">Laporan Data Di Tolak</h4>

		<table border="1" style="width:100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;">
			<thead>
				<tr style="text-align:left">
					<th>No.</th>
					<th>Nama Pemesan</th>
					<th>Instansi</th>
					<th>Ruang Dipesan</th>
					<th>Hari</th>
					<th>Tgl. Awal</th>
					<th>Tgl. Akhir</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>';
				//Menampilkan data Di Tolak
				$no = 1;
				$sql = mysql_query("select
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
									where jadwal.status='Di Tolak'");
				while ($data = mysql_fetch_assoc($sql)) {
					$html .= '<tr class="'; if(($no % 2) == 0){$html .= "evenrow";} else {$html .= "oddrow";} $html .='">';
					$html .= '<th>'.$no.'</th>';
					$html .= '<th>'.$data['nama_staff'].'</th>';
					$html .= '<th>'.$data['instansi'].'</th>';
					$html .= '<th>'.$data['ruang'].'</th>';
					$html .= '<th>'.$data['hari'].'</th>';
					$html .= '<th>'.$data['tgl_awal'].'</th>';
					$html .= '<th>'.$data['tgl_akhir'].'</th>';
					$html .= '<th>'.$data['status'].'</th>';
					$html .= '</tr>';
					$no++;
				}
	$html .= '</tbody></table>';

	include 'mpdf60/mpdf.php';
	$mpdf 	= new mPDF('C', 'A4', '', '', 32, 25, 27, 25, 16, 8);
	$mpdf->AddPage('L','','','','',25,25,55,45,18,8);
	$mpdf->setDisplayMode('fullpage');
	$mpdf->list_indent_first_level = 0;
	$stylesheet = file_get_contents('mpdf60/mpdf.css');
	$mpdf->mirrorMargins = 1;
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('laporan-pemesanan-tolak.pdf', 'I');
	exit;
 ?>