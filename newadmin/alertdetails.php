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
.clrhed{    width: 98%;
    height: 20px;
    float: left;
    font-size: 13px;
    font-weight: bold;
    color: #f7921e;
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

  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar.php')?>

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
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="main-cnt" style="height:300px; display:none;"> 
					<a href="env_monitoring_admin.php?pid=<?php echo $pid; ?>" class="btn btn-primary" style="position: absolute; right: 20px;">Environmental Monitoring</a>
					<img src="uploads/<?php echo GetName('projects','image','id',$pid); ?>" style="width:100%; height:100%;"/>
				</div>
				<div class="main-cnt"> 
					<h3 class="box-title">Clearance List for  <?php echo GetName('projects','p_name','id',$pid); ?> </h3>
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
						$totalcondtn=$cudb->query("SELECT count(*) as total FROM condition_timeline ct,clerance_list cl WHERE ct.timeline_id=cl.id and cl.cid=$result->id and ct.complied IS NOT NULL");
						$totalres=mysqli_fetch_object($totalcondtn);
						
						$totalcomplete=$cudb->query("SELECT count(*) as total FROM condition_timeline ct,clerance_list cl WHERE ct.timeline_id=cl.id and cl.cid=$result->id and ct.complied='Complied'");
						$totalrescom=mysqli_fetch_object($totalcomplete);
						
						$percent=$totalrescom->total/$totalres->total*100;
						?>  

							<div style="width:24%; height:150px; background:#fff; float:left; text-align:center; margin-right:1%; margin-bottom:10px; border: 1px solid #ccc;
    padding-top: 10px;">
								<div style="width:100%; height:70px; float:left;">
									<div style="width:100%; height:50px; float:left;">
										<img src="uploads/img.jpg" style="width:40px; height:auto;"/>
									</div>
									<div class="clrhed">
										<?php echo $result->c_name; ?>
									</div>
								</div>
								<div style="width:100%; height:auto; float:left; margin-top:10px;">
									
								
									<div style="width:33%; height:auto; margin:auto; text-align:center;">
										<div style="width:100%; height:auto; float:left;">
											<img src="dist/img/setalert.png" style="height:37px; width:auto;"/>
										</div>
										<div style="width:100%; height:30px; float:left;">
											<a href="setalert.php?cid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>">
												Set Alert
											</a>
										</div>
									</div>
								
									
								</div>
							</div>							
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





<!-- environment monitoring data -->
<section class="content">     
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class=" main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
<div class="col-md-12">
 <?php $sql="SELECT * FROM env_monitor";        
$query=$cudb->query($sql) or die(mysql_error());
?>
<?php
     //loop through the page
      $i=0;
        while($result=mysqli_fetch_object($query))
            {          
          $i=$i+1;
        ?>  
	<div class="col-md-2" style="">
		<div style="background:#fff; border-radius:5px;height:100px;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888; text-align:center; padding-bottom:10px; margin-bottom:10px;">
		<h4 style="background:#659949 ;color:#fff; height:35px; padding:6px; font-size:13px; margin-bottom:15px;"><?php echo $result->env_names; ?></h4>
		<a href="addlocation.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="font-size:11px;" >
		<div class="col-md-6" style="padding:0px;">
			<img src="dist/img/addlocation.png" style="height:25px;"/><br/>
			Add Location
		</div>
		</a>
		<a href="viewreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="font-size:11px;" > 
		<div class="col-md-6" style="padding:0px;">
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
			  <a href="viewreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">View Report</li></a>
        
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
			  <a href="viewreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">View Report</li></a>
        
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
			  <a href="viewreport.php?lid=<?php echo $result->id; ?>&pid=<?php echo $pid; ?>" style="color: #fff;"> <li style="display:none;">View Report</li></a>
        
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
