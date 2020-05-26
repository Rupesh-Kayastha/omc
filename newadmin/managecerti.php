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
$sql="SELECT * FROM certificates";
$query=$cudb->query($sql) or die(mysql_error());
$total= mysqli_affected_rows($cudb);
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
 .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid rgba(0,0,0,0.2); text-align:center;color:#333;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th{color:#fff !important;}
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
      <h1>Certificateas<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Certificateas</li>
		
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt">
<div style="float:right;">
 <?php $selproject="SELECT p_name, id from projects ORDER BY id ASC";
 $resp=$cudb->query($selproject);
 ?>
 <select class="form-control" name="pfilter" id="pfilter" style="width:45%; float:left; margin:10px;">
  <option value="">Select Project</option>
  <?php while($prow=mysqli_fetch_object($resp))
  { ?>
   <option value="<?php echo $prow->id; ?>"><?php echo $prow->p_name; ?></option>
  <?php
  //var_dump($prow);
  if(isset($prid)){
  $val=explode("'",$prid);
    $v1= $val[0];
     $v2= $val[1];
    echo $prow->id;
               ?>
  
 <option value="<?php echo $prow->id; ?>" <?php if($prow->id == $v2){echo "selected";}?>><?php echo $prow->p_name; ?></option>
 <?php
 }
  
  elseif(isset($pid2)){
   
    ?>
     <option value="<?php echo $prow->id; ?>" <?php if($prow->id == $pid2){echo "selected";}?>><?php echo $prow->p_name; ?></option>

    <?php
  }
  }
 ?>
</select>
 <?php $selcl="SELECT c_name, id from clerance ORDER BY id ASC";
 $resc=$cudb->query($selcl);
 ?>
 <select class="form-control" name="cfilter" id="cfilter" style="width:45%; float:left; margin:10px;">
  <?php while($crow=mysqli_fetch_object($resc)) { ?>
  <?php
  
  $val=explode("'",$clid);
    $v1= $val[0];
     $v2= $val[1];
     
  ?>
  
 <option value="<?php echo $crow->id; ?>" <?php if($crow->id == $v2){echo "selected";}?>><?php echo $crow->c_name; ?></option>
 <?php } ?>
</select>
</div>
	<h3 class="box-title">View Certificateas</h3>
	
	<div>
	<div class="thead"> 
	 <table class="table table-striped table-bordered" id='certificate'>
	  <thead>
	<tr>
		  <th width="5%">Sl No</th>
      <th width="20%">Project</th>
      <th width="20%">Clerance</th>
		  <th width="15%">Expiring Date</th>
		  <th width="15%">Reminder</th>
		  <th width="15%">Certificates</th>
		  <th width="10%">Actions</th>
		  
		</tr>
	  </thead>
	  
  </table>
  </div>
  <div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody>
    


 <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;

          $sqlimage="SELECT * FROM certificate_list_images WHERE cfid='$result->id'";
          $query1=$cudb->query($sqlimage) or die(mysqli_error());  
          
        ?>  


<tr>
    <td width="5%"><?php echo $i; ?></td>
    <td width="20.2%"><?php echo GetName('projects','p_name','id', $result->pid); ?></td>
    <td width="20.2%"><?php echo GetName('clerance','c_name','id', $result->cid); ?></td>
    <td width="15.5%"><?php echo date('d-m-y',strtotime(stripslashes($result->exp_date))); ?></td>
    
	  <td width="15%"><?php echo stripslashes($result->set_remind); ?></td>
    <td width="15%">
      <div class="row">
        <div class="col-md-12">
     <?php 
     $j=1;
            while($result1=mysqli_fetch_object($query1))
            {
              $j=$j+1;
        ?>
        
        
          <div class="col-md-6">

            <?php if($result1->file_type=='application/pdf') { ?>

            <a data-toggle="modal" data-target="#myModal<?php echo $i; ?>" href="uploads/certificate/<?php echo $result1->certi_image ?>">Show PDF</a>

            <div id="myModal<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

        <div class="modal-body">
          <embed src="uploads/certificate/<?php echo $result1->certi_image ?>"
                               frameborder="0" width="100%" height="400px">
          
        </div>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  </div>

            <?php } else { ?>

        <a href="#" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"><img src="uploads/certificate/<?php echo $result1->certi_image ?>" width="80" style="border:1px solid #ccc;"></a>
      </div>

      <div id="myModal<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

        <div class="modal-body">
            <img src="uploads/certificate/<?php echo $result1->certi_image ?>">
        </div>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  </div>

  <? } ?>

</div>


        <?php } ?></div>
</div>
    </td>    
	  <td width="10%"><a href="addcertificate.php?certi_id=<?php echo stripslashes($result->id); ?>"><i class="fa fa-edit"></i></a> <a class="trash" href="javascript:;" id="<?php echo $result->id; ?>"><i class="fa fa-trash"></i></a></td>
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

<script>
$( ".trash" ).click(function () {
   var conf = confirm("Are you sure you want to delete this certificate? This can't be reversed");
    var delcs = $(this).attr('id');
    var $ele = $(this).parent().parent();
    if(delcs && conf==true) {
        
        $.ajax({
            url: "delete_certificate.php",
            type:'POST',
            data: {'id':delcs},
            success: function(data) {
              console.log(data);
                if(data=="YES"){
                    $ele.fadeOut().remove();
                 }else{
                        alert("can't delete the row")
                 }
            
          }
        });


    }else{
        $("select#changecl").empty();
    }
});


$( document ).ready(function() {
  $("#certificate").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>



</body>
</html>
