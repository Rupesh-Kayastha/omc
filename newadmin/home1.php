<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skin-blue.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		<style> 

.thead{ width:100%; float:left; text-align:center; text-transform:uppercase;}
.tfx{ width:100%; float:left; height:300px; overflow:auto; font-size:14px;  text-align:center;}
.table-bordered {
    border: 1px solid #c1ceda;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #c1ceda; text-align:center;
}
h3{margin-top:0px;}
thead.thbg {
    background: #2e4458;
    color: #fff;
    font-weight: normal;
    
}
.table-bordered>thead>tr>th {
    font-weight: normal;
}
.table {

 margin-bottom:0px; 
}
table td[class*="col-"]{float: left;}
#container {
	
	height: 400px;
	margin: 0 auto
}
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard  </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php include_once('common.php')?>

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 


		<h3 class="box-title">Latest Updates</h3>
		<div class="col-md-4" style="padding-left: 0px;">
		<table class=" table-fixed"style="width: 100%;">
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#fe2e02;"> 90 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#fe8402;">55 days </td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#ffd800;"> 33 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#bbe62e;">18 days </td>
			</tr>
		</table>
		</div>
		<div class="col-md-4" >
		<table class=" table-fixed"style="width: 100%;">
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#fe2e02;"> 90 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#fe8402;">55 days </td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#ffd800;"> 33 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#bbe62e;">18 days </td>
			</tr>
		</table>
		</div>
		<div class="col-md-4" style="padding-right: 0px;">
		<table class=" table-fixed"style="width: 100%;">
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#fe2e02;"> 90 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#fe8402;">55 days </td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">E-waste</td>
				<td class="col-xs-4"><span style="color:#ffd800;"> 33 days </span></td>
			</tr>
			<tr class="datetimebox1">
				<td class="col-xs-4"> Project1</td>
				<td class="col-xs-4">Environmental</td>
				<td class="col-xs-4"><span style="color:#bbe62e;">18 days </td>
			</tr>
		</table>
		</div>
	
</div>

<div class="main-cnt" style="margin-top:15px;">
	
	<div id="container"></div>
</div>



</div>
 </div>
<!-- /.col -->
</div>
<!-- /.row -->
<!-- Main row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Odishagovt</a>. All rights
    reserved.
  </footer>

 
  

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
	
Highcharts.chart('container', {
chart:{
				backgroundColor: 'transparent',
				color:'#fff'
			},
    title: {
        text: 'Performance Index',
		style: {
                color: '#fff'

            }
    },

    
 xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		labels:
                    {
                        
                        style:
                        {
						color: '#fff'
                        }
                    }
    },
    yAxis: {
		
        title: {
            text: 'Number Of Pending Clearance',
			style: {
                color: '#fff'

            }
        },
		labels:
                    {
                        
                        style:
                        {
						color: '#fff'
                        }
                    }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
		
        series: {
            label: {
                connectorAllowed: false,
				
            }
           
			
        }
    },

    series: [{
        name: 'Pending Conditions',
        data: [43, 52, 57, 69, 77, 81, 93, 99],
		color:'#2b908f'
    },
	{
        name: 'Clearance Conditions',
        data: [11, 17, 16, 19, 20, 24, 32, 39],
		 color: '#90ee7e',
    }],

    responsive: {
        rules: [{
            condition: {
                
            },
			
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
					
					itemStyle: {
            color: '#fff',
            fontWeight: 'bold'
        }
                }
				
            }
        }]
    }

});
</script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
