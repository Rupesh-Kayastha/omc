<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$pid=$_GET["pid"];
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
.clrhed{    width: 98%;
    height: 20px;
    float: left;
    font-size: 13px;
    font-weight: 600;
    color: #9ecb2d ;
    border-bottom: 1px solid #ccc;
    margin-left: 1%;
    margin-right: 1%;}

</style>
  <link href="editor.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript">
    
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">
  <?php include_once('userheader.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="display:none;">
      <h1><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a> <?php echo GetName('projects','p_name','id',$pid); ?> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>
    <!-- Main content -->
<!-- environment monitoring data -->
<section class="content">     
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class=" main-cnt">
            
              <h3 class="box-title">Monitoring List</h3>
            
            <!-- /.box-header -->
            <!-- form start -->
<div class="col-md-12" style="padding:0px;">
 <?php $sql="SELECT * FROM env_monitor where status=0 order by priority asc";    
$query=$cudb->query($sql) or die(mysql_error());
?>
<?php
     //loop through the page
      $i=0;
        while($result=mysqli_fetch_object($query))
            {          
          $i=$i+1;
        ?>  
  <div class="col-md-3" style="padding-left:0px;">
    <div style="background:#fff; border-radius:5px;height:100px;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888; text-align:center; padding-bottom:10px; margin-bottom:10px;">
		<h4 style="background: #3e9806;color:#fff; height:35px; padding:6px; font-size:13px; margin-bottom:15px;"><?php echo $result->env_names; ?></h4>
    <a href="viewlocation.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="font-size:11px;" >
    <div class="col-md-4" style="padding:0px;">
      <img src="dist/img/addlocation.png" style="height:25px;"/><br/>
      View Location
    </div>
    </a>
    <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="font-size:11px;" > 
    <div class="col-md-4" style="padding:0px;">
      <img src="dist/img/addicon.svg" style="height:25px;"/><br/>
      Add Report
    </div>
    </a>
					<a href="viewreport1.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="font-size:11px;" >
    <div class="col-md-4" style="padding:0px;">
      <img src="dist/img/viewreport.png" style="height:25px;"/><br/>
      View Report
    </div>
    </a>
    </div>
  </div>
  
  <?php } ?>
</div>
<div class="col-md-12" style="display:none;">
            <?php
      if($pid == 18)
            {
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
     <a href="addlocation.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Location</li></li>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">Add Report</li></a>
        
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
  <?php if($i==12) { ?>
  <div class="col-md-3" style="padding-left: 0px;">
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
     <a href="addlocation.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Location</li></li>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">Add Report</li></a>
        
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
     <a href="addlocation.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"><li style="display:none;">Add Location</li></li>
        <a href="addreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">Add Report</li></a>
        
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
  ?>
  
          </div>  
              <!-- /.box-body -->

        
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>

  
<!-- end of environment monitoring data -->

<!-- start of environmental management data -->
<section class="content">     
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class=" main-cnt">
           
              <h3 class="box-title">Enviornmental Management List</h3>
         
            <!-- /.box-header -->
            <!-- form start -->
															<div class="col-md-12" style="padding:0px;">
																<?php
																$seluser='|'.$user.'|';
																$sql="SELECT * FROM EnviornmentalManagement where `SiteId`='$_GET[pid]' and Responsibility like '%$seluser'";
															$query=$cudb->query($sql) or die(mysql_error());
															?>
															<?php
																				//loop through the page
																					$i=0;
																							while($result=mysqli_fetch_object($query))
																											{
																									$i=$i+1;
																							?>  
																<div class="col-md-2" style="padding-left:0px;">
																	<div style="background:#fff; border-radius:5px;height:100px;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888; text-align:center; padding-bottom:10px; margin-bottom:10px;">
		<h4 style="background: #bfd255;
background: -moz-linear-gradient(top, #bfd255 0%, #8eb92a 8%, #9ecb2d 100%);
background: -webkit-linear-gradient(top, #bfd255 0%,#8eb92a 8%,#9ecb2d 100%);
background: linear-gradient(to bottom, #bfd255 0%,#8eb92a 8%,#9ecb2d 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bfd255', endColorstr='#9ecb2d',GradientType=0 );color:#fff; height:35px; padding:6px; font-size:13px; margin-bottom:15px;"><?php echo $result->ManagementCondtnName; ?></h4>
																							<div class="col-md-6" style="padding:0px;">
																								<a href="addenvtask.php?envid=<?=$result->EnvManagementId;?>">
																									Add
																								</a>
																								<br/>
																									<?=$result->Frequency;?>
																							</div>
																						
																	<a href="envviewreport.php?envid=<?php echo $result->EnvManagementId; ?>" style="font-size:11px;" > 
																	<div class="col-md-6" style="padding:0px;">
																		<img src="dist/img/viewreport.png" style="height:25px;"/><br/>
																		View Report
																	</div>
																	</a>
																	</div>
																</div>
																
																<?php } ?>
															</div>
										</div>
								</div>
							</div>
</section>
<!-- end of environmental management data -->

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


<script src="dist/js/custom.js"></script>




</body>
</html>
