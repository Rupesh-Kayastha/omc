<?php
ini_set('error_reporting', 1);
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$certificateid=$_GET["certi_id"];
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
if($certificateid)
{
    $date = date('Y-m-d'); 
     
   if (file_exists($_FILES['certi_image']['tmp_name']) || is_uploaded_file($_FILES['certi_image']['tmp_name'])) {
    $errors= array();
  
    $file_name = $_FILES['certi_image']['name'];
    $file_size =$_FILES['certi_image']['size'];
    $file_tmp =$_FILES['certi_image']['tmp_name'];
    $file_type=$_FILES['certi_image']['type'];  
        if($file_size > 10000000){
      $errors[]='File size must be less than 2 MB';
        }   

  $updatecerti="UPDATE certificate_list_images SET certi_image='$file_name', file_type='$file_type' WHERE cfid=$certificateid";
  
   $desired_dir="uploads/certificate/";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"uploads/certificate/".$file_name);
            }else{                  //rename the file if another one exist
                $new_dir="uploads/certificate/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
            $upress=$cudb->query($updatecerti) or die(mysqli_error());
               
   }


  }
$upcerti="UPDATE certificates SET pid='$pid', cid='$cllist', `exp_date`='$exp_date', set_remind='$set_remind', submit_date='$date' WHERE id='$certificateid'";  
$upres=$cudb->query($upcerti) or die(mysqli_error());
 echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Certificate Details Edited sucessfully....
</div>";
}
else
{
$date = date('Y-m-d');
   $inscerti="INSERT INTO certificates SET pid='$pid', cid='$cllist', `exp_date`='$exp_date', set_remind='$set_remind', submit_date='$date'";
   $res=$cudb->query($inscerti) or die(mysqli_error());
$lastid=mysqli_insert_id($cudb);

   if(isset($_FILES['certi_image'])){
    $errors= array();
  foreach($_FILES['certi_image']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['certi_image']['name'][$key];
    $file_size =$_FILES['certi_image']['size'][$key];
    $file_tmp =$_FILES['certi_image']['tmp_name'][$key];
    $file_type=$_FILES['certi_image']['type'][$key];  
        if($file_size > 10000000){
      $errors[]='File size must be less than 2 MB';
        }   
        $insertcerti="INSERT INTO certificate_list_images SET cfid='$lastid', certi_image='$file_name', file_type='$file_type'";
        $desired_dir="uploads/certificate/";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"uploads/certificate/".$file_name);
            }else{                  //rename the file if another one exist
                $new_dir="uploads/certificate/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
            $uplist=$cudb->query($insertcerti) or die(mysqli_error());     
        }else{
                print_r($errors);
        }
    }

}


   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Certificate Details Added sucessfully....
</div>";
}
}

if($certificateid) {

$sqlcr="SELECT * FROM certificates WHERE id='$certificateid'";
$query=$cudb->query($sqlcr) or die(mysql_error());
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
      <h1>Certificate<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Certificates</li>
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
              <h3 class="box-title">Add Certificates</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" data-parsley-validate="">
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
        <option <?php if ($resultp->pid==$result->id) { echo "selected" ?><?php } ?> value="<?php echo $result->id;?>"><?php echo $result->p_name;?></option>
        <?php } ?>
          </select>
              

               
                 
                   <select name="cllist" class="form-control" id="changecl" required>

                    <?php if($certificateid) { ?>

                    <option value="<?php echo $resultp->cid; ?>"> <?php echo GetName('clerance','c_name','id', $resultp->cid); ?></option>

                    <?php } else { ?>

                    <?php } ?>


                   
          </select>
                     
       
                
              </div>
              <!-- /.box-body -->

              <div class="form-group">
           <input type="date" class="form-control" value="<?php echo $resultp->exp_date; ?>" name="exp_date"  id="exp_date"  placeholder="Expiring Date">
          </div>
          <div class="form-group">


            <?php
           
            
            if($certificateid) {
               $sel="SELECT * FROM certificate_list_images where cfid=$resultp->id";
            $query1=$cudb->query($sel) or die(mysqli_error());
            $counts=mysqli_num_rows($query1);

             ?>
            <?
            
            while($resultc=mysqli_fetch_object($query1)) { 
             
              ?>
            <label>Edit File </label>
            <input  type="file" class="form-control"  value="<?php echo $resultc->certi_image ?>" name="certi_image"  id="exampleInputPassword1" >
            
            
           <?php if($resultc->file_type=='application/pdf') { ?>
           <ul style="list-style: none;">
            <li><a href="uploads/certificate/<?php echo $resultc->certi_image?>"><?php echo $resultc->certi_image; ?></a></li>
          </ul>

           <?php } else { ?>
           <img src="uploads/certificate/<?php echo $resultc->certi_image?>" width="100">
           <?php } ?>
            

            <? 
           
          } ?>

            <?php } else { ?>
            <input type="file" class="form-control"  value="" name="certi_image[]" multiple="" id="exampleInputPassword1" required>

            <?php } ?>

           <?php 
           if ($certificateid) {
           
           while($resultc=mysqli_fetch_object($query1)) { ?>
           <?php if($resultc->file_type=='application/pdf') { ?>
           <ul style="list-style: none;">
            <li><a href="uploads/certificate/<?php echo $resultc->certi_image?>"><?php echo $resultc->certi_image; ?></a></li>
          </ul>

           <?php } else { ?>
           <img src="uploads/certificate/<?php echo $resultc->certi_image?>" width="100">
           <?php } ?>
            
          <?php } } ?>



          </div>
           <div class="form-group">
          <select name="set_remind" id="set_remind" class="form-control">
            <option value="">Set Reminder</option>
            <?php for($s=1; $s<=12; $s++) { ?>
            
            <option <?php if ($resultp->set_remind==$s) { echo "selected" ?><?php } ?> value="<?php echo $s; ?>"><?php echo $s; ?> Year</option>

            <?php  } ?>
            
          </select>
          </div>
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
<script src="dist/js/parsley.js"></script>
<script>
$( "select[name='pid']" ).change(function () {
    var pjid = $(this).val();

    if(pjid) {

        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {'id':pjid},
            success: function(data) {

                $("select#changecl").empty();
                $.each(data, function(key, value) {
                    $("select#changecl").append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $("select#changecl").empty();
    }
});
</script>
</body>
</html>
