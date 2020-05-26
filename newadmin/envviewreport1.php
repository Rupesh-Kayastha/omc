
<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$lid=$_GET["lid"];
$pid=$_GET["pid"];
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
.alert.alert-success.fade.in.alert-dismissable {
    position: absolute;
    left: 278px;
    background: green;
}
.np {padding: 0px;}
div#field {
    margin-top: 20px;
}
.bgw {background: #fff;}
input#date.wht {
    background: #fff !important;
    color: #000 !important;
}
.form-group {
    margin-bottom: 0px;
}
select#sel1 {
    background: #fff !important;
    color: #000 !important;
}
.ht{    min-height: 765px;}
</style>
		<link href="editor.css" type="text/css" rel="stylesheet"/>
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
      <h1>Environmental Monitoring<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Clearance Conditions</li>
      </ol>
    </section>

    <!-- Main content -->
    

    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt ht"> 
		<div class="hds"> 
  <h3 class="box-title"><?php echo GetName('EnviornmentalManagement', 'ManagementCondtnName', 'EnvManagementId', $_GET['envid']) ?></h3>
  </div>
  
  
  <div class="form-row">
<form method="post" action="#">
		<div class="form-group col-md-2">
      <label for="inputPassword4" class="blc">From</label>
      <input type="date" name="fromdate" required class="form-control wht"  >
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4" class="blc">To</label>
      <input  type="date" name="todate" required class="form-control wht" > 
    </div>
    <div class="form-group col-md-2">
        <label for="inputEmail4" class="blc"></label>
        <input type="submit" name="searchsubmit" value="Submit" class="btn btn-success" >
    </div>
</form>
   <table class="table table-striped table-bordered" id="fugitive" style="background:#747e97;">
    <thead>
    <tr>   
      <th>Slno</th>
      <th>Enviornmental Management Condition</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    </thead>
    
  
  
<?php
if(isset($_POST['searchsubmit']))
{
    $fromdate=date('Y-m-d',strtotime($_POST['fromdate']));
    $todate=date('Y-m-d',strtotime($_POST['todate']));
    $sql1="SELECT * FROM EnvTask where EnvManagementId=$_GET[envid] and Date Between '$fromdate' and '$todate'";
}
else
{
    $sql1="SELECT * FROM EnvTask where EnvManagementId=$_GET[envid]";
}

$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
    <td><?=$i;?></td>
<td><?php echo GetName('EnviornmentalManagement', 'ManagementCondtnName', 'EnvManagementId', $result1->EnvManagementId) ?></td>
<td><?php echo $result1->Date; ?></td>
<td><?php echo $result1->Status; ?></td>
   </tr>
 <?php } ?>
 </div> 
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
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
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/tableFixer.js"></script>
<script>

    
    $( document ).ready(function() {
  $("#fugitive").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>

<style>
.table-striped > tbody > tr:nth-of-type(2n+1) {
    background: #5f6a88 !important;
}
 </style>
</body>
</html>
