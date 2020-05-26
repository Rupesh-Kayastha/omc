<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$prid=$_GET["prid"];
$clid=$_GET["clid"];
$pid2=$_GET["pid2"];
include("logout_chk.php");
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
}
//$sql="SELECT * FROM clerance";
//$query=$cudb->query($sql) or die(mysql_error());
//$total= mysqli_affected_rows($cudb);
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
      <h1>Clerance<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Clerance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 


	<h3 class="box-title">View Clerance</h3>
    
    <div style="float:right;">
 <?php $selproject="SELECT p_name, id from projects ORDER BY id ASC";
 $resp=$cudb->query($selproject);
 ?>
 <select class="form-control" name="pfilter" id="pfilter" style="width:45%; float:left;margin:10px;">
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
    //echo $prow->id;
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
 <?php
 if($pid2){
  $selcl="SELECT c_name, id from clerance where pid=$pid2 ORDER BY id ASC";
 $resc=$cudb->query($selcl);
 }elseif($prid){
    $selcl="SELECT c_name, id from clerance where pid=$prid ORDER BY id ASC";
 $resc=$cudb->query($selcl);
 }
 ?>
 <select class="form-control" name="cfilter" id="cfilter" style="width:45%; float:left;margin:10px;">
    <option value="">Select clerance</option>
  <?php while($crow=mysqli_fetch_object($resc)) { ?>
  <?php
  
  $val=explode("'",$clid);
    $v1= $val[0];
    echo $v2= $val[1];
     
  ?>
  
 <option value="<?php echo $crow->id; ?>" <?php if($crow->id == $v2){echo "selected";}?>><?php echo $crow->c_name; ?></option>
 <?php } 
 if($clid == ''){
    ?>
      <option value="All">All</option>
<?php
  }
  else if($clid == "'All'")
  {
     
    echo $clid;
    $val=explode("'",$clid);
    $v11= $val[0];
     $v21= $val[1];
   // echo $v21;
    ?>
  <option value="All"<?php if( $v21 == All){echo "selected";}?>>All</option>
  <?php
  }else if($clid != ''){
  ?>
  <option value="All">All</option>
   <?php
  }
  ?>
  
</select>
</div>
	<div class="thead">
	 
	 <table class="table table-striped table-bordered">
	  <thead class="thbg">
	<tr>
		  <th  style="width:43px;">#</th>
		  <th  style="width:103px;">Name Of Clearance</th>
		  <th  style="width:100px;">Project Name</th>
		  
		  <th  style="width:90px;">Action</th>
		  
		</tr>
	  </thead>
	  
	</table>
	 
	</div>

<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody>
    
    <?php
     //loop through the page
     
        
  if($prid && $clid)
  {
    echo 999;
$sql="SELECT * FROM clerance where pid=$prid";
$query=$cudb->query($sql) or die(mysql_error());
$total= mysqli_affected_rows($cudb);
  }
  else if($clid && $pid2)
  {
     
    $clid1=explode("'",$clid);
    $v1= $clid1[0];
     $v2= $clid1[1];
    
    if($v2 == 'All'){
        $sql="SELECT * FROM clerance WHERE  pid=$pid2";
$query=$cudb->query($sql) or die(mysql_error());
$total= mysqli_affected_rows($cudb);
    }else{
    
   $sql="SELECT * FROM clerance WHERE id=$clid and pid=$pid2";
$query=$cudb->query($sql) or die(mysql_error());
$total= mysqli_affected_rows($cudb);
    }
  }
  elseif($clid == '' && $pid2 == '' && $prid == '')
  {
    
  }
  ?>
  <?php
  
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          $cpi=$result->pid;
            
        ?>  

	<tr>
      <td style="width:50px;"><?php echo $i; ?></th>
      <td style="width:100px;"><?php echo $result->c_name; ?></td>
	  <td style="width:100px;"><?php echo GetName('projects','p_name','id', $cpi); ?></td>
      <td style="width:100px;"><a href="addcl.php?clid=<?php echo stripslashes($result->id); ?>"><i class="fa fa-edit"></i></a>  <a class="trash" href="javascript:;" id="<?php echo $result->id; ?>"><i class="fa fa-trash"></i> </a></th>
    </tr>
	
	<?php 
  }
    ?>
	
	
	
	
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

<script>
$( ".trash" ).click(function () {
  var conf = confirm("Are you sure you want to delete this row, This can't be restore!!!!");
    var delp = $(this).attr('id');
    var $ele = $(this).parent().parent();
    if(delp && conf==true) {

        $.ajax({
            url: "delete_cl.php",
            type:'POST',
            data: {'id':delp},
            success: function(data) {
              console.log(data);
                if(data=="YES"){
                    $ele.fadeOut().remove();
                 }else{
                        alert("can't delete the row");
                 }
            }
        });


    }else{
        $("select#changecl").empty();
    }
});

$(document).ready(function() {
$("#pfilter").change(function () {
    var prid = $(this).val();
   window.location.replace("viewcl.php?prid='"+prid+"'");
   
});

$("#cfilter").change(function () {
    var clid = $(this).val();
    var pid2= $("#pfilter").val();
    console.log(pid2);
   window.location.replace("viewcl.php?clid='"+clid+"'"+"&pid2="+pid2);
});
});
</script>



</body>
</html>
