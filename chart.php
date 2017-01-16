<!DOCTYPE HTML>
<html>
	<head>
	  
    <title>Membuat Chart Pie dengan Highcharts dan Mysql di PHP</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
	<link href="chart/assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="chart/assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

		<script type="text/javascript" src="chart/assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
				chart: {
	                renderTo: 'container',
	                plotBackgroundColor: null,
	                plotBorderWidth: null,
	                plotShadow: false
	            },
	            title: {
	                text: 'Statistik Pendaftar Berdasarkan Jurusan'
	            },
	            tooltip: {
	                formatter: function() {
	                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	                }
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                        color: '#000000',
	                        connectorColor: '#000000',
	                        formatter: function() {
	                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	                        }
	                    }
	                }
	            },
	            series: [{
	                type: 'pie',
	                name: 'Browser share',
	                data: []
	            }]
	        }
	        
	        $.getJSON("json_chart.php", function(json) {
				options.series[0].data = json;
	        	chart = new Highcharts.Chart(options);
	        });
	        
	        
	        
      	});   
		</script>
		<script src="chart/assets/js/highcharts.js"></script>
        <script src="chart/assets/js/exporting.js"></script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="http://andeznet.com">AndezNet</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="media.php">Back To Home</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div> 
  </div>
		
		<div class="row-fluid">
			<div class="span12">
			  <div class="row-fluid">
				<div class="alert alert-info">
					<a name="contact"></a>
				
				</div><!--/span-->
			  </div><!--/row-->
			</div><!--/span-->
	</div><!--/row-->	
	
		
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
		
		
	<div class="row-fluid">
			<div class="span12">
			  <div class="row-fluid">
				<div class="alert alert-info">
					<a name="contact"></a>
				  <h2>www.andeznet.com</h2>
				  <p class="text-info">Gudang Teknologi & Informasi</p>
				  <p>&copy; <a href="http://andeznet.com">www.andeznet.com</a>&nbsp<?php echo date("Y");?></p>
				</div><!--/span-->
			  </div><!--/row-->
			</div><!--/span-->
	</div><!--/row-->	
	
	</body>
</html>
