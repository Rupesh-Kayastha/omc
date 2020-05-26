<?php
include("connect.php");
$sql="SELECT * FROM admin";
$query=$cudb->query($sql);
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
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       

      <div class="row">
        <div class="col-md-12">
	
<div class="main-cnt"> 


	<h3 class="box-title">View User</h3>
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
</div>
<!-- ./wrapper -->
</body>
</html>