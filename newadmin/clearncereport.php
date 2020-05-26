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
$pid=$_GET['pid'];
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


</style>
	<link href="editor.css" type="text/css" rel="stylesheet"/>
	<script type="text/javascript">
		
	</script>
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
      <h1><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a><?php echo GetName('projects','p_name','id',$pid); ?> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	<div class="main-cnt" style="height:300px;"> 
    
		<img src="uploads/<?php echo GetName('projects','image','id',$pid); ?>" style="width:100%; height:100%;"/>
	</div>
<div class="main-cnt" style="margin-top:20px;"> 


	<h3 class="box-title">Clearance List</h3>
	<div class="thead">

		<?php 
    $sql="SELECT * FROM clerance  WHERE pid=$pid";
$query=$cudb->query($sql) or die(mysql_error());
?>

	 <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>  
        <?php if($i==1) { ?>
	<div class="col-md-3" style="padding-left: 0px;">
		<?php } ?>
		<ul class="list">
		     <?php echo $result->c_name; ?>
			  <a href="viewfullreport.php?cid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Complete Status Report</li>
			  <a href="viewfinalreport.php?cid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Final Report</li></a>
		  </ul>
	 <?php if($i==4) { ?>	  
	</div>
	<?php } ?>

	 <?php if($i==4) { ?>
	<div class="col-md-3" style="padding-left: 0px;">
		<?php } ?>

		 <?php if($i==8) { ?>	  
	</div>
	<?php } ?>

   <?php if($i==8) { ?>
  <div class="col-md-3" style="padding-left: 0px;">
    <?php } ?>

     <?php if($i==12) { ?>   
  </div>
  <?php } ?>
	
	<?php } ?>
	
	
		  
		 
		  
		


	 
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
<script src="editor.js"></script>
<script>
	$(document).ready(function() {
		$("#txtEditor").Editor();
	
    $(".list").click(function () {
        $("li", this).slideToggle();
    });
});
</script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
