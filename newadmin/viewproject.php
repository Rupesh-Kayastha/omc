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
<form name="project" method="post" onSubmit="return confirm('Are you sure you want to do this action?');">  

	<h3 class="box-title">View Project</h3>
	 <table class="table table-striped table-bordered" id="projects">
	  <thead>
	<tr>
		  <th>#</th>
		  <th>Name</th>
		  <th>Location</th>
		  <th>Contact Person</th>
		  <th>Phone No</th>
		  <th>Details</th>
		  <th>Action</th>
		</tr>
	  </thead> 
     
 <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          $i=$i+1; 
        ?>  
  <tr>
   <td><input type="checkbox" name="checkboxstatus[<?php echo $i; ?>]" value="<?php echo $result->id ?>"></td>
   <td><?php echo stripslashes($result->p_name); ?></td>
	  <td><?php echo stripslashes($result->location); ?></td>
   <td><?php echo stripslashes($result->contact_person); ?></td>
   <td><?php echo stripslashes($result->phone); ?></td>
	  <td><?php echo stripslashes($result->details); ?></td>
	  <td><a href="addproject.php?projectid=<?php echo stripslashes($result->id); ?>"><i class="fa fa-edit"></i></a> <a class="trash" href="javascript:;" id="<?php echo $result->id; ?>"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    
     </tbody>

</table>


    

 <input type="submit" value="Delete Selected" name="Delete" onClick="function CheckForm();" class="btn btn-default" style="float:right; margin-bottom:20px;" />

 </form>
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
<script>
$( ".trash" ).click(function () {
   var conf = confirm("Are you sure you want to delete this row, This can't be restore!!!!");
    var delp = $(this).attr('id');
    var $ele = $(this).parent().parent();
    if(delp && conf==true) {
        
        $.ajax({
            url: "delete_project.php",
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

$( document ).ready(function() {
  $("#projects").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>

<script type="text/javascript">
  
  function CheckForm(){
  var checked=false;
  var elements = document.getElementsByName("checkboxstatus[]");
  for(var i=0; i < elements.length; i++){
    if(elements[i].checked) {
      checked = true;
    }
  }
  if (!checked) {
    alert('Check atleast one check box to proceed this action');
  }
  return checked;
}
</script>

</body>
</html>
