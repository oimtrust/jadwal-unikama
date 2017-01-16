<!--Fungsi Load Javascript fusioncharts-->
<script type="text/javascript" src="materialize/js/jquery-1.4.js"></script>
<script type="text/javascript" src="materialize/js/jquery.fusioncharts.js"></script>
<!--GRAFIK JUMLAH SISWA PER KELAS-->
<div class="tengah_judul">
   	Grafik Jumlah Ruangan yang di pesan<hr align="left" size="1" color="#cccccc">
</div>

<table id="TablePesan" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Ruang</th> <th>Jumlah Pemesan</th></tr>
    <?php
	//KONEKSI KE DATABASE
	mysql_connect("localhost", "root", "") ;
    mysql_select_db("jadwal_unikama");
	//QUERY AMBIL DATA KELAS
    $query_ruang = "SELECT * FROM ruang";
    $result_ruang = mysql_query($query_ruang);
    $count_ruang = mysql_num_rows($result_ruang);

    while ($data = mysql_fetch_array($result_ruang)) {
        $kode_ruang = $data['id_ruang'];
		//QUERY MENGHITUNG JUMLAH SISWA SESUAI DENGAN KODE KELAS
        $query_siswa = "SELECT COUNT(*) AS jumlah_ruang FROM approve WHERE id_ruang='$kode_ruang'";
        $result_siswa = mysql_query($query_siswa);
        $data_siswa = mysql_fetch_array($result_siswa);

        echo "<tr bgcolor='#D5F35B' style='display:none;'>
              <td>Ruang $data[nama_ruang]</td>
              <td align='center'>$data_siswa[jumlah_ruang]</td>
              </tr>";
    }
    ?>

</table>

<button Onclick="window.location.href='approve.php'">Kembali</button>
<!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script type="text/javascript">
    $('#TablePesan').convertToFusionCharts({
        swfPath: "Charts/",
        type: "MSColumn3D",
        data: "#TablePesan",
        dataFormat: "HTMLTable"
    });
</script>