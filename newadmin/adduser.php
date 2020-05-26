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
if($userid)
{
$selquery="SELECT id, `password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM admin WHERE id='$userid'";
  $qryresult=$cudb->query($selquery);
  $selrow=mysqli_fetch_object($qryresult);
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
if($userid)
{
$selquery="SELECT id,username,user_type, `password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM admin WHERE id='$userid'";
  $qryresult=$cudb->query($selquery);
  $selrow=mysqli_fetch_object($qryresult);

$date = date('Y-m-d');   
$upproject="UPDATE admin SET fullname='$fullname', username='$username', level='$level', password=AES_ENCRYPT('$password',SHA1('aalizzwell')), phone='$phone', address='$address', designation='$designation', otherdetails='$otherdetails', user_parent='$user_parent', submit_date='$date' WHERE id='$userid'";  
$upres=$cudb->query($upproject) or die(mysqli_error());
 echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> User Details Edited sucessfully....
</div>";
}
else
{
$date = date('Y-m-d');
$selquery="SELECT * FROM admin WHERE email='$email'";
$qryresult=$cudb->query($selquery);
$count=mysqli_num_rows($qryresult);

if ($count==1 )
{
   echo "<div class='alert alert-danger fade in alert-dismissable'>
  <strong>Error!</strong>Email Exist Please enter another one....
</div>";

}
else
{
$insuser="INSERT INTO admin SET fullname='$fullname', username='$username', level='$level', password=AES_ENCRYPT('$password',SHA1('aalizzwell')), phone='$phone', email='$email', address='$address', designation='$designation', otherdetails='$otherdetails', user_type='user', user_parent='$user_parent', submit_date='$date'";
   $res=$cudb->query($insuser) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong>User Created Successfully....
</div>";
}
}
}

if($userid) {

$sqlpr="SELECT * FROM admin WHERE id='$userid'";
$query=$cudb->query($sqlpr) or die(mysqli_error());
$resultp= mysqli_fetch_object($query);

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
        <li class="active">Add User</li>
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
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
              <div class="form-group">
                 
                  <input type="text" value="<?php echo $resultp->fullname; ?>" class="form-control" name="fullname" id="exampleInputEmail1" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                 
                  <input type="text" value="<?php echo $resultp->username; ?>"  class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter User Name">
                </div>
                <div class="form-group">
                 
                  <input type="password" class="form-control" value="<?php echo $selrow->passd; ?>" name="password" id="exampleInputEmail1" placeholder="Enter Password">
                </div>

        <div class="form-group">
                 
          <select class="form-control" name="level" id="exampleInputEmail1">
          <option value="">Choose Level</option>
          <option value="1" <?php if($resultp->level=='1') { ?>selected<? }?>>Level 1</option>
          <option value="2" <?php if($resultp->level=='2') { ?>selected<? }?>>Level 2</option>
          <option value="3" <?php if($resultp->level=='3') { ?>selected<? }?>>Level 3</option>
         
          </select>
                </div>
        
                
				<div class="form-group">
                 
          <select class="form-control" name="designation" id="exampleInputEmail1">
					<option value="">Choose Designation</option>
					<option value="General Manager" <?php if($resultp->designation=='General Manager') { ?>selected<? }?>>General Manager</option>
					<option value="Manager" <?php if($resultp->designation=='Manager') { ?>selected<? }?>>Manager</option>
					<option value="Senior Assistant Manager" <?php if($resultp->designation=='Senior Assistant Manager') { ?> selected<? } ?>>Senior Assistant Manager</option>
					<option value="Junior Assistant Manager" <?php if($resultp->designation=='Junior Assistant Manager') { ?>selected<? }?>>Junior Assistant Manager</option>
          <option value="Regional Manager" <?php if($resultp->designation=='Regional Manager') { ?>selected<? }?>>Regional Manager</option>
          <option value="Mines Manager" <?php if($resultp->designation=='Mines Manager') { ?>selected<? }?>>Mines Manager</option>
          <option value="EMC Incharge" <?php if($resultp->designation=='EMC Incharge') { ?>selected<? }?>>EMC Incharge</option>
				  </select>
                </div>

                <div class="form-group">
                 
          <select class="form-control" name="user_parent" id="exampleInputEmail1">
					<option value="">Choose Parent</option>
					<option value="OMC" <?php if($resultp->user_parent=='OMC') { ?>selected<? }?>>OMC</option>
					<option value="Consultancy" <?php if($resultp->user_parent=='Consultancy') { ?>selected<? }?>>Consultancy</option>
					
				  </select>
                </div>
				
				
				<div class="form-group">
                 <input type="number" value="<?php echo $resultp->phone; ?>" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Phone No">
                </div>
				<div class="form-group">
                 <input type="email" value="<?php echo $resultp->email; ?>" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email Id" <?php if($userid) { ?>readonly <? } ?>>
                </div>
				<div class="form-group">
                 <input type="text" value="<?php echo $resultp->address; ?>" class="form-control" name="address" id="exampleInputEmail1" placeholder="Enter Address">
                </div>
				<div class="form-group">
				  <input type="text" value="<?php echo $resultp->otherdetails; ?>" class="form-control" name="otherdetails" id="exampleInputEmail1" placeholder="Enter Other Details">
                  
                </div>
				<?php /*?><div class="form-group">
					<h3>Restriction</h3>
					 <table class="table table-striped table-bordered" style="width:400px;">
						 <thead class="thbg">
							<tr>
								
								<th  style="width:100px;">Project Name</th>
								<th colspan="2" style="width:100px;">Action</th>
							</tr>
							<tbody>
							<tr>
								<td style="width:100px;">Project1</th>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> Edit</td>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> View</td>
							</tr>
							<tr>
								<td style="width:100px;">Project2</th>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> Edit</td>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> View</td>
							</tr>
							<tr>
								<td style="width:100px;">Project3</th>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> Edit</td>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> View</td>
							</tr>
							<tr>
								<td style="width:100px;">Project4</th>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> Edit</td>
								<td style="width:100px;"><input type="checkbox" style="float: left;"> View</td>
							</tr>
							</tbody>
					 </table>
				</div><?php */?>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($userid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>

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





</body>
</html>
