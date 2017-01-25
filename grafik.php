<?php 
    require_once 'helper/cek_login.php';
    require_once 'helper/config.php';
 ?>

 <html>
<head>
    <title></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
<link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="materialize/js/jquery-1.11.3.min.js"></script>

<!--Fungsi Load Javascript fusioncharts-->
<script type="text/javascript" src="materialize/js/jquery-1.4.js"></script>
<script type="text/javascript" src="materialize/js/jquery.fusioncharts.js"></script>
<style type="text/css">
    th,td {
        text-align:center;
    }
</style>
</head>
<body>

<!--GRAFIK JUMLAH SISWA PER KELAS-->
<div class="row">
<div class="col s5 offset-s3">
    Grafik Jumlah Ruangan yang di pesan<hr align="left" size="1" color="#cccccc">

<table id="TablePesan" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Ruang</th> <th>Jumlah Pemesan</th></tr>
    <?php
    
        //QUERY AMBIL DATA RUANG
        $query_ruang = "SELECT `status`, COUNT(*) FROM tbl_jadwal AS jdwal WHERE `status` = 'Di Terima' OR `status` = 'Di Tolak' GROUP BY `status`";
        $result_ruang = mysql_query($query_ruang);
                        
        while ($data = mysql_fetch_array($result_ruang)) {
    ?>

    <tr>
        <td><?php echo $data['status']; ?></td>
        <td><?php echo $data['COUNT(*)']; ?></td>
    </tr>

    <?php 
        } 
    ?>

</table>

</div>
</div>

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


</body>
</html>