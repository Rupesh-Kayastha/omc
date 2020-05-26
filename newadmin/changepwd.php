<?php
ini_set('display_errors',1);
include("connect.php");
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
}

if(isset($_REQUEST['submit']))
{

  if(is_array($_REQUEST))
  {
    foreach($_REQUEST as $var=>$valu)
    {
      $$var = addslashes($valu);
    }
  }
  
  if($_SESSION["UsrID"]!='')
  {
    if($newpwd!=$confpwd)
    {
        echo "<script>alert('New Password & Confirm Password should be match.');
              </script>";
    }
    else
    {
        $updatepwd="UPDATE admin SET password=AES_ENCRYPT('$newpwd',SHA1('aalizzwell')) WHERE id='$_SESSION[UsrID]'";  
        $upres=$cudb->query($updatepwd) or die(mysqli_error());
        echo "<div class='alert alert-success fade in alert-dismissable'>
       <strong>Success!</strong> Password Changed sucessfully....
       </div>";
    }
    
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
  <link rel="stylesheet" href="dist/css/parsley.css">
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
.whitebg {
    width: 100%;
    float: left;
    background: #fff;
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
        Projects
       <a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
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
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="whitebg"> 
                <form role="form" method="post" name="project"  enctype="multipart/form-data" data-parsley-validate="">
                  <div class="box-body">
                    <div class="col-md-6" style="padding-left: 0px;">
                      <div class="form-group">
                       <input type="password" class="form-control" name="newpwd" required=required placeholder="Enter New Password" required> 
                      </div>
                      <div class="form-group">
                       <input type="password" class="form-control" name="confpwd" required=required placeholder="Enter Confirm Password" required> 
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button tabindex="10" type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
			</div>
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

<script src="dist/js/custom.js"></script>

<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>
<!-- Bootstrap validation -->
<script src="dist/js/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/parsley.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
			$( "#projects" ).validate({
    rules: {
    phone: {
      required: true,
    }
  }
			});
   });
</script>


</body>
</html>
