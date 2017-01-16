<html>
<head>
<title>Load Data dari database ke Select Option</title>
</head>
<body>
<form id="frmdata">
	<select id="jkelamin">
	   <option value="">- Pilih Jenis Kelamin -</option>
	   <option value="1">Laki-laki</option>
	   <option value="0">Perempuan</option>
	</select>

	<select id="siswa">
	<option value="">- Data Siswa -</option>
	</select>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
   $('#jkelamin').change(function(){
	    $('#siswa').after('<span class="loading">Tunggu..sedang load data siswa..</span>');
		$('#siswa').load('carisiswa.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
		{
		  if(statusTxt=="success")
			$('.loading').remove();
		
		});
		return false;
   });

});

</script>

</body>
</html>