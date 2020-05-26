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
$cid=$_GET['cid'];
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
.clist ul li{list-style: decimal;}
.printbox{display:none;}
@media print
   {
      .main-sidebar{display: none;}
	  .main-header{display: none;}
	  .tfx{height: auto; overflow: inherit;}
	  .main-footer{display: none;}
	  .printbox{display:block;}

	  .table-bordered {
    border: 1px solid rgba(0,0,0,0.2);
}
table{display: none;}
}
.nonprint{display: none;}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid rgba(0,0,0,0.2); text-align:center;color:#fff;
}
   }
   tr.temphide td {
    
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
      <h1><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a> <?php echo GetName('clerance','c_name','id',$cid); ?> </h1>

      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
      <h1 class="text-center"><?php echo GetName('projects','p_name','id',$pid); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="container">
	<div class="row">
		                                <div class="col-md-11">
                                    <!-- Nav tabs --><div class="card">
                                    

                                    <!-- Tab panes -->
                                 
	
	<div class="reportheading">	
	<h2>General Report</h2>
	<div style="float:right;" onclick="myFunction()"><i class="fa fa-print" aria-hidden="true"></i></div>														
	 <table class="table table-striped table-bordered" id="userview_special">
	  <thead>
	<tr>
		  
		  <th>Sl No.</th>
		  <th>Conditions</th>
		  <th>Completed</th>
		  <th>Remark</th>
		  <th>Suggestion from consultant desk</th>
		  <th>Action Taken</th>
		  <th>Timeline</th>
		  <th>Document</th>
		  <th>Updates By</th>   
		</tr>
	  </thead>
  <tbody>
     <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='general' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());

?>
     <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?> 
    
	<tr>
		<?php
															$timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id AND complied IS NOT NULL ORDER BY id DESC LIMIT 1;";
															$querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
															$numrows=mysqli_num_rows($querytimeline);
															
															?>
															<td>&nbsp;<?php echo $i; ?></td>
<?php if($numrows==0) { ?>
<td  rowspan="1">
			
			<?php echo $result->condition_text; ?>
		  
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
<?php } else { ?>
	
<td  rowspan="<?php echo $numrows; ?>" class="wordwrap">
			
			<?php echo $result->condition_text; ?>
		  
		</td>

	<?php } ?>	


                
		
	
															
															<?php
															$k=2;
															while($timelineresult=mysqli_fetch_object($querytimeline))
															{
																$k=$k+1;
																?>

			
		<td>&nbsp;<?php echo $timelineresult->complied; ?></td>
		<td>&nbsp;<?php echo $timelineresult->remark; ?></td>
		<td>&nbsp;<?php echo $timelineresult->suggestion; ?></td>
		<td>&nbsp;<?php echo $timelineresult->action_taken; ?></td>
		<td>&nbsp;<?php echo $timelineresult->timeline; ?> <?php if ($timelineresult->timeline) { ?>days <?php } ?></td>
		<td><img width="100" src="uploads/docupload/<?php echo $timelineresult->docupload; ?>"></td>
		<td>&nbsp;<?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?></td>
		</tr>
										<?php } ?>
    
	<?php } ?>
  </tbody>
</table>


<div class="printbox" style="width:100%; height:auto; float:left; border-bottom:1px solid #dedede; margin-bottom:5px;">
 <?php 
    $sql1="SELECT *
FROM clerance_list WHERE  c_type='general' AND cid=$cid";
$query1=$cudb->query($sql1) or die(mysql_error());

?>
     <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?> 
        <?php
															$timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id AND complied IS NOT NULL ORDER BY id DESC LIMIT 1;";
															$querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
															$numrows=mysqli_num_rows($querytimeline);
															
															?>

	<h4><?php echo $result->condition_text; ?></h4>
	<?php
															$k=2;
															while($timelineresult=mysqli_fetch_object($querytimeline))
															{
																$k=$k+1;
																?>
	<p>
		Completed : <span style="color:#FF0000;"> <?php echo $timelineresult->complied; ?></span><br/>
		Remark : <?php echo $timelineresult->remark; ?><br/>
		Suggestion from consultant desk : <?php echo $timelineresult->suggestion; ?> <br/>
		Action Taken :  <?php echo $timelineresult->action_taken; ?><br/>
		Timeline : <span style="color:#009900;"> <?php echo $timelineresult->timeline; ?> <?php if ($timelineresult->timeline) { ?>days <?php } ?></span><br/>
		Updates By : <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?>
	</p>

<?php } }?>
</div>


</div>




 <div class="reportheading">
 	<h2 class="nonprint">Special Report</h2>
	  <table class="table table-striped table-bordered" id="userview">
	  <thead>
	<tr>
		  
		  <th>Sl No.</th>
		  <th>Conditions</th>
		  <th>Completed</th>
		  <th>Remark</th>
		  <th>Suggestion from consultant desk</th>
		  <th>Action Taken</th>
		  <th>Timeline</th> 
		  <th>Updated By</th>  
		</tr>
	  </thead>
  <tbody>
     <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='special' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());
?>
     <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?> 
    
	<tr>
		<?php
															$timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id AND complied IS NOT NULL ORDER BY id DESC LIMIT 1";
															$querytimeline=$cudb->query($timelinequery) or die(mysql_error());
															$numrows=mysqli_num_rows($querytimeline);
															
															?>
															<td>&nbsp;<?php echo $i; ?></td>
		<?php if($numrows==0) { ?>
<td  rowspan="1" class="wordwrap">
			
			<?php echo $result->condition_text; ?>
		  
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
<?php } else { ?>
<td  rowspan="<?php echo $numrows; ?>" class="wordwrap">
			
			<?php echo $result->condition_text; ?>
		  
		</td>

	<?php } ?>	
	
		
	
															
															<?php
															$k=2;
															while($timelineresult=mysqli_fetch_object($querytimeline))
															{
																$k=$k+1;
																?>
			
		<td>&nbsp;<?php echo $timelineresult->complied; ?></td>
		<td>&nbsp;<?php echo $timelineresult->remark; ?></td>
		<td>&nbsp;<?php echo $timelineresult->suggestion; ?></td>
		<td>&nbsp;<?php echo $timelineresult->action_taken; ?></td>
		<td>&nbsp;<?php echo $timelineresult->timeline; ?> <?php if ($timelineresult->timeline) { ?>days <?php } ?></td>
		<td>&nbsp;<?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?></td>
		</tr>
										<? } ?>
    
	<?php } ?>
  </tbody>
</table>
</div>



<div class="reportheading">
	<h2 class="nonprint">Additional Report</h2>
<table class="table table-striped table-bordered" id="userview_special">
	<tr>
		  <th>Sl No.</th>		  
		  <th>Conditions</th>
		  <th>Completed</th>
		  <th>Remark</th>
		  <th>Suggestion from consultant desk</th>
		  <th>Action Taken</th>
		  <th>Timeline</th>
		  
		</tr>
	  </thead>
  
  <tbody>
    <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='additional' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());
?>
     <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>  
	<tr>
		<td><?php echo $i; ?></td>
		<td  class="clist">
			
			<?php echo $result->condition_text; ?>
		  
		</td>
		<td><?php echo $result->complied; ?></td>
		<td ><?php echo $result->remark; ?></td>
		<td><?php echo $result->suggestion; ?></td>
		<td><?php echo $result->action_taken; ?></td>
		<td><?php echo $result->timeline; ?> <?php if ($result->timeline) { ?>days <?php } ?></td>
    </tr>	
	<?php } ?>
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
<script src="dist/js/tableFixer.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
  $("#userview").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
  $("#userview_special").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>

<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
