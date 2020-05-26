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
</style>

		
		<link href="editor.css" type="text/css" rel="stylesheet"/>
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
      <h1>Content<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Content</li>
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
              <h3 class="box-title">Add Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                 
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
				<div class="form-group">
                 
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Content Name">
                </div>
				<div class="form-group">
				   <label for="exampleInputFile">Enter Description</label>
                  <textarea id="txtEditor"></textarea> 
                  
                </div>
				
				<div class="form-group">
                  
                  <select class="form-control" id="exampleInputEmail1">
					<option>Choose Religion</option>
					<option>Religion2</option>
					<option>Religion3</option>
				  </select>
                </div>
				<div class="form-group">
                  
                  <select class="form-control" id="exampleInputEmail1">
					<option>Choose Leader</option>
					<option>Global Leader</option>
					<option>Regional Leader</option>
				  </select>
                </div>
				
				<div class="form-group">
                  
                  <select class="form-control" id="exampleInputEmail1">
					<option>Type Of Content</option>
					<option>Audio</option>
					<option>Video</option>
					<option>PDF</option>
				  </select>
                </div>
                <div class="form-group">
                  
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                </div>
				
                <div class="form-group">
                  <label for="exampleInputFile">Attach File</label>
                  <input type="file" id="exampleInputFile">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Disciple</a>. All rights
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
			});
		</script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
