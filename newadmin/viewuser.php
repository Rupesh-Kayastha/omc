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

$sql="SELECT * FROM admin";
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
      <h1>User<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 


	<h3 class="box-title">
  View User
  <a href="export.php">
   <button tabindex="10" type="submit" name="submit" class="btn btn-primary" style="float:right;margin-bottom:5px;"> Export as pdf </button>
  </a>
 </h3>
	<div class="thead">
	 
	 <table class="table table-striped table-bordered">
	  <thead class="thbg">
	<tr>
		  <th style="width:10px;">#</th>
		  <th style="width:80px;">User Name</th>
		  <th style="width:80px;">Designation</th>
		  <th style="width:80px;">Phone No</th>
		  <th style="width:200px;">Email Id</th>
		  <th style="width:80px;">Address</th>
		  <th style="width:80px;">Level</th>
		  <th style="width:80px;">Action</th>
		  
		</tr>
	  </thead>
	  <tbody>
    
    <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>  

	<tr>
      <td style="width:10px;"><?php echo $i; ?></th>
      <td style="width:80px;"><?php echo $result->username; ?></td>
      <td style="width:80px;"><?php echo $result->designation; ?></td>
	  <td style="width:80px;"><?php echo $result->phone; ?></td>
	  <td style="width:200px;"><?php echo $result->email; ?></td>
	  <td style="width:80px;"><?php echo $result->address; ?></td>
	  <td style="width:80px;"><?php echo $result->level; ?></td>
    <td style="width:80px;"><a href="adduser.php?userid=<?php echo stripslashes($result->id); ?>"><i class="fa fa-edit"></i></a> <a class="trash" href="javascript:;" id="<?php echo $result->id; ?>"> <i class="fa fa-trash"></i></a></th>
    </tr>
	
	<?php } ?>
	
	
	
	
  </tbody>
	</table>
	 
	</div>

<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  
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
    var conf = confirm("Are you sure you want to delete this User, This can't be restore!!");
    var delp = $(this).attr('id');
    var $ele = $(this).parent().parent();
    if(delp && conf==true) {
        
        $.ajax({
            url: "delete_user.php",
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
    }
});

</script>



</body>
</html>
