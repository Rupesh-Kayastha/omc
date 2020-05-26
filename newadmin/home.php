<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
include("logout_chk.php");
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
}
?>
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
 .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid rgba(0,0,0,0.2); text-align:center;color:#333;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th{color:#fff !important;}
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
.info-box{   background:#fff; min-height:40px !important;}
.info-box-text{color:#333;}
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="background:#efefef;"> 
	
    

   
       <?php include_once('common.php')?>
       

      
      <div class="col-md-12">
  
<div class="main-cnt" style=" background:#edeff0;"> 
<h3 class="box-title" style="padding-left:15px;">Project Statics</h3>

    <?php $numbprj="SELECT * FROM projects";
    $numquery=$cudb->query($numbprj) or die(mysqli_error());
    ?>
    
<?php
     //loop through the page
        while($resultprj=mysqli_fetch_object($numquery))
            {
        ?> 
        <div class="col-md-3">
			<div style="width:100%; float:left; background:#fff;box-shadow: 0px -1px 2px 2px rgba(0, 0, 0, 0.06); margin-bottom:15px; height:115px;color:#fff;"> 
			  <h2 style="margin-top:0px; padding-top:5px;
background: #bfd255;
background: -moz-linear-gradient(top, #bfd255 0%, #8eb92a 8%, #9ecb2d 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #bfd255 0%,#8eb92a 8%,#9ecb2d 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #bfd255 0%,#8eb92a 8%,#9ecb2d 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bfd255', endColorstr='#9ecb2d',GradientType=0 ); /* IE6-9 */ height:30px; text-shadow:1px 1px 1px #333; font-size:16px; text-align:center;"><?php echo $resultprj->p_name; ?></h2>
		
			  <h3 style="text-align:center; color:#ff7907; width:33%; float:left;"><span style=" font-size:20px;">
       
 <?php $uquery="SELECT COUNT(*) AS counttotal FROM clerance WHERE pid=$resultprj->id";
  $uresult=$cudb->query($uquery);
  $totrow=mysqli_fetch_object($uresult);
  echo $totrow->counttotal;
  ?>


        </span><br /> <span style="font-size:14px;">Clerance</span></h3>
			  <h3 style="text-align:center; color:#333; width:33%; float:left;"><span style=" font-size:20px; "><?php $uquery1="SELECT COUNT(*) AS counttotal1 FROM clerance_list WHERE pid=$resultprj->id";
  $uresult1=$cudb->query($uquery1);
  $totrow1=mysqli_fetch_object($uresult1);
  echo $totrow1->counttotal1;
  ?></span><br /> <span style="font-size:14px;">Condition</span></h3>
  			<h3 style="text-align:center; color:#9ecb2d; width:33%; float:left;"><span style=" font-size:20px; ">50</span><br /><span style="font-size:14px;">Completed</span>
			 </div>
        </div>

      <?php } ?>
  
</div>

<div class="main-cnt hide" style="margin-top:15px;">
  
  <div id="container"> </div>
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
    <div class="pull-right hidden-xs" style="display:none;">
      
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
        color:'#333'
      },
    title: {
        text: 'Performance Index',
    style: {
                color: '#333'

            }
    },

    
 xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels:
                    {
                        
                        style:
                        {
            color: '#333'
                        }
                    }
    },
    yAxis: {
    
        title: {
            text: 'Number Of Pending Clearance',
      style: {
                color: '#333'

            }
        },
    labels:
                    {
                        
                        style:
                        {
            color: '#333'
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
            color: '#333',
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
