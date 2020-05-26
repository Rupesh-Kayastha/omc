<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$projectid=$_GET["projectid"];
$clid=$_GET["clid"];
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

if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      //print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      $$var = addslashes($valu);
    }
  }

$date = date('Y-m-d');
if($clid)
{
$cl_list=$_POST['c_name'];
$inscl="UPDATE clerance SET pid='$pid', c_name='$cl_list', mobileno='$mobileno', submit_date='$date' WHERE id=$clid";
$res=$cudb->query($inscl) or die(mysql_error());
echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Clearance Details Edited sucessfully....
</div>";
}
else
{
$cltextlist=$_POST['c_name'];
$mobile=$_POST['mobileno'];
for ($i=0; $i < count($cltextlist); $i++ ) {
$cl_list = addslashes($cltextlist[$i]);
$mobileno = addslashes($mobile[$i]);
$inscl="INSERT INTO clerance SET pid='$pid', c_name='$cl_list', mobileno='$mobileno', submit_date='$date'";
$res=$cudb->query($inscl) or die(mysql_error());
}
echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Clearance Details Added sucessfully....
</div>";
}
}

if($clid) {

$sqlpr="SELECT * FROM clerance WHERE id='$clid'";
$query=$cudb->query($sqlpr) or die(mysql_error());
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
  <link rel="stylesheet" href="dist/css/parsley.css">
  <!-- Google Font -->
		
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
      <h1>Clerance<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Clerance</li>
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
              <h3 class="box-title">Add Clerance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" id="clerance" data-parsley-validate="">
              <div class="box-body">
                <div class="form-group">
                   <select name="pid" class="form-control" id="exampleInputEmail1" required>
          <option value="">Choose Project</option>
          <?php $sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          $i=$i+1;  
        ?> 
        <option <?php if($result->id==$resultp->pid) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->p_name;?></option>
        <?php } ?>
          </select>
                </div>
                <div id="field">
                  <div id="field0">
				<div class="form-group">
         <?php if ($clid)  { ?>       
<input type="text" name="c_name" class="form-control" value="<?php echo $resultp->c_name; ?>" id="exampleInputEmail1" placeholder="Clearance Name" required>
<br>
<input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Enter Mobile Number" value="<?php echo $resultp->mobileno; ?>">
<?php } else {  ?>
<input type="text" name="c_name[]" class="form-control" value="<?php echo $resultp->c_name; ?>" id="exampleInputEmail1" placeholder="Clearance Name" required>
<br>
<input class="form-control" type="text" name="mobileno[]" id="mobileno" placeholder="Enter Mobile Number" value="<?php echo $resultp->mobileno; ?>">

<?php } ?>
<br>


                </div>
              </div>
            </div>
				<div class="form-group">
          <?php if ($clid)  { ?> 
                  
                  <?php } else {  ?>
                  <div id="add-more" style=" padding: 5px;">+ Add More</div>
                  <?php } ?>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>

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
<!-- Bootstrap validation -->
<script src="dist/js/jquery.validate.min.js"></script>
<script src="dist/js/parsley.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="form-group"> <input type="text" class="form-control" name="c_name[]" id="exampleInputEmail1" placeholder="clerance Name" required><br><input class="form-control" type="text" name="mobileno[]" id="mobileno" placeholder="Enter Mobile Number"></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button  id="remove' + (next - 1) + '" class="btn btn-danger remove-me text-right" style="position:absolute;right: 19px;"><i class="fa fa-close"></i></button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});
</script>
<script type="text/javascript">
 $(document).ready(function() {
			$( "#clerance" ).validate({
			});
   });
</script>

</body>
</html>