<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$projectid=$_GET["projectid"];
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
if($projectid)
{

if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
$file=$_FILES['image']['tmp_name'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name= addslashes($_FILES['image']['name']);
move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);
$image_save =$_FILES["image"]["name"];
$upimg="UPDATE projects SET image='$image_save' WHERE id='$projectid'";
$upimgres=$cudb->query($upimg) or die(mysqli_error());
}
else
{
$dbimg=GetName('projects', 'image','id',$projectid);
$upimg="UPDATE projects SET image='$dbimg' WHERE id='$projectid'";
$upimgres=$cudb->query($upimg) or die(mysqli_error());
}
$date = date('Y-m-d');   
$upproject="UPDATE projects SET p_name='$p_name', location='$location', `date`='$date', contact_person='$contact_person', phone='$phone', lat='$lat', lng='$lng', details='$details', submit_date='$date' WHERE id='$projectid'";  
$upres=$cudb->query($upproject) or die(mysqli_error());
 echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Project Details Edited sucessfully....
</div>";
}
else
{
$date = date('Y-m-d');
$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $imagename=basename( $_FILES["image"]["name"]); // used to store the filename in a variable
$insproject="INSERT INTO projects SET p_name='$p_name', location='$location', `date`='$date', contact_person='$contact_person', phone='$phone', lat='$lat', lng='$lng', details='$details', `image`='$imagename', submit_date='$date'";
   $res=$cudb->query($insproject) or die(mysql_error());
   $lastid=mysqli_insert_id($cudb);
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Project Details Added sucessfully....
</div>";

$mobilenos=GetName('projects','phone','id',$lastid);
$prname=GetName('projects','p_name','id',$lastid);
$msgcontent="New Project Added to State Pollution (".$prname.")";

function curl($url)
{
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}
$mobile = $mobilenos; //enter Mobile numbers comma seperated
$username = "krititech"; //your username
$password = "kriti@2705"; //your password
$sender = "KSALES"; //Your senderid
$username = urlencode($username);
$password = urlencode($password);
$sender = urlencode($sender);
$messagecontent = $msgcontent; //Type Of Your Message
$message = urlencode($messagecontent);
$url="http://smsodisha.in/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
$response = curl($url);

print_r($response);
}
}

if($projectid) {

$sqlpr="SELECT * FROM projects WHERE id='$projectid'";
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
              <h3 class="box-title">Add Project</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" name="project" id="projects" enctype="multipart/form-data" data-parsley-validate="">
              <div class="box-body">
        <div class="col-md-12" style="padding-left: 0px;">
         <div class="form-group">
          <input type="text" class="form-control" name="p_name" id="p_name" required=required value="<?php echo $resultp->p_name; ?>" placeholder="Enter Project Name" required>
          </div>
          <div class="form-group">
           <input type="text" class="form-control"  value="<?php echo $resultp->location; ?>" name="location"  id="location" required=required  placeholder="Enter Location" required>
          </div>
          <div class="form-group">
            
            <input type="date" class="form-control" value="<?php echo $resultp->date; ?>" name="date" id="date" required=required placeholder="Enter Date" required>
          </div>
          <div class="form-group">
            
            <input type="text" class="form-control" value="<?php echo $resultp->contact_person; ?>" required=required name="contact_person" id="contact_person" placeholder="Contact Person" required>
          </div>
          <div class="form-group">
            
            <input type="text"  class="form-control" value="<?php echo $resultp->phone; ?>" name="phone" id="phone" placeholder="Enter Phone No." required>
          </div>
          <div class="form-group">
            
            <textarea  class="form-control"  name="details" id="exampleInputPassword1" placeholder="Enter Details" required><?php echo $resultp->details; ?></textarea>
          </div>
           <div class="form-group">
            
            <input type="text"  class="form-control" value="<?php echo $resultp->lat; ?>" name="lat" id="lng" placeholder="Enter Latitude." required>
          </div>

          <div class="form-group">
            
            <input type="text"  class="form-control" value="<?php echo $resultp->lng; ?>" name="lng" id="lng" placeholder="Enter Longitude." required>
          </div>


          <div class="form-group">
            
            <input type="file" class="form-control" value="<?php echo $resultp->image; ?>" name="image" id="image" <?php if($resultp->image) { ?> <?php } else { ?>required<?php } ?>>
            <?php if($projectid) {
                                  ?>

           
            <img src="uploads/<?php echo $resultp->image; ?>" width="100">
            <?php }  ?>
          </div>
        </div>
        
        
               
               
                
              </div>
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
<script type="text/javascript">
 $(document).ready(function() {
			$( "#projects" ).validate({
    rules: {
    phone: {
      required: true,
    }
  }
			});
   });
</script>




</body>
</html>
