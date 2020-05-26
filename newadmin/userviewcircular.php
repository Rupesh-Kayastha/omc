<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
include("user_logout_chk.php");
if($_COOKIE['usr'])
{
  $user=$_COOKIE["usr"];
}
else
{
  $user=$_SESSION["UsrID"];
}
$sql="SELECT * FROM circular where can_see like '%,$_SESSION[designation],%' or can_see like '%All%'";
$query=$cudb->query($sql) or die(mysqli_error());

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
.alert.alert-success.fade.in.alert-dismissable {
    position: absolute;
    left: 278px;
    background: green;
}
.alert.alert-danger.fade.in.alert-dismissable {
    position: absolute;
    left: 278px;
    background: red;
}
.cir{ width:100%; float:left; background:#fff; height:auto; float:left; padding-bottom: 10px;}
.cirttl {
    width: 100%;
    float: left;
    padding-left: 10px;
    padding: 4px 10px;
    font-size: 20px;
    color: #03A9F4;
    font-weight: bold;
}
.cirdesc {
    width: auto;
    float: left;
    padding-left: 10px;
    padding: 4px 10px;
    font-size: 13px;
    color: #524e4e;
    margin-left: 30px;
}
.cirftr{ float:right; color:#000; background:#eee; margin-right: 10px; border-radius: 20px; padding: 10px;width: auto;}
span.crdt {
    margin-right: 10px;
    color: #ea0b09;
}
span.crauth {
    color: #10af1d; margin-right:10px;
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
        Circullar
     
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Circular</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 
	<h3 class="box-title">View Circular</h3>
	
     
 <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          $i=$i+1; 
        ?>  
 
  
    
   


<div class="cir">
<div style=" width:96%; margin-left:2%; border-bottom:1px solid #eee;">
<div class="cirttl"> <?php echo stripslashes($result->p_name); ?></div>

<div class="cirdesc"><?php echo stripslashes($result->details); ?></div>

<div class="cirftr">
<span class="crdt"> Dt. : 12/03/1984</span>
<span class="crauth">posted By : <?php echo stripslashes($result->contact_person); ?> </span>
<span class="cratt"> <a href='//<?=$_SERVER[HTTP_HOST]?>/newadmin/uploads/<?=$result->image?>' target='blank'>View Attachment</a>   </span>
 </div>
</div>
 </div>
  
   <?php } ?> 
  
    
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
<script src="dist/js/tableFixer.js"></script>




</body>
</html>
