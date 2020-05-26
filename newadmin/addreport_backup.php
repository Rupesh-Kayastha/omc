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
$lid=$_GET['lid'];
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
  <link rel="stylesheet" href="dist/css/jquery-ui.css" >
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <style> 

.thead{ width:100%; float:left; text-align:center; text-transform:uppercase;}
.tfx{ width:100%; float:left; height:auto; font-size:14px;  text-align:center;}
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
.np {padding: 0px;}
div#field {
    margin-top: 20px;
}
.mb10{margin-bottom:10px;}
.bb{border-bottom: 1px solid #ccc;}
.col7 {width: 13%; float: left; margin-right: 10px; }
.headcls
{
 background:#3e9806;
 color:#fff;
 padding:5px;
 border-radius:3px;
}
.fugcls
{
  width:22%;
  margin-right: 3%;
}
.surfcls
{
 width: 13%;
 margin-left: 12px
}
.colcls
{
 width:13%;
 padding-left:0px !important;
 padding-right:0px !important;
 margin-left:12px;
}
.surfcls1
{
 width: 9%;
 margin-left: 10px;
}
.fugcls1
{
 width: 8%;
 font-size: 12px;
 margin-left: 3px;
}
.txtcls
{
 padding:0px;
 width:8%;
 font-size: 12px;
 margin-left: 2px;
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
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Clearance Conditions</li>
      </ol>
    </section>

<?php
if($lid==1) { ?>
<?php
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
$cof=$_POST['co'];
$entrydatef=$_POST['entrydate'];
$pm10f=$_POST['pm10'];
$pm25f=$_POST['pm25'];
$so2f=$_POST['so2'];
$noxf=$_POST['nox'];
$remark=$_POST['remark'];
for($i=0; $i < count($cof); $i++ ) {
$co = addslashes($cof[$i]);
$entrydate =date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$pm10 = addslashes($pm10f[$i]);
$pm25 = addslashes($pm25f[$i]);
$so2 = addslashes($so2f[$i]);
$nox = addslashes($noxf[$i]);
$remarkall = addslashes($remark[$i]);
$inscllist="INSERT INTO monitoring_list SET lid='$location', env_id='$lid', date_entry='$entrydate', pm10='$pm10', pm25='$pm25', so2='$so2', nox='$nox', co='$co', remark='$remarkall', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysql_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>


    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 

 <form name="envupdate" id="envupdate" method="post"> 
  <h3 class="box-title">Ambient Air Quality</h3>
  <div class="thead">
    <div class="col-md-6 text-center" style="padding-left:0px;">
        <div class="form-group">
              <select name="location" class="form-control" id="exampleInputEmail1" class="required">
              <option>Choose Location To Add Report</option>
              <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                    $query1=$cudb->query($sql) or die(mysql_error());
              ?>
              <?php
         //loop through the page
            $i=0;
            while($result=mysqli_fetch_object($query1))
                {
              $i=$i+1;  
            ?> 
            <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
            <?php } ?>
              </select>
        </div>
    </div>
   <table class="table table-striped table-bordered">
    <thead class="thbg">
         <div id="field">
            <div class="col-md-12 np mb10">
               <div class="col7 headcls" >Date</div>
               <div class="col7 headcls">PM 10 (&#181;g/m<sup>3</sup>)</div>
               <div class="col7 headcls">PM 2.5 (&#181;g/m<sup>3</sup>)</div>
               <div class="col7 headcls">SO<sub>2</sub> (&#181;g/m<sup>3</sup>)</div>
               <div class="col7 headcls">NO<sub>x</sub> (&#181;g/m<sup>3</sup>)</div>
               <div class="col7 headcls">CO (Mg/m<sup>3</sup>)</div>
               <div class="col7 headcls">Remark</div>
           </div>
         </div>
    </thead>
  </table>
  </div>
 
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
    <div id="field" style="margin-top: 0px;">
    <div id="field0">
 <div class="col-md-12 np mb10">
<div class="col7"><input class="form-control" type="text" placeholder="Choose Date" id="datepicker" value="" name="entrydate[]"  style="line-height: 25px;" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="pm10[]" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="pm25[]" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="so2[]" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="nox[]" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="co[]" autocomplete="off"></div>
  <div class="col7"><input class="form-control" type="text" value="" name="remark[]" autocomplete="off"></div>
   </div>
  </div>
</div>
  </tbody>
</table>


                <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more" style="cursor: pointer;">+ Add More</span></div>
                </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
              </div>       
</div> </div>  

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
  
  
  
  <?php } else if ($lid==2) {?>
  
  
  <?php
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
$particular_matterf=$_POST['particular_matter'];
$entrydatef=date('Y-m-d H:i:s',strtotime($_POST['entrydate']));
$station_codef=$_POST['station_code'];
$remark=$_POST['remark'];
for($i=0; $i < count($particular_matterf); $i++ ) {
$particular_matter = addslashes($particular_matterf[$i]);
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$station_code = addslashes($station_codef[$i]);
$remarkall = addslashes($remark[$i]);
$inscllist="INSERT INTO fugitive SET lid='$location', env_id='$lid', date_entry='$entrydate', station_code='$station_code', remark='$remarkall', particular_matter='$particular_matter', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>

    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
              <!-- /.box-body -->
        <div class="col-md-12 np"> <div class="main-cnt"> 
  <form name="envupdate" id="envupdate" method="post"> 
  <h3 class="box-title" style="padding-left:15px;">Fugitive Emmision</h3>
  <div class="thead">
     <div class="col-md-6 text-center">
        <div class="form-group">
            <select name="location" class="form-control" id="exampleInputEmail1" class="required">
            <option>Choose Location To Add Report</option>
            <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                  $query1=$cudb->query($sql) or die(mysql_error());
            ?>
            <?php
       //loop through the page
          $i=0;
          while($result=mysqli_fetch_object($query1))
              {
            $i=$i+1;  
          ?> 
          <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
          <?php } ?>
            </select>
        </div>
     </div>
   <table class="table table-striped table-bordered">
    <thead class="thbg">
      <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3 headcls fugcls" style="margin-left:15px;">Date</div>
            <div class="col-md-3 headcls fugcls">Station Code</div>
            <div class="col-md-3 nonprint headcls fugcls">Particular Matter</div>
            <div class="col-md-3 nonprint headcls fugcls" style="margin-right:0;">Remark</div>
         </div>
      </div>
    </thead>
  </table>
  </div>

<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 

    <div id="field" style="margin-top:0px;">
    <div id="field0">
 <div class="col-md-12 np mb10">
  <div class="col-md-3"><input class="form-control" type="text" id="datepicker" value="" name="entrydate[]" autocomplete="off"></div>
  <div class="col-md-3"><input class="form-control" type="text" value="" name="station_code[]" autocomplete="off"></div>
  <div class="col-md-3"><input class="form-control" type="text" value="" name="particular_matter[]" autocomplete="off"></div>
  <div class="col-md-3"><input class="form-control" type="text" value="" name="remark[]" autocomplete="off"></div>
   </div>
  </div>
</div>
  </tbody>
</table>

         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more1" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
              </div>       
</div> 

</form>
  </div>  
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
  <? } else if($lid==8) { ?>
  <?php
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
$dbaf=$_POST['dba'];
$entrydatef=$_POST['entrydate'];
$location_codef=$_POST['location_code'];
$levelf=$_POST['level'];
$time_off=$_POST['time'];
for($i=0; $i < count($dbaf); $i++ ) {
$dba = addslashes($dbaf[$i]);
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$location_code = addslashes($location_codef[$i]);
$level = addslashes($levelf[$i]);
$time = addslashes($time_off[$i]);
$inscllist="INSERT INTO work_zone_noise SET lid='$location', env_id='$lid', date_entry='$entrydate', `level`='$level', time_of='$time', `dba`='$dba', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
        <div class="col-md-12 np"> <div class="main-cnt"> 

<form name="envupdate" id="envupdate" method="post"> 
  <h3 class="box-title" style="padding-left:15px;">Work Zone Noise Monitoring</h3>
  <div class="thead">
   <div class="col-md-6 text-center">
     <div class="form-group">
              <select name="location" class="form-control" id="exampleInputEmail1">
              <option>Choose Location To Add Report</option>
              <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                    $query1=$cudb->query($sql) or die(mysql_error());
              ?>
              <?php
         //loop through the page
            $i=0;
            while($result=mysqli_fetch_object($query1))
                {
              $i=$i+1;  
            ?> 
            <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
            <?php } ?>
              </select>
     </div>
   </div>
   
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3 headcls fugcls" style="margin-left:15px;">Date</div>
            <div class="col-md-3 headcls fugcls">Level</div>
            <div class="col-md-3 nonprint headcls fugcls">Time</div>
            <div class="col-md-3 nonprint headcls fugcls" style="margin-right:0;">dB(A)</div>
         </div>
     </div>
    </thead>
   </table>
   
  </div>
  
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
    <div id="field" style="margin-top:0px;">
    <div id="field0">
 <div class="col-md-12 np mb10">
<div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div>
  <div class="col-md-3"><select class="form-control" name="level[]">
  <option value="0">Select Level</option>
   <option value="n5">N5</option>
   <option value="n6">N6</option>
  </select></div>
  <div class="col-md-3"><input class="form-control" type="text" value="" name="time[]"></div>
  <div class="col-md-3"><input class="form-control" type="text" value="" name="dba[]"></div>
   </div>
  </div>
</div>
  </tbody>
</table>

         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more8" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
              </div>       
</div>
        </form>
        </div>  

  
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
  
  
  <? } else if($lid==6) { ?>
  <?php
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
$water_levelf=$_POST['water_level'];
$entrydatef=$_POST['entrydate'];
$location_codef=$_POST['location_code'];
$remark=$_POST['remark'];
for($i=0; $i < count($water_levelf); $i++ ) {
$water_level = addslashes($water_levelf[$i]);
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$location_code = addslashes($location_codef[$i]);
$remarkall = addslashes($remark[$i]);
$inscllist="INSERT INTO ground_water_level SET lid='$location', env_id='$lid', date_entry='$entrydate', location_code='$location_code', remark='$remarkall', water_level='$water_level', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>


    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
        <div class="col-md-12 np"> <div class="main-cnt"> 

<form name="envupdate" id="envupdate" method="post"> 
  <h3 class="box-title" style="padding-left:15px;">Ground Water Level Monitoring</h3>
  <div class="thead">
   <div class="col-md-6 text-center">
      <div class="form-group">
               <select name="location" class="form-control" id="exampleInputEmail1" class="required">
               <option>Choose Location To Add Report</option>
               <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                     $query1=$cudb->query($sql) or die(mysql_error());
               ?>
               <?php
          //loop through the page
             $i=0;
             while($result=mysqli_fetch_object($query1))
                 {
               $i=$i+1;  
             ?> 
             <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
             <?php } ?>
               </select>
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
      <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3 headcls fugcls" style="margin-left:15px;">Date</div>
            <div class="col-md-3 headcls fugcls">Location Code</div>
            <div class="col-md-3 nonprint headcls fugcls ">Depth (m)</div>
            <div class="col-md-3 nonprint headcls fugcls" style="margin-right:0;">Remark</div>
         </div>
      </div>
    </thead>  
  </table>
   
  </div>
  
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
     <div id="field" style="margin-top:0px;">
       <div id="field0">
         <div class="col-md-12 np mb10">
          <div class="col-md-3"><input id="datepicker" class="form-control" type="text" value="" name="entrydate[]"></div>
          <div class="col-md-3"><input class="form-control" type="text" value="" name="location_code[]"></div>
          <div class="col-md-3"><input class="form-control" type="text" value="" name="water_level[]"></div>
          <div class="col-md-3"><input class="form-control" type="text" value="" name="remark[]"></div>
         </div>
       </div>
     </div>
  </tbody>
</table>

         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more6" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
              </div>       
</div>
</form>
        </div>  


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
  
  
  <? } else if($lid==7) { ?>
  <?php
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
$entrydatef=$_POST['entrydate'];
$dayf=$_POST['day'];
$nightf=$_POST['night'];
$typeofareaf=$_POST['typeofarea'];
for($i=0; $i < count($dayf); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$day = addslashes($dayf[$i]);
$night = addslashes($nightf[$i]);
$typeofarea = addslashes($typeofareaf[$i]);
$insertnoise="INSERT INTO ambientnoise SET lid='$location', env_id='$lid', date_entry='$entrydate', `Day`='$day', `Night`='$night', `Typeofarea`='$typeofarea', pid='$pid',userid='$user'";
  $result=$cudb->query($insertnoise) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>


    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
             <form name="soilquality"  id="soilquality" method="post">
  <h3 class="box-title" style="padding-left:15px;">Work Zone Ambinet Noise</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
              <select name="location" class="form-control" id="exampleInputEmail1">
              <option>Choose Location To Add Report</option>
              <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                    $query1=$cudb->query($sql) or die(mysql_error());
              ?>
              <?php
         //loop through the page
            $i=0;
            while($result=mysqli_fetch_object($query1))
                {
              $i=$i+1;  
            ?> 
            <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
            <?php } ?>
              </select>
     </div>
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls fugcls" style="margin-left:15px;">Date</div>
             <div class="col-md-3 headcls fugcls">Type Of Area</div>
             <div class="col-md-3 headcls fugcls">Day</div>
             <div class="col-md-3 headcls fugcls" style="margin-right:0;">Night</div>
          </div>
      </div>
     </thead>
   </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 


    <div id="field" style="margin-top:0px;">
    <div id="field0">
  
   <div class="col-md-12 np mb10">
    <div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div>
    <div class="col-md-3"><select name="typeofarea[]" class="form-control">
    <option value="0">Select Area</option>
       <option value="Industrial Area">Industrial Area</option>  
       <option value="Commercial Area">Commercial Area</option>  
       <option value="Residential Area">Residential Area</option>  
       <option value="Silence Area">Silence Area</option>  
      </select></div>
    <div class="col-md-3"><input class="form-control" type="text" value="" name="day[]"></div>
    <div class="col-md-3"><input class="form-control" type="text" value="" name="night[]"></div>
   </div>
</div>
    </div>
  </tbody>
</table>
  <div class="form-group">
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more7" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
       </form>
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
<? } else if($lid==9) { ?>
  <?php
if(isset($_REQUEST['submit']))
{
 $entrydatef=$_POST['entrydate'];
$as1=$_POST['s1'];
$as2=$_POST['s2'];
$as3=$_POST['s3'];
$as4=$_POST['s4'];
$as5=$_POST['s5'];
$as6=$_POST['s6'];
$as7=$_POST['s7'];
$as8=$_POST['s8'];
$as9=$_POST['s9'];
$as10=$_POST['s10'];
$aa10=$_POST['a10'];
$as11=$_POST['s11'];
$aa11=$_POST['a11'];
for($i=0; $i < count($as1); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i]))); 
$s1 = addslashes($as1[$i]);
$s2 = addslashes($as2[$i]);
$s3 = addslashes($as3[$i]);
$s4 = addslashes($as4[$i]);
$s5 = addslashes($as5[$i]);
$s6 = addslashes($as6[$i]);
$s7 = addslashes($as7[$i]);
$s8 = addslashes($as8[$i]);
$s9 = addslashes($as9[$i]);
$s10 = addslashes($as10[$i]);
$s11 = addslashes($as11[$i]);
$a11 = addslashes($aa11[$i]);
$a10 = addslashes($aa10[$i]);
$insertsoil="INSERT INTO `soilquality` SET lid='$location', env_id='$lid', date_entry='$entrydate', `SoilColour`='$s1', `SoilTexture`='$s2', `PH`='$s3',`ElectricalConductivity`='$s4', `OrganicCarbon`='$s5' ,`OrganicMatter`='$s6', `AvailableNitrogen`='$s7', `AvailablePhosphorous`='$s8', `AvailablePotassium`='$s9', `Micronutriant`='$a10', `MValue`='$s10', `ExchangeableCations`='$a11', `EValue`='$s11', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
             <form name="soilquality"  id="envupdate" method="post">
  <h3 class="box-title">Soil Quality</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;padding-left:0px;">
      <div class="form-group">
          <select name="location" class="form-control" id="exampleInputEmail1">
          <option>Choose Location To Add Report</option>
          <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                $query1=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          $i=$i+1;  
        ?> 
        <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
        <?php } ?>
          </select>
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3 headcls fugcls1">Date</div>
            <div class="col-md-3 headcls fugcls1">Soil Colour</div>
            <div class="col-md-3 headcls fugcls1">Soil Texture</div>
            <div class="col-md-3 headcls fugcls1">pH</div>
            <div class="col-md-3 nonprint headcls fugcls1">Electrical Conductivity</div>
            <div class="col-md-3 nonprint headcls fugcls1">Organic Carbon</div>
            <div class="col-md-3 nonprint headcls fugcls1">Organic Matter</div>
            <div class="col-md-3 nonprint headcls fugcls1">Available Nitrogen</div>
            <div class="col-md-3 nonprint headcls fugcls1">Available Phosphorous</div>
            <div class="col-md-3 nonprint headcls fugcls1">Available Potassium</div>
            <div class="col-md-3 nonprint headcls fugcls1">Micro Nutrients</div>
            <div class="col-md-3 nonprint headcls fugcls1" style="margin-right:0;">Exchangeable Cations</div>
         </div>
     </div>
    </thead>
    
  </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 


    <div id="field" style="margin-top:0px;">
    <div id="field0">
    <div class="col-md-12 np mb10 bb">
  <div class="col-md-1 txtcls" style="margin-left:0px;width:9%;"><input class="form-control" type="date" value="" name="entrydate[]" style="font-size:10px;padding:0px;"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s1[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s2[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s3[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s4[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s5[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s6[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s7[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s8[]"></div>
    <div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s9[]"></div>
    <div class="col-md-1 txtcls">
   <select name="a10[]" class="form-control mb10">
         <option value="Iron">Iron</option>
         <option value="Copper">Copper</option>
         <option value="Zinc">Zinc</option>
         <option value="Manganese">Manganese</option>      
      </select>
   <input class="form-control" type="text" value="" name="s10[]">
  </div>
    <div class="col-md-1 txtcls">
   <select name="a11[]"  class="form-control mb10">
              <option value="Calcium">Calcium</option>
              <option value="Magnesium">Magnesium</option>
              <option value="Sodium">Sodium</option>
              <option value="Potassium">Potassium</option>
          </select>
   <input class="form-control" type="text" value="" name="s11[]">
  
  </div>
          
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
          <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row9" style="cursor: pointer;">+ Add More</span></div>
          </div>
         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
        </div>
</form>
       </div>
       
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <? } else if($lid==3) { ?>
  <?php
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
 $entrydatef=$_POST['entrydate'];
 $parametersf=$_POST['parameters'];
 $classaf=$_POST['classa'];
 $classbf=$_POST['classb'];
 $classcf=$_POST['classc'];
 $classdf=$_POST['classd'];
 $classef=$_POST['classe'];

for($i=0; $i < count($classef); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$parameters = addslashes($parametersf[$i]);
$classa = addslashes($classaf[$i]);
$classb = addslashes($classbf[$i]);
$classc = addslashes($classcf[$i]);
$classd = addslashes($classdf[$i]);
$classe = addslashes($classef[$i]);
$insertsoil="INSERT INTO `surfacewaterqualitymonitering` SET lid='$location', env_id='$lid', date_entry='$entrydate', ParameterName='$parameters', ClassA='$classa', ClassB='$classb', ClassC='$classc', ClassD='$classd', ClassE='$classe', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt"> 
                  <form name="soilquality"  id="envupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">Surface Water Quality</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
       <div class="form-group">
                <select name="location" class="form-control" id="exampleInputEmail1">
                <option>Choose Location To Add Report</option>
                <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                      $query1=$cudb->query($sql) or die(mysql_error());
                ?>
                <?php
           //loop through the page
              $i=0;
              while($result=mysqli_fetch_object($query1))
                  {
                $i=$i+1;  
              ?> 
              <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
              <?php } ?>
                </select>
       </div>
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
       <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls surfcls">Date</div>
             <div class="col-md-3 headcls surfcls">Parameters</div>
             <div class="col-md-3 headcls surfcls">Class A</div>
             <div class="col-md-3 headcls surfcls">Class B</div>
             <div class="col-md-3 headcls surfcls">Class C</div>
             <div class="col-md-3 headcls surfcls">Class D</div>
             <div class="col-md-3 headcls surfcls" style="margin-right:0;">Class E</div>
          </div>
       </div>
     </thead>
   </table>
   
  </div>
      
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 


    <div id="field" style="margin-top:0px;">
    <div id="field0">
    <div class="col-md-12 np mb10">
  <div class="col-md-1" style="width:13%;padding-left:0px;padding-right:0px;margin-left:12px;"><input class="form-control" type="date" value="" name="entrydate[]" style="font-size:12px;"></div>
  <div class="col-md-2 colcls"><select name="parameters[]" class="form-control" style="font-size:12px;">
    <option value="0">Select Parameter</option>
       <option value="pH">pH </option>  
       <option value="Dissolved Oxygen(as O2),mg/l,mn">Dissolved Oxygen</option>  
       <option value="BOD">BOD</option>  
       <option value="Total Coliform Organism">Total Coliform Organism</option>
       <option value="Free ammonia">Free ammonia</option>  
       <option value="Electrical conductivity">Electrical conductivity</option>  
       <option value="Sodium Absorption">Sodium Absorption</option>  
       <option value="Boron">Boron </option>  
      </select></div>
    <div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classa[]"></div>
    <div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classb[]"></div>
    <div class="col-md-1" style="width:13%;padding-left:0px;padding-right:0px;margin-left:12px;font-size:12px;"><input class="form-control" type="text" value="" name="classc[]"></div>
    <div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classd[]"></div>
    <div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classe[]"></div>
  
  </div>
          
    </div>
    </div>
  </tbody>
</table>
  
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row3" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
        </div>
             </form>
        </div>
       </div>
     
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<? } else if($lid==4) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['s1'];
$gs2=$_POST['s2'];
$gs3=$_POST['s3'];
$gs4=$_POST['s4'];
$gs5=$_POST['s5'];
$gs6=$_POST['s6'];
$gs7=$_POST['s7'];
$gs8=$_POST['s8'];
for($i=0; $i < count($gs8); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s3 = addslashes($gs3[$i]);
$s4 = addslashes($gs4[$i]);
$s5 = addslashes($gs5[$i]);
$s6 = addslashes($gs6[$i]);
$s7 = addslashes($gs7[$i]);
$s8 = addslashes($gs8[$i]);
echo $insertsoil="INSERT INTO `groundwaterqualitymonitering` SET lid='$location', env_id='$lid', date_entry='$entrydate', `Parameter`='$s1', `Unit`='$s2', `PermissibleUnit`='$s3', `GW1`='$s4', `GW2`='$s5' , `GW3`='$s6', `GW4`='$s7', `GW5`='$s8', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt"> 
   <form name="soilquality"  id="envupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">Surface Water Flow Measurement</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
          <select name="location" class="form-control" id="exampleInputEmail1">
          <option>Choose Location To Add Report</option>
          <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                $query1=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          $i=$i+1;  
        ?> 
        <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
        <?php } ?>
          </select>
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls surfcls1" style="width:12%;">Date</div>
             <div class="col-md-3 headcls surfcls1" style="width:12%;">Parameters</div>
             <div class="col-md-3 headcls surfcls1">Unit</div>
             <div class="col-md-3 headcls surfcls1" style="width:auto;">Permissible Limit</div>
             <div class="col-md-3 headcls surfcls1">GW1</div>
             <div class="col-md-3 headcls surfcls1">GW2</div>
             <div class="col-md-3 headcls surfcls1">GW3</div>
             <div class="col-md-3 headcls surfcls1">GW4</div>
             <div class="col-md-3 headcls surfcls1" style="margin-right:0;">GW5</div>
          </div>
     </div>
    </thead>
    
  </table>
   
  </div>
      
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 


    <div id="field">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-1" style="width:12%;padding-left:0px;padding-right:0px;margin-left:12px;"><input class="form-control" type="date" value="" name="date_entry[]" style="font-size:12px;"></div>
    <div class="col-md-2 colcls" style="margin-left:10px;">
      <select name="s1[]"  class="form-control" style="font-size:12px;">
              <option value="pH">pH</option>
              <option value="Odour">Odour</option>
              <option value="Colour">Colour</option>
              <option value="Taste">Taste</option>
              <option value="Turbidity">Turbidity</option>
              <option value="Chloride">Chloride</option>
              <option value="Residual Free Chlorine">Residual Free Chlorine</option>
              <option value="Total Dissolved Solid">Total Dissolved Solid</option>
              <option value="Total Hardness">Total Hardness</option>
              <option value="Iron">Iron</option>
              <option value="Calcium">Calcium</option>
              <option value="Magnesium">Magnesium</option>
              <option value="Sulfate">Sulfate</option>
              <option value="Manganese">Manganese</option>
              <option value="Nitrate">Nitrate</option>
              <option value="Alkalinity">Alkalinity</option>
              <option value="Aluminum">Aluminum</option>
              <option value="Fluoride">Fluoride</option>
              <option value="Anionic Detergent">Anionic Detergent</option>
              <option value="Cadmium">Cadmium</option>
              <option value="Copper">Copper</option>
              <option value="Zinc">Zinc</option>
              <option value="Lead">Lead</option>
              <option value="Selenium">Selenium</option>
              <option value="Hexavalent Chromium">Hexavalent Chromium</option>
              <option value="Phenolic Compound">Phenolic Compound</option>
              <option value="Mineral Oil">Mineral Oil</option>
              <option value="Total Coliform">Total Coliform</option>
              <option value="Mercury">Mercury</option>
              <option value="Cyanide">Cyanide</option>
              <option value="Boron">Boron</option>
              <option value="Arsenic">Arsenic</option>
              <option value="COD">COD</option>
          </select>
    </div>
    <div class="col-md-1" style="width:9%;padding-left:0px;padding-right:0px;margin-left:5px;"><input class="form-control" type="text" value="" name="s2[]"></div>
    <div class="col-md-2 colcls" style="width:11%;margin-left:10px;"><input class="form-control" type="text" value="" name="s3[]"></div>
    <div class="col-md-2 colcls" style="width:9%;margin-left:10px;"><input class="form-control" type="text" value="" name="s4[]"></div>
    <div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s5[]"></div>
    <div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s6[]"></div>
    <div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s7[]"></div>
    <div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s8[]"></div>
    </div>
          
    </div>
    </div>
  </tbody>
</table>
 
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row4" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
</form>
        </div>
       </div>
       
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
 <? } else if($lid==10) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['temp'];
$gs2=$_POST['relativehumidity'];
$gs4=$_POST['windspeed'];
$gs5=$_POST['winddirection'];
$gs6=$_POST['rainfall'];
for($i=0; $i < count($gs6); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s4 = addslashes($gs4[$i]);
$s5 = addslashes($gs5[$i]);
$s6 = addslashes($gs6[$i]);
 $insertmeterological="INSERT INTO `MeteorologicalInformation` SET lid='$location', env_id='$lid', date_entry='$entrydate', `Temprature`='$s1', `RelativeHumidity`='$s2', `WindSpeed`='$s4', `WindDirection`='$s5', `Rainfall`='$s6', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertmeterological) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
              <form name="soilquality"  id="envupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">Meterological Information</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
              <select name="location" class="form-control" id="exampleInputEmail1">
              <option>Choose Location To Add Report</option>
              <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                    $query1=$cudb->query($sql) or die(mysql_error());
              ?>
              <?php
         //loop through the page
            $i=0;
            while($result=mysqli_fetch_object($query1))
                {
              $i=$i+1;  
            ?> 
            <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
            <?php } ?>
              </select>
     </div>
   </div>
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls surfcls" style="width:15%;">Date / Time</div>
             <div class="col-md-3 headcls surfcls" style="width:15%;">Temperature (&#176;C)</div>
             <div class="col-md-3 headcls surfcls" style="width:15%;">Relative Humidity (%)</div>
             <div class="col-md-3 headcls surfcls" style="width:15%;">Wind Speed (m/s)</div>
             <div class="col-md-3 headcls surfcls" style="width:15%;">Wind Direction (&#176;)</div>
             <div class="col-md-3 headcls surfcls" style="width:15%;margin-right:0;">Rainfall (mm)</div>
          </div>
     </div>
    </thead>
    
  </table>
   
  </div>
      
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 


    <div id="field" style="margin-top:0px;">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="date" value="" name="date_entry[]"></div>
   
    <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="text" value="" name="temp[]"></div>
    <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="text" value="" name="relativehumidity[]"></div>
    <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="text" value="" name="windspeed[]"></div>
    <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="text" value="" name="winddirection[]"></div>
    <div class="col-md-2" style="width:15%;margin-left:13px;padding:0px;"><input class="form-control" type="text" value="" name="rainfall[]"></div>
    </div>
          
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row10" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
        </div>
       </div>
       </form>
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <? } else if($lid==11) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['ph'];
$gs2=$_POST['tss'];
$gs3=$_POST['iron'];
$gs4=$_POST['tc'];

for($i=0; $i < count($gs4); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s3 = addslashes($gs3[$i]);
$s4 = addslashes($gs4[$i]);

 $insertsoil="INSERT INTO `SurfaceRunoff` SET lid='$location', env_id='$lid', date_entry='$entrydate', `PH`='$s1', `TotalSuspendedSolid`='$s2', `Iron`='$s3', `TotalChromium`='$s4', pid='$pid',userid='$user' ";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
             <form name="surfacerunoff"  id="srunupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">Surface Runoff</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
               <select name="location" class="form-control" id="exampleInputEmail1">
               <option>Choose Location To Add Report</option>
               <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                     $query1=$cudb->query($sql) or die(mysql_error());
               ?>
               <?php
          //loop through the page
             $i=0;
             while($result=mysqli_fetch_object($query1))
                 {
               $i=$i+1;  
             ?> 
             <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
             <?php } ?>
               </select>
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls surfcls" style="width:18%;">Date</div>
             <div class="col-md-3 headcls surfcls" style="width:18%;">PH</div>
             <div class="col-md-3 headcls surfcls" style="width:auto;">Total Suspended Solid(mg/l)</div>
             <div class="col-md-3 headcls surfcls" style="width:18%;">Iron(mg/l)</div>
             <div class="col-md-3 headcls surfcls" style="margin-right:0;width:auto;">Total Chromium(mg/l)</div>
          </div>
     </div>
    </thead>
    
  </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 


    <div id="field">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="date" value="" name="date_entry[]"></div>
    
    <div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="text" value="" name="ph[]"></div>
    <div class="col-md-3" style="padding:0px;width:20%;margin-left:16px;"><input class="form-control" type="text" value="" name="tss[]"></div>
    <div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="text" value="" name="iron[]"></div>
    <div class="col-md-3" style="padding:0px;width:16%;margin-left:8px;"><input class="form-control" type="text" value="" name="tc[]"></div>
    
    </div>
          
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
       
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row11" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>

 </form>
        </div>
       </div>
      
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <? } else if($lid==12) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['smoke'];
$gs2=$_POST['co'];
$gs3=$_POST['hc'];
$gs4=$_POST['nox'];

for($i=0; $i < count($gs4); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s3 = addslashes($gs3[$i]);
$s4 = addslashes($gs4[$i]);

 $insertsoil="INSERT INTO `VehicularEmission` SET `lid`='$location',`env_id`='$lid', `date_entry`='$entrydate', `Smoke`='$s1', `CO`='$s2', `HC`='$s3', `NOX`='$s4', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
              <form name="vehicularemission"  id="veupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">Vehicular Emission</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
          <select name="location" class="form-control" id="exampleInputEmail1">
          <option>Choose Location To Add Report</option>
          <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                $query1=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          $i=$i+1;  
        ?> 
        <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
        <?php } ?>
          </select>
     </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-3 headcls surfcls" style="width:15%;">Date / Time</div>
             <div class="col-md-3 headcls surfcls">Smoke(HSU)</div>
             <div class="col-md-3 headcls surfcls">CO(%)</div>
             <div class="col-md-3 headcls surfcls">HC(PPM)</div>
             <div class="col-md-3 headcls surfcls">NO<sub>X</sub>(%)</div>
             <div class="col-md-3 headcls surfcls">Vehicle Number</div>
             <div class="col-md-3 headcls surfcls" style="margin-right:0;width:10%;">Type</div>
          </div>
     </div>
    </thead>
    
  </table>
   
  </div>
      
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
    <div id="field" style="margin-top:0px;">
    <div id="field0">
     <div class="col-md-12 np mb10">
       <div class="col-md-2" style="padding:0px;width: 15%;margin-left: 12px;"><input class="form-control" type="date" value="" name="date_entry[]"></div>
       <div class="col-md-3" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="smoke[]"></div>
       <div class="col-md-2" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="co[]"></div>
       <div class="col-md-3" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="hc[]"></div>
       <div class="col-md-2" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="nox[]"></div>
     </div>   
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row12" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
 </form>
        </div>
       </div>
      
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <? } else if($lid==13) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['freesilica'];

for($i=0; $i < count($gs1); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);

 $insertsoil="INSERT INTO `Pds` SET lid='$location', env_id='$lid', date_entry='$entrydate', `FreeSilica`='$s1', pid='$pid',userid='$user'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt">
             <form name="pds"  id="pdsupdate" method="post">
  <h3 class="box-title" style="padding-left:15px;">PDS</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
       <div class="form-group">
                <select name="location" class="form-control" id="exampleInputEmail1">
                <option>Choose Location To Add Report</option>
                <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                      $query1=$cudb->query($sql) or die(mysql_error());
                ?>
                <?php
           //loop through the page
              $i=0;
              while($result=mysqli_fetch_object($query1))
                  {
                $i=$i+1;  
              ?> 
              <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
              <?php } ?>
                </select>
       </div>
   </div>
   <table class="table table-striped table-bordered">
     <thead class="thbg">
       <div id="field">
           <div class="col-md-12 np mb10">
              <div class="col-md-3 headcls surfcls" style="width: 47%;">Date</div>
              <div class="col-md-3 headcls surfcls" style="width: 47%;margin-left: 32px;">FreeSilica(%)</div>
           </div>
      </div>
     </thead>
   </table>
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
    <div id="field" style="margin-top:0px;">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-6"><input class="form-control" type="date" value="" name="date_entry[]"></div>
     <div class="col-md-6"><input class="form-control" type="text" value="" name="freesilica[]"></div>
    </div>    
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
         <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row13" style="cursor: pointer;">+ Add More</span></div>
         </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
</form>
        </div>
       </div>
       
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
   <? } else if($lid==15) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['ph'];
$gs2=$_POST['tss'];
$gs3=$_POST['totalcr'];
$gs4=$_POST['cr'];
$gs5=$_POST['iron'];
$gs6=$_POST['o&g'];

for($i=0; $i < count($gs6); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s3 = addslashes($gs3[$i]);
$s4 = addslashes($gs4[$i]);
$s5 = addslashes($gs5[$i]);
$s6 = addslashes($gs6[$i]);

 $insertsoil="INSERT INTO `MineDischargeWater` SET lid='$location', env_id='$lid', date_entry='$entrydate', `PH`='$s1',`TSS`='$s2',`TotalCr`='$s3',`Cr`='$s4',`Iron`='$s5',`OG`='$s6', pid='$pid'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Mine Discharge Water</h3>
  <div class="thead">
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
   <tr>
      <th>Date</th>
      <th>PH</th>
      <th>TSS</th>
      <th>Total Cr</th>
      <th>Cr</th>
      <th>Iron</th>
      <th>O&G</th>
   </tr>
    </thead>
    
  </table>
   
  </div>
       <form name="minedischargewater"  id="minedwupdate" method="post">
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
<div class="col-md-6 text-center" style="margin-top:10px;">
 <div class="form-group">
          <select name="location" class="form-control" id="exampleInputEmail1">
          <option>Choose Location To Add Report</option>
          <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                $query1=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          $i=$i+1;  
        ?> 
        <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
        <?php } ?>
          </select>
                </div>
 
</div>

    <div id="field">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-2"><input class="form-control" type="date" value="" name="date_entry[]"></div>
    <div class="col-md-2"><input class="form-control" type="text" value="" name="ph[]"></div>
    <div class="col-md-2"><input class="form-control" type="text" value="" name="tss[]"></div>
    <div class="col-md-2"><input class="form-control" type="text" value="" name="totalcr[]"></div>
    <div class="col-md-2"><input class="form-control" type="text" value="" name="cr[]"></div>
    <div class="col-md-1"><input class="form-control" type="text" value="" name="iron[]"></div>
    <div class="col-md-1"><input class="form-control" type="text" value="" name="o&g[]"></div>
   
    </div>
          
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
        <div id="add-row14" style=" padding: 5px;">+ Add More</div>
        </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
        </div>
       </div>
       </form>
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
   <? } else if($lid==14) { ?>
  <?php
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
 $entrydatef=$_POST['date_entry'];
$gs1=$_POST['cr'];


for($i=0; $i < count($gs1); $i++ ) {
$entrydate = date('Y-m-d',strtotime(addslashes($entrydatef[$i])));
$s1 = addslashes($gs1[$i]);


 $insertsoil="INSERT INTO `GroundWaterSampling` SET lid='$location', env_id='$lid', date_entry='$entrydate', `Cr`='$s1', pid='$pid'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}
?>
    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring List</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Ground Water Sampling</h3>
  <div class="thead">
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
   <tr>
      <th>Date</th>
      <th>Cr <sup>+6</sup> (mg/l)</th>
      
   </tr>
    </thead>
    
  </table>
   
  </div>
       <form name="gwatersampling"  id="gwsupdate" method="post">
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
<div class="col-md-6 text-center" style="margin-top:10px;">
 <div class="form-group">
          <select name="location" class="form-control" id="exampleInputEmail1">
          <option>Choose Location To Add Report</option>
          <?php $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                $query1=$cudb->query($sql) or die(mysql_error());
          ?>
          <?php
     //loop through the page
        $i=0;
        while($result=mysqli_fetch_object($query1))
            {
          $i=$i+1;  
        ?> 
        <option value="<?php echo $result->id;?>"><?php echo $result->location;?></option>
        <?php } ?>
          </select>
                </div>
 
</div>

    <div id="field">
    <div id="field0">
     <div class="col-md-12 np mb10">
     <div class="col-md-6"><input class="form-control" type="date" value="" name="date_entry[]"></div>
    <div class="col-md-6"><input class="form-control" type="text" value="" name="cr[]"></div>
    
    </div>
          
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
        <div id="add-row15" style=" padding: 5px;">+ Add More</div>
        </div>

         <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
        </div>       

          </div>
        </div>
       </div>
       </form>
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <? } ?>
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
<script type="text/javascript" src="dist/js/jquery-ui.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/tableFixer.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col7"><input class="form-control" type="text" value="" name="entrydate[]" placeholder="Choose Date" id="datepicker'+next+'" style="line-height: 25px;"></div><div class="col7"><input class="form-control" type="text" value="" name="pm10[]"></div><div class="col7"><input class="form-control" type="text" value="" name="pm25[]"></div><div class="col7"><input class="form-control" type="text" value="" name="so2[]"></div><div class="col7"><input class="form-control" type="text" value="" name="nox[]"></div><div class="col7"><input class="form-control" type="text" value="" name="co[]"></div><div class="col7"><input class="form-control" type="text" value="" name="remark[]"></div></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button  id="remove' + (next - 1) + '" class="btn btn-danger remove-me text-right" style="position:absolute;right: 19px;"><i class="fa fa-close"></i></button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $("#datepicker"+next).datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate:'0'
        });
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more1").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3"><input class="form-control" id="datepicker'+next+'" type="text" value="" name="entrydate[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="staion_code[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="particular_matter[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="remark[]"></div></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button  id="remove' + (next - 1) + '" class="btn btn-danger remove-me text-right" style="position:absolute;right: 19px;"><i class="fa fa-close"></i></button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $("#datepicker"+next).datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate:'0'
        });
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more6").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3"><input id="datepicker'+next+'" class="form-control" type="text" value="" name="entrydate[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="location_code[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="water_level[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="remark[]"></div></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button  id="remove' + (next - 1) + '" class="btn btn-danger remove-me text-right" style="position:absolute;right: 19px;"><i class="fa fa-close"></i></button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $("#datepicker"+next).datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate:'0'
        });
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more8").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div><div class="col-md-3"><select class="form-control" name="level[]"><option value="0">Select Level</option><option value="n5">N5</option><option value="n6">N6</option></select></div><div class="col-md-3"><input class="form-control" type="text" value="" name="time[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="dba[]"></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more7").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"  style="line-height: 25px;"></div><div class="col-md-3"><select name="typeofarea[]" class="form-control"><option value="0">Select Area</option><option value="Industrial Area">Industrial Area</option><option value="Commercial Area">Commercial Area</option><option value="Residential Area">Residential Area</option><option value="Silence Area">Silence Area</option></select></div><div class="col-md-3"><input class="form-control" type="text" value="" name="day[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="night[]"></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row9").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10 bb"><div class="col-md-1 txtcls" style="margin-left:0px;width:9%;"><input class="form-control" type="date" value="" name="entrydate[]" style="font-size:10px;padding:0px;"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s1[]"  style="line-height: 25px;"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s2[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s3[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s4[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s5[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s6[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s7[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s8[]"></div><div class="col-md-1 txtcls"><input class="form-control" type="text" value="" name="s9[]"></div><div class="col-md-1 txtcls"><select name="a10[]" class="form-control mb10"><option value="Iron">Iron</option><option value="Copper">Copper</option><option value="Zinc">Zinc</option><option value="Manganese">Manganese</option></select><input class="form-control" type="text" value="" name="s10[]"></div><div class="col-md-1 txtcls"><select name="a11[]"  class="form-control mb10"><option value="Calcium">Calcium</option><option value="Magnesium">Magnesium</option><option value="Sodium">Sodium</option><option value="Potassium">Potassium</option></select><input class="form-control" type="text" value="" name="s11[]"></div></div></div>';

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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row3").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10 bb"><div class="col-md-12 np mb10"><div class="col-md-1" style="width:13%;padding-left:0px;padding-right:0px;margin-left:12px;"><input class="form-control" type="date" value="" name="entrydate[]" style="font-size:11px;"></div><div class="col-md-2 colcls"><select name="parameters[]" class="form-control" style="font-size:11px;"><option value="0">Select Parameter</option><option value="pH">pH </option><option value="Dissolved Oxygen(as O2),mg/l,mn">Dissolved Oxygen</option><option value="BOD">BOD</option><option value="Total Coliform Organism">Total Coliform Organism</option><option value="Free ammonia">Free ammonia</option><option value="Electrical conductivity">Electrical conductivity</option><option value="Sodium Absorption">Sodium Absorption</option><option value="Boron">Boron </option></select></div><div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classa[]"></div><div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classb[]"></div><div class="col-md-1" style="width:13%;padding-left:0px;padding-right:0px;margin-left:12px;font-size:12px;"><input class="form-control" type="text" value="" name="classc[]"></div><div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classd[]"></div><div class="col-md-2 colcls"><input class="form-control" type="text" value="" name="classe[]"></div></div></div></div>';

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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row5").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-2"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="s2[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="s3[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="s4[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="s5[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row4").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
       var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-1" style="width:12%;padding-left:0px;padding-right:0px;margin-left:12px;"><input class="form-control" type="date" value="" name="date_entry[]" style="font-size:12px;"></div><div class="col-md-2 colcls" style="margin-left:10px;"><select name="s1[]"  class="form-control" style="font-size:12px;"><option value="pH">pH</option><option value="Odour">Odour</option><option value="Colour">Colour</option><option value="Taste">Taste</option><option value="Turbidity">Turbidity</option><option value="Chloride">Chloride</option><option value="Residual Free Chlorine">Residual Free Chlorine</option><option value="Total Dissolved Solid">Total Dissolved Solid</option><option value="Total Hardness">Total Hardness</option><option value="Iron">Iron</option><option value="Calcium">Calcium</option><option value="Magnesium">Magnesium</option><option value="Sulfate">Sulfate</option><option value="Manganese">Manganese</option><option value="Nitrate">Nitrate</option><option value="Alkalinity">Alkalinity</option><option value="Aluminum">Aluminum</option><option value="Fluoride">Fluoride</option><option value="Anionic Detergent">Anionic Detergent</option><option value="Cadmium">Cadmium</option><option value="Copper">Copper</option><option value="Zinc">Zinc</option><option value="Lead">Lead</option><option value="Selenium">Selenium</option><option value="Hexavalent Chromium">Hexavalent Chromium</option><option value="Phenolic Compound">Phenolic Compound</option><option value="Mineral Oil">Mineral Oil</option><option value="Total Coliform">Total Coliform</option><option value="Mercury">Mercury</option><option value="Cyanide">Cyanide</option><option value="Boron">Boron</option><option value="Arsenic">Arsenic</option><option value="COD">COD</option></select></div><div class="col-md-1" style="width:9%;padding-left:0px;padding-right:0px;margin-left:5px;"><input class="form-control" type="text" value="" name="s2[]"></div><div class="col-md-2 colcls" style="width:11%;margin-left:10px;"><input class="form-control" type="text" value="" name="s3[]"></div><div class="col-md-2 colcls" style="width:9%;margin-left:10px;"><input class="form-control" type="text" value="" name="s4[]"></div><div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s5[]"></div><div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s6[]"></div><div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s7[]"></div><div class="col-md-1" style="padding-left:0px;padding-right:0px;margin-left: 13px;width:9%;"><input class="form-control" type="text" value="" name="s8[]"></div></div></div></div>';

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
<script> 
    $( document ).ready(function() {
  $("#fugitive").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>

<script type="text/javascript">
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row10").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-2"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="temp[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="relativehumidity[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="windspeed[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="winddirection[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="rainfall[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row11").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="text" value="" name="ph[]"></div><div class="col-md-3" style="padding:0px;width:20%;margin-left:16px;"><input class="form-control" type="text" value="" name="tss[]"></div><div class="col-md-2" style="padding:0px;width:18%;margin-left:10px;"><input class="form-control" type="text" value="" name="iron[]"></div><div class="col-md-3" style="padding:0px;width:16%;margin-left:8px;"><input class="form-control" type="text" value="" name="tc[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row12").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-2" style="padding:0px;width: 15%;margin-left: 12px;"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-3" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="smoke[]"></div><div class="col-md-2" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="co[]"></div><div class="col-md-3" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="hc[]"></div><div class="col-md-2" style="padding:0px;width: 13%;margin-left: 12px;"><input class="form-control" type="text" value="" name="nox[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row13").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-6"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-6"><input class="form-control" type="text" value="" name="freesilica[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row14").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-2"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="ph[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="tss[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="totalcr[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="cr[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="iron[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="o&g[]"></div></div></div></div></div>';
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
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-row15").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
         var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-6"><input class="form-control" type="date" value="" name="date_entry[]"></div><div class="col-md-6"><input class="form-control" type="text" value="" name="cr[]"></div></div></div></div></div>';
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
  
  $( function() {
   
    $( "#datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate:'0'
        });
      $('.form-control').attr('autocomplete','off');
  } );
</script>

<script src="dist/js/custom.js"></script>

</body>
</html>
