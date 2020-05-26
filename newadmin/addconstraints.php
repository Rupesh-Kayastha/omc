<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$lid=$_GET["lid"];
include("logout_chk.php");
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
  
 foreach($_POST['constraints'] as $lid=>$value)
 {
     $sql="delete from max_permissible where lid=$lid";
     $query=$cudb->query($sql);
  $i=0;
  foreach($value as $element)
  {
    if(isset($element) && $element!='')
    {
     $constrain=urlencode($element);
     $maxvalue=$_POST['max_value'][$lid][$i];
     $minvalue=$_POST['min_value'][$lid][$i];
     $unitvalue=$_POST['unit_value'][$lid][$i];
     $acceptable_limit=$_POST['acceptable_limit'][$lid][$i];
     $permissible_limit=$_POST['permissible_limit'][$lid][$i];
    
     $insertsql="insert into max_permissible set lid=$lid,constrain_name='$element',max_value='$maxvalue',min_value='$minvalue',unit_value='$unitvalue',acceptable_limit='$acceptable_limit',permissible_limit='$permissible_limit'";
     $query=$cudb->query($insertsql) or die(mysql_error());
    }
    $i++;
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
              <h3 class="box-title">Add Constraints</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <?php
            $sql="SELECT * FROM env_monitor";
$query=$cudb->query($sql) or die(mysql_error());
while($res= mysqli_fetch_object($query))
{
?>
<form role="form" method="post" name="project" id="projects"  data-parsley-validate="">
             
        <div class="col-md-11 constraint-group" style="padding-left: 0px;">
         <div class="form-group">
            
            <?=$res->env_names?>
            
          </div>
          <div class="form-group">
            <?php
            $sqlr="SELECT * FROM max_permissible where lid='$res->id'";
$querys=$cudb->query($sqlr) or die(mysql_error());
while($rest= mysqli_fetch_object($querys))
{
  ?>
             <div class="row" style="margin-top: 10px;">
                <div class="col-md-2">
           <input type="text" class="form-control"  name="constraints['<?=$res->id?>'][]" value="<?=$rest->constrain_name?>"    placeholder="Constraints Name" >
             </div>
              <div class="col-md-2">
           <input type="text" class="form-control"  name="max_value['<?=$res->id?>'][]" value="<?=$rest->max_value?>"   placeholder="Max Value" >
              </div>
              
              <div class="col-md-2">
           <input type="text" class="form-control"  name="min_value['<?=$res->id?>'][]" value="<?=$rest->min_value?>"   placeholder="Min Value" >
              </div>
              
              <div class="col-md-2">
                <input type="text" class="form-control"  name="unit_value['<?=$res->id?>'][]" value="<?=$rest->unit_value?>"   placeholder="Unit Value" >
              </div>
              
              <div class="col-md-2">
                <input type="text" class="form-control"  name="acceptable_limit['<?=$res->id?>'][]" value="<?=$rest->acceptable_limit?>"   placeholder="Acceptable Limit" >
              </div>
              
              <div class="col-md-2">
                <input type="text" class="form-control"  name="permissible_limit['<?=$res->id?>'][]" value="<?=$rest->permissible_limit?>"   placeholder="Permissible Limit" >
              </div>
             
             </div>
              <?php }?>
          </div>
         
          <div class="form-group" id="constraint<?=$res->id?>">
          <div class="row" style="margin-top: 10px;">
             <div class="col-md-2">
           <input type="text" class="form-control"  name="constraints['<?=$res->id?>'][]"    placeholder="Constraints Name" >
             </div>
              <div class="col-md-2">
                <input type="text" class="form-control"  name="max_value['<?=$res->id?>'][]"    placeholder="Max Value" >
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control"  name="min_value['<?=$res->id?>'][]"    placeholder="Min Value" >
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control"  name="unit_value['<?=$res->id?>'][]"    placeholder="Unit Value" >
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control"  name="acceptable_limit['<?=$res->id?>'][]"    placeholder="Acceptable Limit" >
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control"  name="permissible_limit['<?=$res->id?>'][]"    placeholder="Permissible Limit" >
              </div>
              </div>
          </div>
        <div class="form-group" id="constraintMore<?=$res->id?>">
          </div>
          
        <span style="margin-right: 15px; float: right;" onclick="$('#constraintMore<?=$res->id?>').append($('#constraint<?=$res->id?>').html())">Add More</span>
       
        </div>
          
               
               
                
             
<?php
}
?>
          
              <!-- /.box-body -->

              <div class="box-footer">
<button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($projectid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
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
<!-- Bootstrap validation -->
<script src="dist/js/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/parsley.js"></script>

<style>
  .constraint-group{
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
  }
</style>



</body>
</html>
