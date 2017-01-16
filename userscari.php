<?php 
	include('helper/config.php');

   $option = '<option value="">-Nama Staff-</option>';
   
   $nidn = isset($_GET['nidn']) ?  $_GET['nidn'] :'';
  // print_r($_GET);
   $res = mysql_query("select nama_staff from tbl_staff where nidn='".$nidn."'");
   if($res) {
      while ($row = mysql_fetch_assoc($res)) {
	     $option .= "<option value='".$row['nama_staff']."'>".$row['nama_staff']."</option>";
      }
   }
   echo $option;
   //exit();
 ?>