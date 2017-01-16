<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("jadwal_unikama", $con);

$result = mysql_query("SELECT * FROM ruang");

$rows = array();
while($r = mysql_fetch_array($result)) {
	
	
	$kode= $r[0];
	$row[0] = $r[1];
	
	$hasil2 = mysql_query("SELECT count(*) as jum FROM approve WHERE ruang_dipesan = '$kode'");
    $data2 = mysql_fetch_row($hasil2);
    $row[1] = $data2[0];
	
	
	array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
