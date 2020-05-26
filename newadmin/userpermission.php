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
$sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysqli_error());
$total= mysqli_affected_rows($cudb);

if($_REQUEST['Delete'] != '')
{
    if(!empty($_REQUEST['checkboxstatus'])) {
        $checked_values = $_REQUEST['checkboxstatus'];
        foreach($checked_values as $val) {
            $sqldel = "DELETE from projects WHERE id = '$val'";
            $query1=$cudb->query($sqldel) or die(mysqli_error());
            
        }
		
		
        echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong>Selected Projects Deleted Successfully....
</div>";


    }
    else

      {
        echo "<script>
		
        alert('Select At least One Checkbox');
        </script>";
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
@media print
   {
      .main-sidebar{display: none;}
    .main-header{display: none;}
    .tfx{height: auto; overflow: inherit;}
    .main-footer{display: none;}
    
}
.nonprint{display: none;}
.userperm td{padding: 5px;}
.userperm th{padding: 5px; font-weight: bold;}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
  <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;z-index: 99999;"><img src='dist/img/demo_wait.gif' width="64" height="64" /><br>Loading..</div>
<div class="wrapper">
  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        Projects
        <h1><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a> <?php echo GetName('projects','p_name','id',$pid); ?> </h1>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">



	
<div class="main-cnt"> 


 <?php $userlist="SELECT * from admin"; 
$seluser=$cudb->query($userlist);
?>
 <table style="width:100%" border="1" cellspacing="2"  cellpadding="5" class="userperm">
  <tr>
    <th>User Name:</th>
    <th>Project Name</th>
    <th>Status</th>
  </tr>
<?php while($row=mysqli_fetch_object($seluser))
{ ?>
  <form name="user_set_perm" method="post">
  <tr>
    <td rowspan="9"><?php echo $row->username; ?></td>
  </tr>
  <?php $prjlist="SELECT * from projects"; 
    $selprj=$cudb->query($prjlist);
?>  
<?php while($rowp=mysqli_fetch_object($selprj))
{ 
$pid=$rowp->id;
$toupdate=$_POST['useridcheck'];
$result = "SELECT * FROM user_set_permission WHERE pid=$rowp->id AND uid=$row->id";
                   $qryresultpost=$cudb->query($result);
                   $rowpp=mysqli_fetch_object($qryresultpost);
                   $rowpp->restrict_condition;

  ?>
 <tr>
    <td><?php echo $rowp->p_name; ?></td>
    <td><label>&nbsp;View &nbsp;</label><input <?php if($rowpp->view==1) { ?> checked <?php } ?> type="checkbox" data-pid="<?php echo $rowp->id ?>" data-uid="<?php echo $row->id ?>" class="updateper" name="view" id="view"><label>&nbsp;Edit &nbsp;</label><input <?php if($rowpp->edit==1) { ?> checked <?php } ?> type="checkbox" data-pid="<?php echo $rowp->id ?>" data-uid="<?php echo $row->id ?>" class="updateperedit" name="edit" id="edit"><label>&nbsp;Change status &nbsp;</label><input <?php if($rowpp->change_status==1) { ?> checked <?php } ?> type="checkbox" data-pid="<?php echo $rowp->id ?>" data-uid="<?php echo $row->id ?>" class="updateperstat" name="change_status" id="change_status"></td>
  </tr>
 <? } ?> 
 </form>
<?php } ?>


</table>
</div>
 </div>
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
$(function() {
$('input.updateper').change(function(){
$(this).attr('checked', true); 
$post = $(this); 
var viewid = $(this).is( ':checked' ) ? 1: 0;
var uid = $(this).attr("data-uid");
var pid = $(this).attr("data-pid");
$.ajax({
type: "POST",
url: "view_set.php",
data: 'item_id='+viewid+'&setperm='+'addperm&pid='+pid+'&uid='+uid,
cache: false,
success: function(response){

}
});
return false;
});
});

</script>

<script type="text/javascript">
$(function() {
$('input.updateperedit').change(function(){
$(this).attr('checked', true); 
$post = $(this); 
var viewid = $(this).is( ':checked' ) ? 1: 0;
var uid = $(this).attr("data-uid");
var pid = $(this).attr("data-pid");
$.ajax({
type: "POST",
url: "edit_set.php",
data: 'item_id='+viewid+'&setperm='+'addperm&pid='+pid+'&uid='+uid,
cache: false,
success: function(response){

}
});
return false;
});
});

</script>

<script type="text/javascript">
$(function() {
$('input.updateperstat').change(function(){
$(this).attr('checked', true); 
$post = $(this); 
var viewid = $(this).is( ':checked' ) ? 1: 0;
var uid = $(this).attr("data-uid");
var pid = $(this).attr("data-pid");
$.ajax({
type: "POST",
url: "status_set.php",
data: 'item_id='+viewid+'&setperm='+'addperm&pid='+pid+'&uid='+uid,
cache: false,
success: function(response){

}
});
return false;
});
});

</script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
});
</script>

</body>
</html>
