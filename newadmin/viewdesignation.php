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
    border: 1px solid rgba(0,0,0,0.2);
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid rgba(0,0,0,0.2); text-align:center;color:#fff;
}
h3{margin-top:0px;}
thead.thbg {
    background: rgba(0,0,0,0.4);
    color: #fff;
    font-weight: normal;
    
}
.table-bordered>thead>tr>th {
    font-weight: normal;
}


.table-striped > tbody > tr:nth-of-type(2n+1) {
   background: rgba(0,0,0,0.1) !important;
}
.table {

 margin-bottom:0px; 
}
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
      <h1>Designation<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Designation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 


	<h3 class="box-title">View Designation</h3>
	<div class="thead">
	 
	 <table class="table table-striped table-bordered">
	  <thead class="thbg">
	<tr>
		  <th  style="width:50px;">#</th>
		  <th  style="width:100px;">Designation</th>
		  <th  style="width:100px;">Login Id</th>
		  <th  style="width:100px;">Phone No</th>
		  <th  style="width:100px;">Email Id</th>
		 
		  
		</tr>
	  </thead>
	  
	</table>
	 
	</div>

<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody>
    
    
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">General Manager</td>
	  <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Senior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Junior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">General Manager</td>
	  <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Senior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Junior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Senior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	<tr>
      <td style="width:58px;">1</td>
      <td style="width:100px;">Junior Assistant Manager</td>
	   <td style="width:100px;">001</td>
	  <td style="width:100px;">3843184341</td>
	  <td style="width:100px;">gm@odishagov.com</td>
	</tr>
	
	
	
	
	
	
  </tbody>
</table>
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
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
