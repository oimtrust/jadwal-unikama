<?php
 
$koneksi = mysql_connect("localhost","root","");
mysql_select_db("jadwal_unikama",$koneksi);
 
?>
 
<table border='1' style="border-collapse:collapse" cellpadding="5px">

<tr>
<th>No</th>
<th>Nama Staff</th>
<th>Fakultas</th>
</tr>
 
<?php
$batas = 2;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}
 
$sql = mysql_query("SELECT * FROM tbl_staff limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
?>
<tr align="center">
<td><?= $no; ?></td>
<td><?= $r['nama_staff']; ?></td>
<td><?= $r['fakultas']; ?></td>
</tr>
<?php
$no++;
}
?>
<tr>
<td colspan="3">
<?php
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM tbl_staff"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>Sebelumnya </a>";
} else {
$prev = "Sebelumnya ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
 
//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = " <a href='?pg=$link'>Selanjutnya</a>";
} else {
$next = " Selanjutnya";
}
 
//Tampilkan navigasi
echo $prev . $nmr . $next;
?>
</td>
</tr>
</table>
<br />
Total Data Anda adalah :<b> <?php echo $jml_data; ?> </b>