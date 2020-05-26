<?php
include("connect.php");
$editcondid=$_GET["editcondid"];
include("user_logout_chk.php");
if($_COOKIE['usr'])
{
	$user=$_COOKIE["usr"];
}
else
{
	$user=$_SESSION["UsrID"];
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
$date = date('Y-m-d H:i:s');
if($_POST['user'])
{
    $userlist='|';
    foreach($_POST['user'] as $uk=>$uval)
    {
        $userlist.=$uval.'|';
    }
}

if($editcondid)
{
$inscllist="UPDATE EnvTask SET EnvManagementId='$_GET[envid]', Date='$Date',Status='$Status', Remark='$Remark' WHERE EnvTaskId=$editcondid";
$res=$cudb->query($inscllist) or die(mysqli_error());
echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong>Enviornmental Management Edited sucessfully....
</div>";
}
else
{
$inscllist="INSERT INTO EnvTask SET EnvManagementId='$_GET[envid]', Date='$Date',Status='$Status', Remark='$Remark',AddedBy='$user',`OnDate`='$date'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Enviornmental Management Added sucessfully....
</div>";

}

}
if($editcondid) {
$sqlpr="SELECT * FROM EnvTask WHERE EnvTaskId='$editcondid'";
$query=$cudb->query($sqlpr) or die(mysql_error());
$resultp= mysqli_fetch_object($query);

$envid=$resultp->EnvManagementId;
}
else
{
$envid=$_GET['envid'];
}

$qnvqr="select * from EnviornmentalManagement where EnvManagementId='$envid'";
$envmanagaement=$cudb->query($qnvqr)or die(mysql_error());
$resultem = mysqli_fetch_object($envmanagaement);

$frequency=$resultem->Frequency;

$bookingdate=array();
$sqlp="SELECT * FROM EnvTask WHERE EnvManagementId='$envid'";
$quer=$cudb->query($sqlp) or die(mysql_error());
if($frequency=='Monthly')
{
 while($res=mysqli_fetch_object($quer))
 {
  $bookingdate[]=date('Y-n',strtotime($res->Date));
 }
}
else if($frequency=='Daily')
{
 while($res=mysqli_fetch_object($quer))
 {
  $bookingdate[]=date('Y-n-d',strtotime($res->Date));
 }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Enviornmental Management</title>
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
		<link rel="stylesheet" href="dist/css/jquery-ui.css" >
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
		<link href="editor.css" type="text/css" rel="stylesheet"/>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>Clerance<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Clerance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt" >
            <div class="box-header with-border">
              <h3 class="box-title">Add Enviornmental Management Task</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" data-parsley-validate="">
              <div class="box-body">
															<div class="form-group" style="width:100%; float:left;">
																<b>Management condition Name :</b> <br/>
																<?=$resultem->ManagementCondtnName;?><br/><br/>
																<?=$resultem->Description;?>
															</div>
              <div class="form-group" style="width:100%; float:left;">
                <input type="text" name="Date" value="<?=$resultp->Date;?>" autocomplete="off" id="datepicker" placeholder="Date" class="form-control" />
              </div>
              <div class="form-group" style="width:100%; float:left;">
                <select class="form-control" name="Status">
                    <option value="">Status</option>
                    <option value="Completed" <?php if($resultp->Status=='Completed'){ echo "selected";}?>>Completed</option>
                    <option value="Not Completed" <?php if($resultp->Status=='Not Completed'){ echo "selected";}?>>Not Completed</option>
                </select>
              </div>
              <div class="form-group" style="width:100%; float:left;">

                <div id="type_container">
              <div class="form-group" id="edit-0" style="width:100%; float:left;">
                  <textarea class="tinymce-enabled-message" name="Remark" cols="80" id="description1" placeholder="Remark" required=""><?php echo $resultp->Remark; ?></textarea>
                  
                  
              </div>
            </div>
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
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="dist/js/jquery-ui.js"></script>
<script>
 var unavailableDates = <?=json_encode($bookingdate);?>;
		function unavailable(date) {
   <?php
   if($frequency=='Monthly')
   {
    ?>
    dmy = date.getFullYear() + "-" + (date.getMonth() + 1);
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    <?php
   }
   elseif($frequency=='Daily')
   {
   ?>
        dmy = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
   <?php
   }
   ?>
    }
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
				beforeShowDay: unavailable
        });
  } );
  </script>

<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/parsley.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script type="text/javascript">
  $(document ).ready(function() {
    function applyMCE() {
      tinyMCE.init({
        mode : "textareas",
        editor_selector : "tinymce-enabled-message", 
        theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    
      });        
    }
    function AddRemoveTinyMce(editorId) {
      if(tinyMCE.get(editorId)) 
      {
        tinyMCE.EditorManager.execCommand('mceFocus', false, editorId);                    
        tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, editorId);

      } else {
        tinymce.EditorManager.execCommand('mceAddEditor', false, editorId);       
      }
    }
    applyMCE();
    $('a.toggle-tinymce').die('click').live('click', function(e) {
      AddRemoveTinyMce('description1');
      var lbl = $(this).text() == 'Off' ? 'On' : 'Off';
      $(this).text(lbl);
    });
    $('a.add-type').die('click').live('click', function(e) {
      e.preventDefault(); 
      var content = jQuery('#type-container .type-row'),
      element = null;
      for(var i = 0; i<1; i++){
        element = content.clone();
        var divId = 'id_'+jQuery.now();
        element.attr('id', divId);
        element.find('.remove-type').attr('targetDiv', divId);
        element.find('.tinymce-enabled-message-new').attr('id', 'txt_'+divId);
        element.appendTo('#type_container');
        AddRemoveTinyMce('txt_'+divId);

      }
    });

    jQuery(".remove-type").die('click').live('click', function (e) {
      var didConfirm = confirm("Are you sure You want to delete");
      if (didConfirm == true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#' + targetDiv).remove();
      // }
      return true;
      } else {
        return false;
      }
    });
  });
</script>
<script src="dist/js/parsley.js"></script>

</body>
</html>


