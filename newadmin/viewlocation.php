<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$lid=$_GET["lid"];
$pid=$_GET["pid"];
$locationid=$_GET["locationid"];
include("user_logout_chk.php");
if($_COOKIE['usr'])
{
  $user=$_COOKIE["usr"];
}
else
{
  $user=$_SESSION["UsrID"];
}

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
if($locationid)
{
$uploc="UPDATE location SET location='$location', station_code='$station_code', `latitude`='$latitude', longitude='$longitude', eid='$lid', pid='$pid' WHERE id='$locationid'";  
$upres=$cudb->query($uploc) or die(mysqli_error());
 echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Location Edited sucessfully....
</div>";
}
else
{
$inslocation="INSERT INTO location SET location='$location', station_code='$station_code', `latitude`='$latitude', longitude='$longitude', eid='$lid', pid='$pid'";
   $res=$cudb->query($inslocation) or die(mysql_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Location Added sucessfully....
</div>";
}
}


$sqlpr="SELECT * FROM location WHERE id='$locationid'";
$query=$cudb->query($sqlpr) or die(mysql_error());
$resultp= mysqli_fetch_object($query);

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
table#location th {
    background: #423e3d;
}
.table > tbody > tr > td {
    vertical-align: middle !important;
    color: #000;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('userheader.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Locations<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Locations</li>
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
<span><a href="javascript:history.back();" class="btn btn-primary">Go Back</a></span>&nbsp;
<h3 class="box-title">Add locations for <?php echo GetName('env_monitor','env_names','id', $lid); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
          </div>
          <!-- /.box -->
<div class="main-cnt">
	<h3 class="box-title">Location List Of <?php echo GetName('env_monitor','env_names','id', $lid); ?></h3>
	<div>
	 
	 <table class="table table-striped table-bordered blc" id='location'>
	  <thead>
	<tr>
		  <th>Sl No</th>
    <th>Location</th>
    <th>Station Code</th>
		  <th>Latitude</th>
		  <th>Longitude</th>
		  <th>Actions</th>
		</tr>
	  </thead>
	  
  
  <tbody style="color:#000;">
    
    
 <?php
     //loop through the page
     $sell="SELECT * FROM location WHERE eid='$lid' AND pid='$pid'";
     $query=$cudb->query($sell) or die(mysqli_error());  
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;

          
          
        ?>  


<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $result->location ?></td>
    <td><?php echo $result->station_code ?></td>
    <td><?php echo $result->latitude ?></td>
	  <td><?php echo  $result->longitude ?></td>
    
	  <td><a href="addlocation.php?lid=<?php echo $lid; ?>&locationid=<?php echo stripslashes($result->id); ?>&pid=<?php echo $pid; ?>"><i class="fa fa-edit"></i></a><a class="trash" href="javascript:;" id="<?php echo $result->id; ?>"><i class="fa fa-trash"></i></a></td>
    </tr>

    <?php } ?>

  </tbody>
</table>
</div>


</div>
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
<!-- Bootstrap validation -->
<script src="dist/js/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/tableFixer.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
			$( "#location" ).validate({
			});
   
   });
 $( document ).ready(function() {
  $("#location").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>


<script>
$( ".trash" ).click(function () {
   var conf = confirm("Are you sure you want to delete this row, This can't be restore!!!!");
   var delp = $(this).attr('id');
   var $ele = $(this).parent().parent();
   if(delp && conf==true) {  
        $.ajax({
            url: "delete_location.php",
            type:'POST',
            data: {'id':delp},
            success: function(data) {
              console.log(data);
                if(data=="YES"){
                    $ele.fadeOut().remove();
                 } else {
                        alert("can't delete the row");
                 }
            
          }
        });
    }else{
        $("select#changecl").empty();
    }
});
</script>

<script src="dist/js/custom.js"></script>

</body>
</html>
