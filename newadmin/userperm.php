<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
include("logout_chk.php");
$userid=$_GET["userid"];
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
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
      <h1>User<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Permission</li>
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
              <h3 class="box-title">User Permission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
              
                
				<div class="form-group">
             <form>    
          <select class="form-control" name="useridcheck" id="userid" onChange="this.form.submit()">
					<option value="">Choose User</option>
          <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
					<option <?php if($_POST['useridcheck']==$rowp->id) { ?> selected<?php } ?> value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
					<?php } ?>
				  </select>
        </form>
                </div>
<div class="form-group">
          <h3>Restriction</h3>
           <table class="table table-striped table-bordered" style="width:670px;">
             <thead class="thbg">
              <tr>
                
                <th  style="width:100px;">Project Name</th>

                <th colspan="2" style="width:100px;">Action</th>
              </tr>
              <tbody>
              
              <tr>

                <?php 

                 

                $selp="SELECT * FROM projects";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  

                while($rowp=mysqli_fetch_object($rowpr))
                {
                  $pid=$rowp->id;
                  $toupdate=$_POST['useridcheck'];
                 
    $result = "SELECT * FROM user_restrict WHERE pid=$rowp->id AND uid=$toupdate";
                   $qryresultpost=$cudb->query($result);
                   $rowpp=mysqli_fetch_object($qryresultpost);
                   $rowpp->restrict_condition;
                  ?>
                <tr>
                
                  
                <td style="width:100px;"><?php echo $rowp->p_name; ?> </th>
                <input type="hidden" name="pid" id="pid" value="<?php echo $rowp->id ?>">
                   
 <td style="width:100px;"><input type="checkbox" <?php if($rowpp->restrict_condition==1) { ?> checked<?php } ?>  data-pid="<?php echo $rowp->id ?>" class="updateper" name="view" id="view"  style="float: left;"> View</td>

 <td style="width:100px;"><input type="checkbox" <?php if($rowpp->restrict_edit==1) { ?> checked<?php } ?>  data-pid="<?php echo $rowp->id ?>" class="updateperedit" name="edit" id="edit"  style="float: left;"> Edit</td>

                </tr>
                <?php } ?>
              
              </tbody>
           </table>
				</div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               

              </div>
            </form>
          </div>
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

<script type="text/javascript">
  $(function() {
    $('input.updateper').change(function(){
$(this).attr('checked', true); 
$post = $(this); 
var viewid = $(this).is( ':checked' ) ? 1: 0;
var uid = $("#userid").val();
var pid = $(this).attr("data-pid");
$.ajax({
type: "POST",
url: "permission.php",
data: 'item_id='+viewid+'&setperm='+'addperm&pid='+pid+'&uid='+uid,
cache: false,
success: function(response){
//console.log(response);
  
        
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
var uid = $("#userid").val();
var pid = $(this).attr("data-pid");
$.ajax({
type: "POST",
url: "editpermission.php",
data: 'item_id='+viewid+'&setperm='+'addperm&pid='+pid+'&uid='+uid,
cache: false,
success: function(response){
//console.log(response);
  
        
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
