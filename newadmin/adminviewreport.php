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
        Dashboard<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    

   
       <!-- Info boxes -->
<div class="row">
<?php 
    $sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysql_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>  
      <?php if($i==1) {  ?>
<div classs="col-md-12"  style="padding:15px;">
      <?php } ?>
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="pdfreport.php?pid=<?php echo $result->id; ?>">
          <div class="info-box">
            <span class="info-box-icon <?php if($i==1) { ?>bg-aqua<?php } ?><?php if($i==2) { ?>bg-red<?php } ?><?php if($i==3) { ?>bg-green<?php } ?> <?php if($i==4) { ?>bg-yellow<?php } ?><?php if($i==5) { ?>bg-aqua<?php } ?><?php if($i==6) { ?>bg-red<?php } ?><?php if($i==7) { ?>bg-green<?php } ?> <?php if($i==8) { ?>bg-yellow<?php } ?>"><i class="fa fa-tasks" style="font-size:20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $result->p_name; ?></span>
              <span class="info-box-number"><small><span style="color:#bbe62e;"><?php echo $result->location; ?></span></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
</div>
          
        <?php if($i==4) {  ?>
</div>
      <?php } ?>
      <?php if($i==4) {  ?>
<div classs="col-md-12"  style="padding:15px;">
      <?php } ?>

       <?php if($i==8) {  ?>
</div>
      <?php } ?>

      <?php if($i==8) {  ?>
<div classs="col-md-12"  style="padding:15px;">
      <?php } ?>

         <?php if($i==12) {  ?>
</div>
      <?php } ?>

      
        <?php $i+1;} ?>
      </div>


      <!-- /.row -->



       
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
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
