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
$pid=$_GET['pid'];

if(isset($_REQUEST['submit']))

{

if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      //print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      $$var = addslashes($valu);
    }
  }
$date = date('Y-m-d');

$cof=$_POST['co'];
$entrydatef=$_POST['entrydate'];
$pm10f=$_POST['pm10'];
$pm25f=$_POST['pm25'];
$so2f=$_POST['so2'];
$noxf=$_POST['nox'];
for($i=0; $i < count($cof); $i++ ) {
$co = addslashes($cof[$i]);
$entrydate = addslashes($entrydatef[$i]);
$pm10 = addslashes($pm10f[$i]);
$pm25 = addslashes($pm25f[$i]);
$so2 = addslashes($so2f[$i]);
$nox = addslashes($noxf[$i]);

$inscllist="INSERT INTO monitoring_list SET env_id='1', date_entry='$entrydate', pm10='$pm10', pm25='$pm25', so2='$so2', nox='$nox', co='$co'";
  $res=$cudb->query($inscllist) or die(mysql_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
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
</style>
		<link href="editor.css" type="text/css" rel="stylesheet"/>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header1.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Environmental Monitoring<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Clearance Conditions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
<div class="col-md-12">

            <?php
            if($pid == 18)
            {
    $sql="SELECT * FROM env_monitor1";
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
         <?php echo $result->env_names; ?>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Report</li></a>
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
  
  <?php }
            }
             elseif($pid == 19)
            {
    $sql="SELECT * FROM env_monitor2";
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
         <?php echo $result->env_names; ?>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Report</li></a>
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
  
  <?php }
            }
            else{
                $sql="SELECT * FROM env_monitor";
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
         <?php echo $result->env_names; ?>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Report</li></a>
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
  
  <?php }
            }?>
            
          </div>  
              <!-- /.box-body -->

        
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
<script>
	$(document).ready(function() {
    $(".list").click(function () {
        $("li", this).slideToggle();
    });
});
</script>

</body>
</html>
