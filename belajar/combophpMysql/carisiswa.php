<?php
   /*******************************************
    Meload data dari database ke select option
 
    Dibuat oleh : Danni Moring
    pemrograman : PHP
    ******************************************/

   /************* Ini untuk koneksi kedatabase nya **********/
   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "mahasiswa";
 
   $database = new mysqli($server, $user, $pass, $db); 
   /*********************************************************/
   
   $option = '<option value=""> - Data Siswa - </option>';
   
   $jk = isset($_GET['jk']) ?  $_GET['jk'] :'';
   $sql = "select nama,idsiswa from datasiswa where jenis_kelamin='".$jk."'";
   if($res = $database->query($sql)) {
      while ($row = $res->fetch_assoc()) {
	     $option .= "<option value='".$row['idsiswa']."'>".$row['nama']."</option>";
      }
   }
   echo $option;
?>