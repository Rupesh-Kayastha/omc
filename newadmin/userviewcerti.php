<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
include("user_logout_chk.php");
if($_COOKIE['usr'])
{
  $user=$_COOKIE["usr"];
}
else
{
  $user=$_SESSION["UsrID"];
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
	<h3 class="box-title">View Certificateas</h3>
	<div>
	 
	
    
    
 <?php
     //loop through the page
          $sqlimage="SELECT certificate_list_images.certi_image, certificate_list_images.file_type FROM certificate_list_images LEFT JOIN certificates ON certificates.id = certificate_list_images.cfid WHERE cid=$cid and pid=$pid";
          $query1=$cudb->query($sqlimage) or die(mysqli_error());  
           $j=1;
            while($result1=mysqli_fetch_object($query1))
            {
              $j=$j+1;
        ?>
        
         <?php if($result1->file_type=='application/pdf') { ?>

            <div class="col-md-6">
          <embed src="uploads/certificate/<?php echo $result1->certi_image ?>"
                               frameborder="0" width="100%" height="400px">
          
        
  </div>
  <?php } else { ?>
        
          <div class="col-md-6 text-center">
        <a href="#" data-toggle="modal" data-target="#myModal<?php echo $j; ?>"><img src="uploads/certificate/<?php echo $result1->certi_image ?>"  style="border:1px solid #ccc; max-width:100%;"></a>
      </div>

      <div id="myModal<?php echo $j; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

        <div class="modal-body">
            <img src="uploads/certificate/<?php echo $result1->certi_image ?>">
        </div>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  </div>

</div>

<?php } ?>


        <?php } ?></div>
</div>
  
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
   var conf = confirm("Are you sure you want to delete this row, This can't be restore!!!!");
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
</script>
<script src="dist/js/custom.js"></script>


</body>
</html>