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
 // $sql="DELETE FROM `location` WHERE eid='22' ";
 //   $res=$cudb->query($sql);
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
.thead1{ width:100%; float:left; text-align:center; }

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
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header1.php')?>
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
$entrydate = date('Y-m-d',strtotime($entrydatef[$i]));
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
  <div class="thead1">
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
    <thead>
         <div id="field">
            <div class="col-md-12 np mb10">
               <div class="col7 headcls" >Date </div>
               <div class="col7 headcls">PM 10  (<span>&#181;</span>g/m<sup>3</sup>)</div>
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
if(isset($_REQUEST['fsubmit']))
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
$entrydatef=$_POST['entrydate'];
$locationi=$_POST['flocation'];
$remark=$_POST['remark'];
for($i=0; $i < count($particular_matterf); $i++ ) {
$particular_matter = addslashes($particular_matterf[$i]);
$entrydate = date('Y-m-d',strtotime($entrydatef[$i]));
$location = addslashes($locationi[$i]);
$remarkall = addslashes($remark[$i]);
$inscllist="INSERT INTO fugitive SET lid='$location', env_id='$lid', date_entry='$entrydate',remark='$remarkall', particular_matter='$particular_matter', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}

$flocthtml='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml.='</select>';
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
  <div class="thead1">
     
   <table class="table table-striped table-bordered">
    <thead class="thbg">
      <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3 headcls fugcls">
             Location
            </div>
            <div class="col-md-3 headcls fugcls" style="margin-left:15px;">Date</div>
            <div class="col-md-3 nonprint headcls fugcls">Total Suspended Particulate Matter(TSPM)result in (&#181;g/m3)</div>
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
  <div class="col-md-3">
    <?=$flocthtml;?>
  </div>
  <div class="col-md-3"><input class="form-control" type="text" id="datepicker" value="" name="entrydate[]" autocomplete="off"></div>
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
               <button tabindex="10" type="submit" name="fsubmit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
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
  
     $monitoringdate=$_POST['entrydate'];
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['time'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
       
           $locationid=$value;
           $timebox=$_POST[$value1]['timebox'][$key];
           $monitoringdate=$_POST['date'][$key];
           $sqlday="SELECT * FROM `WorkZoneNoise` WHERE `MontoringDate`='$monitoringdate' and `LocationId`='$locationid' and `MonitoringTime`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into `WorkZoneNoise` set `MontoringDate`='$monitoringdate',`LocationId`='$locationid',`MonitoringTime`='$value1',`MonitoringValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate'";
             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
  
  
/*$dbaf=$_POST['dba'];
$entrydatef=$_POST['entrydate'];
$location_codef=$_POST['location_code'];
$levelf=$_POST['level'];
$time_off=$_POST['time'];
for($i=0; $i < count($dbaf); $i++ ) {
$dba = addslashes($dbaf[$i]);
$entrydate = addslashes($entrydatef[$i]);
$location_code = addslashes($location_codef[$i]);
$level = addslashes($levelf[$i]);
$time = addslashes($time_off[$i]);
$inscllist="INSERT INTO work_zone_noise SET lid='$location', env_id='$lid', date_entry='$entrydate', `level`='$level', time_of='$time', `dba`='$dba', pid='$pid',userid='$user'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}*/
}


$flocthtml2='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml2.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml2.='</select>';
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
     <!-- <div class="form-group">
             <input class="form-control" type="date" value="" name="entrydate">
     </div> -->
   </div>
   
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
         <div class="col-md-12 np mb10">
             <div class="col-md-4">Time</div>
             <div class="col-md-4 "><div class="headcls">Location 1</div></div>
             <div class="col-md-4 "><div class="headcls">Location 2</div></div>
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
              <div class="col-md-4">Location Name</div>
              <div class="col-md-4"><?=$flocthtml2?></div>
              <div class="col-md-4"><?=$flocthtml2?></div>
       </div>
       <div class="col-md-12 np mb10">
             <div class="col-md-4">Date Of Monitoring</div>
              <div class="col-md-4"><input type="date" name="date[]" class="form-control"></div>
              <div class="col-md-4"><input type="date" name="date[]" class="form-control"></div>

       </div>
    </div>
    
    <div class="col-md-12 np mb10">
     
     <?php
     $timing=array('08:00AM','09:00AM','10:00AM','11:00AM','12:00PM','01:00PM','02:00PM','03:00PM');
     foreach($timing as $kk1=>$vv1)
     {
     ?>
     <div class="col-md-2"><?=$kk1+1?></div>
     <div class="col-md-2"><?=$vv1?>
     <input type="hidden" class="form-control" name="time[]" value="<?=$vv1?>" required="required"> 
     </div>
           <div class="col-md-4">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-4">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required"> 
                  </div>
           </div>
     <?php
     }
     ?>   
           
   </div>
    
    
</div>
  </tbody>
</table>
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
$ondate=date('Y-m-d H:i:s');  
$flocation=$_POST['flocation'];
$water_levelf=$_POST['water_level'];
$entrydatef=$_POST['entrydate'];
$location_codef=$_POST['location_code'];
$remark=$_POST['remark'];
for($i=0; $i < count($water_levelf); $i++ ) {
$water_level = addslashes($water_levelf[$i]);
$entrydate = addslashes($entrydatef[$i]);
$location_code = addslashes($location_codef[$i]);
$remarkall = addslashes($remark[$i]);
$locationid = addslashes($flocation[$i]);
 $inscllist="INSERT INTO ground_water_level SET lid='$lid', date_entry='$entrydate', StationCode='$location_code', remark='$remarkall', Depth='$water_level', pid='$pid',userid='$user',LocationId='$locationid',OnDate='$ondate',IsDelete='0'";
  $res=$cudb->query($inscllist) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}
}

$flocthtml115='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml115.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml115.='</select>';
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
              
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
      <div id="field">
         <div class="col-md-12 np mb10">
            <div class="col-md-3"><div class="headcls">Location</div></div>
            <div class="col-md-3"><div class="headcls">Station Code</div></div>
            <div class="col-md-3"><div class="headcls">Date of Measurement</div></div>
            <div class="col-md-2 nonprint"><div class="headcls">Depth (meter)</div></div>
            <div class="col-md-1 nonprint" style="margin-right:0;"><div class="headcls">Remark</div></div>
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
          <div class="col-md-3">
           <?=$flocthtml115?>
          </div>
          <div class="col-md-3"><input class="form-control" type="text" value="" name="location_code[]"></div>
          <div class="col-md-3">
           <input class="form-control" type="date" value="" name="entrydate[]">
          </div>  
          <div class="col-md-2"><input class="form-control" type="text" value="" name="water_level[]"></div>
          <div class="col-md-1"><input class="form-control" type="text" value="" name="remark[]"></div>
         </div>
       </div>
     </div>
  </tbody>
</table>

         <div class="form-group">
                  <div id="add-more6" style=" padding: 5px;"><span  style="cursor: pointer;">+ Add More</span></div>
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
  
     // $monitoringdate=$_POST['entrydate'];
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['time'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
       
           $locationid=$value;
           $timebox=$_POST[$value1]['timebox'][$key];
           $monitoringdate=$_POST['date'][$key];
           $Average=$_POST['Avg'][$key];
          $sqlday="SELECT * FROM `AmbientNoiseDay` WHERE `MontoringDate`='$monitoringdate' and `LocationId`='$locationid' and `MonitoringTime`='$value1' and `Pid`='$pid'"; //echo "<br>";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into AmbientNoiseDay set `MontoringDate`='$monitoringdate',`LocationId`='$locationid',`MonitoringTime`='$value1',`MonitoringValue`='$timebox',`Average`='$Average',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate'";
             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
 
  
/*$entrydatef=$_POST['entrydate'];
$dayf=$_POST['day'];
$nightf=$_POST['night'];
$typeofareaf=$_POST['typeofarea'];
for($i=0; $i < count($dayf); $i++ ) {
$entrydate = addslashes($entrydatef[$i]);
$day = addslashes($dayf[$i]);
$night = addslashes($nightf[$i]);
$typeofarea = addslashes($typeofareaf[$i]);
$insertnoise="INSERT INTO ambientnoise SET lid='$location', env_id='$lid', date_entry='$entrydate', `Day`='$day', `Night`='$night', `Typeofarea`='$typeofarea', pid='$pid',userid='$user'";
  $result=$cudb->query($insertnoise) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}*/
}

$flocthtml='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml.='</select>';
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
  <h3 class="box-title" style="padding-left:15px;">Ambient Noise Level Monitoring (Day Time)</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
    <!--  <div class="form-group">
              <input class="form-control" type="date" value="" name="entrydate">
              
     </div> -->
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">S.L No</div>
             <div class="col-md-1">Time</div>
             <div class="col-md-2 "><div class="headcls">Location 1</div></div>
             <div class="col-md-2 "><div class="headcls">Location 2</div></div>
             <div class="col-md-2 "><div class="headcls">Location 3</div></div>
             <div class="col-md-2 "><div class="headcls">Location 4</div></div>
             <div class="col-md-1 "><div class="headcls">Location 5</div></div>
             <div class="col-md-1 "><div class="headcls">Location 6</div></div>
          </div>
      </div>
     </thead>
    
   </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
    <div id="field0">
  <div class="col-md-12 np mb10">
           <div class="col-md-2">Location Name</div>
           <div class="col-md-2"><?=$flocthtml?></div>
           <div class="col-md-2"><?=$flocthtml?></div>
           <div class="col-md-2"><?=$flocthtml?></div>
           <div class="col-md-2"><?=$flocthtml?></div>
           <div class="col-md-1"><?=$flocthtml?></div>
           <div class="col-md-1"><?=$flocthtml?></div>
     </div>
   <div class="col-md-12 np mb10">
    <div class="col-md-2">Date Of Monitoring</div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-1"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-1"><input type="date" name="date[]" class="form-control"></div>
   </div>
   </div>
    <div class="col-md-12 np mb10">
     
     <?php
     $timing=array('06:00AM-07:00AM','07:00AM-08:00AM','08:00AM-09:00AM','09:00AM-10:00AM','10:00AM-11:00AM','11:00AM-12:00PM','12:00PM-01:00PM','01:00PM-02:00PM','02:00PM-03:00PM','03:00PM-04:00PM','04:00PM-05:00PM','05:00PM-06:00PM','06:00PM-07:00PM','07:00PM-08:00PM','08:00PM-09:00PM','09:00PM-10:00PM');
     foreach($timing as $kk=>$vv)
     {
     ?>
     <div class="col-md-1"><?=$kk+1?></div>
     <div class="col-md-1"><?=$vv?>
     <input type="hidden" class="form-control" name="time[]" value="<?=$vv?>" > 
     </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required">  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required">  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv?>[timebox][]" required="required">  
            </div>
           </div>
           <!-- <div id="field0">
           <div class="col-md-12 np mb10">
          <div class="col-md-4">Algorthim Average</div>
          <div class="col-md-2"><input type="number" name="<?=$vv?>[Alg][]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="<?=$vv?>[Alg][]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="<?=$vv?>[Alg][]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="<?=$vv?>[Alg][]" class="form-control"></div>
   </div>
   </div> -->
     <?php
     }
     ?>   
           
   </div>
   <div id="field0">
           <div class="col-md-12 np mb10">
          <div class="col-md-2">Logarithm Average</div>
          <div class="col-md-2"><input type="number" name="Avg[]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="Avg[]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="Avg[]" class="form-control"></div>
          <div class="col-md-2"><input type="number" name="Avg[]" class="form-control"></div>
          <div class="col-md-1"><input type="number" name="Avg[]" class="form-control"></div>
          <div class="col-md-1"><input type="number" name="Avg[]" class="form-control"></div>
   </div>
   </div>
   </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
        <!-- <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more7" style="cursor: pointer;">+ Add More</span></div>
         </div>-->

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
  
  
<? } else if($lid==9)
    { 
  
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
  
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['Sampling'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
          $monitoringdate=$_POST['date'][$key];
           $locationid=$value;
           $timebox=$_POST[$value1]['Samplingbox'][$key];
           $sqlday="SELECT * FROM `soilquality` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into `soilquality` set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`IsDelete`=0";

             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
 
}
$flocthtml30='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml30.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml30.='</select>';
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
  <h3 class="box-title" style="padding-left:15px;">Soil Quality Analysis</h3>
  <div class="thead">
   <!-- <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
              <input class="form-control" type="date" value="" name="entrydate">
              
     </div>
   </div> -->
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-2">Parameters</div>
             <div class="col-md-2">Unit</div>
             <div class="col-md-2 "><div class="headcls">S1</div></div>
             <div class="col-md-2 "><div class="headcls">S2</div></div>
             <div class="col-md-2 "><div class="headcls">S3</div></div>
             <div class="col-md-2 "><div class="headcls">S4</div></div>
          </div>
      </div>
     </thead>
    
   </table>
   
  </div>
  <div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
    <div id="field0">
  <div class="col-md-12 np mb10">
           <div class="col-md-4">Sampling Location</div>
           <div class="col-md-2"><?=$flocthtml30?></div>
           <div class="col-md-2"><?=$flocthtml30?></div>
           <div class="col-md-2"><?=$flocthtml30?></div>
           <div class="col-md-2"><?=$flocthtml30?></div>
     </div>
   <div class="col-md-12 np mb10">
    <div class="col-md-4">Date of Sampling</div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div> 
   </div>
   </div>
    <div class="col-md-12 np mb10">
       
     <?php
     $Micro=['Iron','Copper','Zinc','Manganese'];
     $Exchangeable=['Calcium','Magnesium','Sodium','Potassium'];
     $unit=['Meq/100gm','%Contribution*'];

     $sqll="SELECT * FROM `max_permissible` WHERE `lid`='$lid' and `is_delete`=0 ";
     $queryy=$cudb->query($sqll);

     while($result=mysqli_fetch_array($queryy))
     {
      if ($result['constrain_name'] =="Micro nutrients") 
        {
     ?>
         <div class="col-md-2">
      <?php
        echo $result['constrain_name'];
        ?>
      </div>
      <div class="col-md-10">
        <div class="row">
      <?php
      for($i=0;$i<count($Micro);$i++)
      {
        ?>
      <div class="col-md-1"><?=$Micro[$i];?></div>
     <div class="col-md-1"><?=$result['unit_value']?>
     <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
     </div>
           <div class="col-md-3">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-3">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
            </div>
           </div>

           <?php
         }
         ?>
       </div>
       </div>
       <?php
           }

           elseif ($result['constrain_name'] =="Exchangeable Cations") 
        {
     ?>
         <div class="col-md-2">
      <?php
        echo $result['constrain_name'];
        ?>
      </div>
      <div class="col-md-10">
        
          <?php
          for($i=0;$i<count($Exchangeable);$i++)
          {
            ?>
            <div class="row">
          <div class="col-md-2">
            <?=$Exchangeable[$i];?>              
          </div>
           
            
             	<?php
             	foreach ($unit as $key => $value) 
             	{?>
                  <div class="row">
                <div class="col-md-2">
              <?php echo $value;
             	?>
             		
             <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
           </div>
           <div class="col-md-2">
              <div class="form-group">
                 <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
              </div>
           </div>
           <div class="col-md-2">
              <div class="form-group">
                 <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
              </div>
           </div>
           <div class="col-md-2">
              <div class="form-group">
                 <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
              </div>
           </div>
           <div class="col-md-2">
              <div class="form-group">
                <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
              </div>
           </div>
           </div>
</div>
           <?php
         }
       }
         ?>
       
       </div>
       <?php
           }
           else
           { 
            ?>
     <div class="col-md-2">
      <?php
        echo $result['constrain_name'];
        ?>
      </div>
     <div class="col-md-2"><?=$result['unit_value']?>
     <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
     </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
            </div>
           </div>
     <?php
     }

      }
     ?>   
           
   </div>
 </div>
   </div>
  </tbody>
</table>
  <div class="form-group">
        <!-- <div id="add-row9" style=" padding: 5px;">+ Add More</div> -->
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
$entrydate = addslashes($entrydatef[$i]);
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
  
  
  
     $monitoringdate=$_POST['entrydate'];
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['GWA'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
       
           $locationid=$value;
           $gwabox=$_POST[$value1]['GWAbox'][$key];
           $sqlday="SELECT * FROM `GroundWaterQuality` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into GroundWaterQuality set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$gwabox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`GroundType`='A'";
             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
  
  
  
  
 /*$entrydatef=$_POST['date_entry'];
$gs1=$_POST['s1'];
$gs2=$_POST['s2'];
$gs3=$_POST['s3'];
$gs4=$_POST['s4'];
$gs5=$_POST['s5'];
$gs6=$_POST['s6'];
$gs7=$_POST['s7'];
$gs8=$_POST['s8'];
for($i=0; $i < count($gs8); $i++ ) {
$entrydate = addslashes($entrydatef[$i]);
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
}*/
}


$flocthtml='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml.='</select>';

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
  <h3 class="box-title" style="padding-left:15px;">Ground Water Quality - (A) Organoleptic and Physical Parameters</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
           <input class="form-control" type="date" value="" name="entrydate">
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">Parameters</div>
             <div class="col-md-1">Unit</div>
             <div class="col-md-3">
               <div class="col-md-12">Norms</div>
               <div class="row">
               <div class="col-md-12">
                 <div class="col-md-6">Acceptable Limit</div>
                 <div class="col-md-6">Permissible Limit</div>
                </div>
               </div> 
             </div>
             <div class="col-md-2 "><div class="headcls">GW1</div></div>
             <div class="col-md-2 "><div class="headcls">GW2</div></div>
             <div class="col-md-1 "><div class="headcls">GW3</div></div>
             <div class="col-md-1 "><div class="headcls">GW4</div></div>
             <div class="col-md-1 "><div class="headcls">GW5</div></div>
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
               <div class="col-md-5">Sampling Location</div>
               <div class="col-md-2"><?=$flocthtml?></div>
               <div class="col-md-2"><?=$flocthtml?></div>
               <div class="col-md-1"><?=$flocthtml?></div>
               <div class="col-md-1"><?=$flocthtml?></div>
               <div class="col-md-1"><?=$flocthtml?></div>
         </div>
      </div>
      <div class="col-md-12 np mb10">
           <div class="col-md-4">Date of Sampling</div>
      </div>
    </div>
      
      <div class="col-md-12 np mb10">
     
     <?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
     ?>
     <div class="col-md-1"><?=$result->constrain_name;?></div>
     <div class="col-md-1"><?=$result->unit_value;?>
     <input type="hidden" class="form-control" name="GWA[]" value="<?=$result->id?>" required="required"> 
     </div>
     <div class="col-md-1"><?=$result->acceptable_limit;?></div>
     <div class="col-md-1"><?=$result->permissible_limit;?></div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]"> 
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]">  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]">  
            </div>
           </div>
           
     <?php
     }
     ?>   
           
   </div>
     
     
     
  <!--  <div id="field0">
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
          
    </div>-->
    </div>
  </tbody>
</table>
 
       
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
$entrydate = addslashes($entrydatef[$i]);
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
  
  
  <? } else if($lid==11){  
  
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
  
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['Sampling'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
          $monitoringdate=$_POST['date'][$key];
           $locationid=$value;
           $timebox=$_POST[$value1]['Samplingbox'][$key];
           $sqlday="SELECT * FROM `SurfaceRunoff` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into `SurfaceRunoff` set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`IsDelete`=0";

             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
 
}
$flocthtml31='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml31.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml31.='</select>';
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
            <div class="row mb10">
             <div class="col-md-1">Parameters</div>
             <div class="col-md-1">Unit</div>
             <div class="col-md-2">Prescribed Standard</div>
             <div class="col-md-2 "><div class="headcls">SRW1</div></div>
             <div class="col-md-2 "><div class="headcls">SRW2</div></div>
             <div class="col-md-2 "><div class="headcls">SRW3</div></div>
             <div class="col-md-2 "><div class="headcls">SRW4</div></div>
             </div>
          </div>
      </div>
     </thead>
    
   </table>
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
    <div id="field0">
  <div class="col-md-12 np">
    <div class="row  mb10">
           <div class="col-md-1"></div>
           <div class="col-md-1"></div>
           <div class="col-md-2">Sampling Location</div>
           <div class="col-md-2"><?=$flocthtml31?></div>
           <div class="col-md-2"><?=$flocthtml31?></div>
           <div class="col-md-2"><?=$flocthtml31?></div>
           <div class="col-md-2"><?=$flocthtml31?></div>
         </div>
         <div class="row mb10">
           <div class="col-md-1"></div>
           <div class="col-md-1"></div>
           <div class="col-md-2">Date of Sampling</div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
     </div>
     </div>


   </div>
    <div class="col-md-12 np mb10">
       
     <?php

     $sqll="SELECT * FROM `max_permissible` WHERE `lid`='$lid' and `is_delete`=0";
     $queryy=$cudb->query($sqll);
     while($result=mysqli_fetch_array($queryy))
     {
     ?>
    <div class="row">
     <div class="col-md-1"><?=$result['constrain_name']?></div>
     <div class="col-md-1"><?=$result['unit_value']?></div>
     <div class="col-md-2"><?=$result['min_value']?>
     <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
     </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
            </div>
           </div>
           </div>
     <?php
     }
     ?>   
           
   </div>
    </div>
  <div class="form-group">
       
         <!-- <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row11" style="cursor: pointer;">+ Add More</span></div>
         </div> -->

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

   <? } else if($lid==22){  
  
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
  
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['Sampling'] as $key1=>$value1)
     {
       foreach($_POST['flocation'] as $key=>$value)
       {
          $monitoringdate=$_POST['date'][$key];
           $locationid=$value;
           $timebox=$_POST[$value1]['Samplingbox'][$key];
           $sqlday="SELECT * FROM `ground_water_quality` WHERE `SamplingDate`='$monitoringdate'  and  `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
            echo $insertnoise="insert into `ground_water_quality` set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`IsDelete`=0";

             $result=$cudb->query($insertnoise);
           }
         
       }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
 
}
$flocthtml32='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml32.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml32.='</select>';
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
  <h3 class="box-title" style="padding-left:15px;">ground water quality</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
               <select name="location" class="form-control" id="exampleInputEmail1">
               <option>Choose Location To Add Report</option> -->
                <?php 
                  $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
                  $query1=$cudb->query($sql) or die(mysql_error());
               ?>
               <?php
          //loop through the page
             $i=0;
             while($result=mysqli_fetch_object($query1))
                 {
               $i=$i+1;  
             ?>
             <option value="<?php  $result->id;?>">
              <?php $result->location;?></option>
            <?php 
           }
            ?>
               </select>
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
            <div class="row mb10">
             <div class="col-md-2">location</div>
             <div class="col-md-2">Cr+6 conc.(mg/l)</div>
             <div class="col-md-2 "><div class="headcls">SRW1</div></div>
             <div class="col-md-2 "><div class="headcls">SRW2</div></div>
             <div class="col-md-2 "><div class="headcls">SRW3</div></div>
             <div class="col-md-2 "><div class="headcls">SRW4</div></div>
             </div>
          </div>
      </div>
     </thead>
    
   </table>
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
    <div id="field0">
  <div class="col-md-12 np">
    <div class="row  mb10">
           <div class="col-md-4">Sampling Location</div>
           <div class="col-md-2"><?=$flocthtml32?></div>
           <div class="col-md-2"><?=$flocthtml32?></div>
           <div class="col-md-2"><?=$flocthtml32?></div>
           <div class="col-md-2"><?=$flocthtml32?></div>
         </div> 
         <div class="row mb10">
           <div class="col-md-4">Date of Sampling</div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
     </div>
     </div>


   </div>
    <div class="col-md-12 np">
       
     <?php

     $sqll="SELECT * FROM `max_permissible` WHERE `lid`='$lid' and `is_delete`=0";
     $queryy=$cudb->query($sqll);
     while($result=mysqli_fetch_array($queryy))
     {
     ?>
    <div class="row mb10">
     <div class="col-md-2"><?=$result['constrain_name']?></div>
     <div class="col-md-2"><?=$result['max_value']?></div>
     <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
     
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
            </div>
           </div>
           </div>
     <?php
     }
     ?>   
    </div>       
   </div>
    </div>
  <div class="form-group">
       
         <!-- <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-row11" style="cursor: pointer;">+ Add More</span></div>
         </div> -->

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
$flocation=$_POST['flocation'];
$smokemin=$_POST['smokemin'];
$smokemax=$_POST['smokemax'];
$hcmin=$_POST['hcmin'];
$hcmax=$_POST['hcmax'];
$noxmin=$_POST['noxmin'];
$noxmax=$_POST['noxmax'];
$comin=$_POST['comin'];
$comax=$_POST['comax'];
$vehicleno=$_POST['vehicleno'];
$date=date('Y-m-d H:i:s');

 $insertvehicle="INSERT INTO `VehicularEmission` SET `SmokeMin`='$smokemin',`SmokeMax`='$smokemax', `COMin`='$comin', `COMax`='$comax', `HCMin`='$hcmin', `HCMax`='$hcmax', `NOXMin`='$noxmin', `NOXMax`='$noxmax',`env_id`='0',`lid`='$lid',`date_entry`='$entrydatef',`pid`='$pid',`UserId`='$user',`NoofVehicle`='$vehicleno',`OnDate`='$date',`LocationId`='$flocation'";
  $result1=$cudb->query($insertvehicle) or die(mysqli_error());
  echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
  </div>";

}

$flocthtml117='<select name="flocation" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml117.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml117.='</select>';

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
          <?=$flocthtml117?>
     </div>
     <div class="form-group">
          <input class="form-control" type="date" value="" name="date_entry">
     </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
               <div class="col-md-3">No. of Vehicles Monitored</div>
               <div class="col-md-3">
                 <div class="col-md-12">Smoke (HSU)</div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6">Min</div>
                     <div class="col-md-6">Max</div>
                    </div>
                 </div> 
               </div>
               <div class="col-md-2">
                 <div class="col-md-12">HC (ppm)</div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6">Min</div>
                     <div class="col-md-6">Max</div>
                    </div>
                 </div> 
               </div>
               <div class="col-md-2">
                 <div class="col-md-12">NOx (%)</div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6">Min</div>
                     <div class="col-md-6">Max</div>
                    </div>
                 </div> 
               </div>
               <div class="col-md-2">
                 <div class="col-md-12">CO (%)</div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6">Min</div>
                     <div class="col-md-6">Max</div>
                    </div>
                 </div> 
               </div>
               
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
       <div class="col-md-3">
         <input class="form-control" type="text" name="vehicleno">
       </div>
       <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6"><input class="form-control" type="text" name="smokemin"></div>
              <div class="col-md-6"><input class="form-control" type="text" name="smokemax"></div>
             </div>
          </div> 
       </div>
       <div class="col-md-2">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6"><input class="form-control" type="text" name="hcmin"></div>
              <div class="col-md-6"><input class="form-control" type="text" name="hcmax"></div>
             </div>
          </div> 
       </div>
       <div class="col-md-2">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6"><input class="form-control" type="text" name="noxmin"></div>
              <div class="col-md-6"><input class="form-control" type="text" name="noxmax"></div>
             </div>
          </div> 
       </div>
       <div class="col-md-2">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6"><input class="form-control" type="text" name="comin"></div>
              <div class="col-md-6"><input class="form-control" type="text" name="comax"></div>
             </div>
          </div> 
       </div>
     </div>   
    </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
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
$entrydate = addslashes($entrydatef[$i]);
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
  ini_set('display_errror', 1);
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
$location=$_POST['flocation'];
$entrydatef=$_POST['entrydate'];
$stcode=$_POST['code'];
$rest=$_POST['result'];
for($i=0; $i < count($location); $i++ )
{
   $locationid = addslashes($location[$i]);
   $dateofmeasurement = date('Y-m-d',strtotime($entrydatef[$i]));
   $code = addslashes($stcode[$i]);
   $result = addslashes($rest[$i]);
   
   echo $sqlflow="SELECT * FROM `FlowWaterMeasurement` WHERE `DateofMeasurement`='$measurementdate' and `LocationId`='$locationid' and `StationCode`='$code' and `Pid`='$pid'";
           $queryflow=$cudb->query($sqlflow);
           $cnt=mysqli_num_rows($queryflow);
           if($cnt==0)
           {
            echo $inscllist="INSERT INTO `FlowWaterMeasurement` SET LocationId='$locationid',StationCode='$code',DateofMeasurement='$dateofmeasurement',Result='$result',Lid='$lid', Pid='$pid',UserId='$user',OnDate='$date'";
             $res=$cudb->query($inscllist) or die(mysql_error());
           }
  
}

   echo "<div class='alert alert-success fade in alert-dismissable'>
   <strong>Success!</strong>Added sucessfully....
   </div>";
  
  
 /*$entrydatef=$_POST['date_entry'];
$gs1=$_POST['ph'];
$gs2=$_POST['tss'];
$gs3=$_POST['totalcr'];
$gs4=$_POST['cr'];
$gs5=$_POST['iron'];
$gs6=$_POST['o&g'];

for($i=0; $i < count($gs6); $i++ ) {
$entrydate = addslashes($entrydatef[$i]);
$s1 = addslashes($gs1[$i]);
$s2 = addslashes($gs2[$i]);
$s3 = addslashes($gs3[$i]);
$s4 = addslashes($gs4[$i]);
$s5 = addslashes($gs5[$i]);
$s6 = addslashes($gs6[$i]);

 $insertsoil="INSERT INTO `FlowWaterMeasurement` SET `LocationId`='$location',  `StationCode`='$lid', `DateofMeasurement`='$entrydate', `Result`='$s1',`TSS`='$s2',`Lid`='$s3',`Pid`='$s4',`UserId`='$s5',`OnDate`='$s6'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}*/
}

$flocthtml11='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml11.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml11.='</select>';
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
  <h3 class="box-title">Flow of Water Measurement</h3>
  <div class="thead">
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
      <div id="field">
            <div class="col-md-12 np mb10">
              <div class="col-md-3"><div class="headcls">Location Name</div></div>
              <div class="col-md-3"><div class="headcls">Station Code</div></div>
              <div class="col-md-3"><div class="headcls">Date of Measurement</div></div>
              <div class="col-md-3"><div class="headcls">Result in (m3/min)</div></div>
            </div>
      </div>
    </thead>
    
  </table>
   
  </div>
       <form name="minedischargewater"  id="minedwupdate" method="post">
<div class="tfx"> 
<table class="table table-striped table-bordered">
  <tbody> 
    <div id="field">
       <div id="field0">
          <div class="col-md-12 np mb10">
            <div class="col-md-3"><?=$flocthtml11;?></div>
            <div class="col-md-3"><input class="form-control" type="text" value="" name="code[]"></div>
            <div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div>
            <div class="col-md-3"><input class="form-control" type="text" value="" name="result[]"></div>
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
  
  
     $monitoringdate=$_POST['entrydate'];
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['time'] as $key1=>$value1)
     {
      foreach($_POST['nightlocation'] as $key=>$value)
      {
       
           $locationid=$value;
           $timebox=$_POST[$value1]['timebox'][$key];
           $monitoringdate=$_POST['date'][$key];
           $sqlnight="SELECT * FROM `AmbientNoiseNight` WHERE `MontoringDate`='$monitoringdate' and `LocationId`='$locationid' and `MonitoringTime`='$value1' and `Pid`='$pid'";
           $querynight=$cudb->query($sqlnight);
           $cnt=mysqli_num_rows($querynight);
           if($cnt==0)
           {
             $insertnightnoise="insert into `AmbientNoiseNight` set `MontoringDate`='$monitoringdate',`LocationId`='$locationid',`MonitoringTime`='$value1',`MonitoringValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate'";
             $result=$cudb->query($insertnightnoise);
           }  
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
  
  
  
 /*$entrydatef=$_POST['date_entry'];
$gs1=$_POST['cr'];


for($i=0; $i < count($gs1); $i++ ) {
$entrydate = addslashes($entrydatef[$i]);
$s1 = addslashes($gs1[$i]);


 $insertsoil="INSERT INTO `GroundWaterSampling` SET lid='$location', env_id='$lid', date_entry='$entrydate', `Cr`='$s1', pid='$pid'";
  $result1=$cudb->query($insertsoil) or die(mysqli_error());
   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> list Details Added sucessfully....
</div>";
}*/
}

$flocthtml1='<select name="nightlocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=7 and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml1.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml1.='</select>';

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
             <form name="gwatersampling"  id="gwsupdate" method="post">
  <h3 class="box-title">  
Ambient Noise Level Monitoring (Night Time)</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <!-- <div class="form-group">
         <input class="form-control" type="date" name="entrydate">   
     </div> -->
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-2">S.L No</div>
             <div class="col-md-2">Time</div>
             <div class="col-md-2 "><div class="headcls">Location 1</div></div>
             <div class="col-md-2 "><div class="headcls">Location 2</div></div>
             <div class="col-md-2 "><div class="headcls">Location 3</div></div>
             <div class="col-md-2 " style=""><div class="headcls">Location 4</div></div>
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
           <div class="col-md-4">Location Name</div>
           <div class="col-md-2"><?=$flocthtml1?></div>
           <div class="col-md-2"><?=$flocthtml1?></div>
           <div class="col-md-2"><?=$flocthtml1?></div>
           <div class="col-md-2"><?=$flocthtml1?></div>
      </div>
     <div class="col-md-12 np mb10">
      <div class="col-md-4">Date Of Monitoring</div>
     <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
          <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
     </div>   
    </div>
     
     <div class="col-md-12 np mb10">
     <?php
     $timing1=array('10:00PM-11:00PM','11:00PM-12:00AM','12:00AM-01:00AM','01:00AM-02:00AM','02:00AM-03:00AM','03:00AM-04:00AM','04:00AM-05:00AM','05:00AM-06:00AM');
     foreach($timing1 as $kk1=>$vv1)
     {
     ?>
     <div class="col-md-2"><?=$kk1+1?></div>
     <div class="col-md-2"><?=$vv1?>
     <input type="hidden" class="form-control" name="time[]" value="<?=$vv1?>" required="required"> 
     </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$vv1?>[timebox][]" required="required">  
            </div>
           </div>
     <?php
     }
     ?>   
     </div>
     
     
  </tbody>
</table>

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
  
  
  <? }
    else if($lid==5)
    { 
  
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
  
     
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['Sampling'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
       	   $monitoringdate=$_POST['date'][$key];
           $locationid=$value;
           $timebox=$_POST[$value1]['Samplingbox'][$key];
           $sqlday="SELECT * FROM `SurfaceWaterAnalysis` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into `SurfaceWaterAnalysis` set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$timebox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate'";
             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
 
}

$flocthtml3='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml3.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml3.='</select>';
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
  <h3 class="box-title" style="padding-left:15px;">Surface Water Analysis</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <!-- <div class="form-group">
              <input class="form-control" type="date" value="" name="entrydate">
              
     </div> -->
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-2">Parameters</div>
             <div class="col-md-2">Unit</div>
             <div class="col-md-2 "><div class="headcls">SW1</div></div>
             <div class="col-md-2 "><div class="headcls">SW2</div></div>
             <div class="col-md-2 "><div class="headcls">SW3</div></div>
             <div class="col-md-2 "><div class="headcls">SW4</div></div>
          </div>
      </div>
     </thead>
    
   </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
    <div id="field0">
  <div class="col-md-12 np mb10">
           <div class="col-md-4">Sampling Location</div>
           <div class="col-md-2"><?=$flocthtml3?></div>
           <div class="col-md-2"><?=$flocthtml3?></div>
           <div class="col-md-2"><?=$flocthtml3?></div>
           <div class="col-md-2"><?=$flocthtml3?></div>
     </div>
   <div class="col-md-12 np mb10">
    <div class="col-md-4">Date of Sampling</div>
      	   <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>
           <div class="col-md-2"><input type="date" name="date[]" class="form-control"></div>     
   </div>
   </div>
    <div class="col-md-12 np mb10">
     
     <?php
     $sqll="SELECT * FROM `max_permissible` WHERE `lid`='$lid' and `is_delete`=0";
     $queryy=$cudb->query($sqll);
     while($result=mysqli_fetch_array($queryy))
     {
     ?>
     <div class="col-md-2"><?=$result['constrain_name']?></div>
     <div class="col-md-2"><?=$result['unit_value']?>
     <input type="hidden" class="form-control" name="Sampling[]" value="<?=$result['id']?>" required="required"> 
     </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
                  </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required"> 
            </div>
           </div>
           <div class="col-md-2">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result['id']?>[Samplingbox][]" required="required">  
            </div>
           </div>
     <?php
     }
     ?>   
           
   </div>
   </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
        <!-- <div class="form-group">
                  <div style=" padding: 5px;"><span id="add-more7" style="cursor: pointer;">+ Add More</span></div>
         </div>-->

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
  
  
<? }
else if($lid==16)
    {
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
          
          
             $monitoringdate=$_POST['entrydate'];
             $ondate=date('Y-m-d H:i:s');
             foreach($_POST['GWA'] as $key1=>$value1)
             {
              foreach($_POST['flocation'] as $key=>$value)
              {
               
                   $locationid=$value;
                   $gwabox=$_POST[$value1]['GWAbox'][$key];
                   $sqlday="SELECT * FROM `GroundWaterQuality` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
                   $queryday=$cudb->query($sqlday);
                   $cnt=mysqli_num_rows($queryday);
                   if($cnt==0)
                   {
                     $insertnoise="insert into GroundWaterQuality set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$gwabox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`GroundType`='B'";
                     $result=$cudb->query($insertnoise);
                   }
                   
                 
              }
              
             }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
          
          
        }
   
  $flocthtml111='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml111.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml111.='</select>';
  
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
  <h3 class="box-title" style="padding-left:15px;">Ground Water Quality - (B) General Parameters Concerning substances Undesirable in Excessive</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
           <input class="form-control" type="date" value="" name="entrydate">
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">Parameters</div>
             <div class="col-md-1">Unit</div>
             <div class="col-md-3">
               <div class="col-md-12">Norms</div>
               <div class="row">
               <div class="col-md-12">
                 <div class="col-md-6">Acceptable Limit</div>
                 <div class="col-md-6">Permissible Limit</div>
                </div>
               </div> 
             </div>
             <div class="col-md-2 "><div class="headcls">GW1</div></div>
             <div class="col-md-2 "><div class="headcls">GW2</div></div>
             <div class="col-md-1 "><div class="headcls">GW3</div></div>
             <div class="col-md-1 "><div class="headcls">GW4</div></div>
             <div class="col-md-1 "><div class="headcls">GW5</div></div>
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
               <div class="col-md-5">Sampling Location</div>
               <div class="col-md-2"><?=$flocthtml111?></div>
               <div class="col-md-2"><?=$flocthtml111?></div>
               <div class="col-md-1"><?=$flocthtml111?></div>
               <div class="col-md-1"><?=$flocthtml111?></div>
               <div class="col-md-1"><?=$flocthtml111?></div>
         </div>
      </div>
      <div class="col-md-12 np mb10">
           <div class="col-md-4">Date of Sampling</div>
      </div>
    </div>
      
      <div class="col-md-12 np mb10">
     
     <?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
      
     ?>
     <div class="col-md-2"><?=$result->constrain_name;?></div>
     <div class="col-md-1"><?=$result->unit_value;?>
     <input type="hidden" class="form-control" name="GWA[]" value="<?=$result->id?>" required="required"> 
     </div>
     <div class="col-md-1"><?=$result->acceptable_limit;?></div>
     <div class="col-md-1"><?=$result->permissible_limit;?></div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" > 
                  </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" > 
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]">  
            </div>
           </div>
           
     <?php
     }
     ?>   
           
   </div>
     
     
  
    </div>
  </tbody>
</table>
 
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
  
  <?php
  }
  else if($lid==17)
  {
  
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
      
      
     $monitoringdate=$_POST['entrydate'];
     $ondate=date('Y-m-d H:i:s');
     foreach($_POST['GWA'] as $key1=>$value1)
     {
      foreach($_POST['flocation'] as $key=>$value)
      {
       
           $locationid=$value;
           $gwabox=$_POST[$value1]['GWAbox'][$key];
           $sqlday="SELECT * FROM `GroundWaterQuality` WHERE `SamplingDate`='$monitoringdate' and `LocationId`='$locationid' and `SamplingId`='$value1' and `Pid`='$pid'";
           $queryday=$cudb->query($sqlday);
           $cnt=mysqli_num_rows($queryday);
           if($cnt==0)
           {
             $insertnoise="insert into GroundWaterQuality set `SamplingDate`='$monitoringdate',`LocationId`='$locationid',`SamplingId`='$value1',`SamplingValue`='$gwabox',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`OnDate`='$ondate',`GroundType`='C'";
             $result=$cudb->query($insertnoise);
           }
           
         
      }
      
     }
     
     echo "<div class='alert alert-success fade in alert-dismissable'>
           <strong>Success!</strong>Added sucessfully....
           </div>";
           
    }
             
           $flocthtml112='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml112.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml112.='</select>';
      
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
  <h3 class="box-title" style="padding-left:15px;">Ground Water Quality - (C) Parameters Concerning Toxic Substances</h3>
  <div class="thead">
   
   <div class="col-md-6 text-center" style="margin-top:10px;">
      <div class="form-group">
           <input class="form-control" type="date" value="" name="entrydate">
      </div>
   </div>
   
   <table class="table table-striped table-bordered">
    <thead class="thbg">
     <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">Parameters</div>
             <div class="col-md-1">Unit</div>
             <div class="col-md-3">
               <div class="col-md-12">Norms</div>
               <div class="row">
               <div class="col-md-12">
                 <div class="col-md-6">Acceptable Limit</div>
                 <div class="col-md-6">Permissible Limit</div>
                </div>
               </div> 
             </div>
             <div class="col-md-2 "><div class="headcls">GW1</div></div>
             <div class="col-md-2 "><div class="headcls">GW2</div></div>
             <div class="col-md-1 "><div class="headcls">GW3</div></div>
             <div class="col-md-1 "><div class="headcls">GW4</div></div>
             <div class="col-md-1 "><div class="headcls">GW5</div></div>
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
               <div class="col-md-5">Sampling Location</div>
               <div class="col-md-2"><?=$flocthtml112?></div>
               <div class="col-md-2"><?=$flocthtml112?></div>
               <div class="col-md-1"><?=$flocthtml112?></div>
               <div class="col-md-1"><?=$flocthtml112?></div>
               <div class="col-md-1"><?=$flocthtml112?></div>
         </div>
      </div>
      <div class="col-md-12 np mb10">
           <div class="col-md-4">Date of Sampling</div>
      </div>
    </div>
      
      <div class="col-md-12 np mb10">
     
     <?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
      
     ?>
     <div class="col-md-2"><?=$result->constrain_name;?></div>
     <div class="col-md-1"><?=$result->unit_value;?>
     <input type="hidden" class="form-control" name="GWA[]" value="<?=$result->id?>" required="required"> 
     </div>
     <div class="col-md-1"><?=$result->acceptable_limit;?></div>
     <div class="col-md-1"><?=$result->permissible_limit;?></div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" > 
                  </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" > 
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="<?=$result->id?>[GWAbox][]" >  
            </div>
           </div>
           
     <?php
     }
     ?>   
           
   </div>
     
     
  
    </div>
  </tbody>
</table>
 
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
  
  
  
  <?php
  }
  else if($lid==21)
  {
    
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
        
          $date=date('Y-m-d H:i:s');
          $entrydatef=$_POST['entrydate'];
          $flocationf=$_POST['flocation'];
          $filter1f=$_POST['filter1'];
          $filter2f=$_POST['filter2'];
          $dust1f=$_POST['dust1'];
          $dust2f=$_POST['dust2'];
          $freef=$_POST['free'];
          $melf=$_POST['mel'];
          
          for($i=0; $i < count($flocationf); $i++ )
          {
          $locationid = addslashes($flocationf[$i]);
          $entrydate = addslashes($entrydatef[$i]);
          $filter1 = addslashes($filter1f[$i]);
          $filter2 = addslashes($filter2f[$i]);
          $dust1 = addslashes($dust1f[$i]);
          $dust2 = addslashes($dust2f[$i]);
          $free= addslashes($freef[$i]);
          $mel= addslashes($melf[$i]);
          
           $inscllist="INSERT INTO PersonalDust SET Date='$entrydate', LocationId='$locationid', FilterPaperInitial='$filter1',   FilterPaperFinal='$filter2',  DustCollect='$dust1', DustConcentrate='$dust2',   FreeSilica='$free', MEL='$mel', Lid='$lid', Pid='$pid',UserId='$user',OnDate='$date'";
          $res=$cudb->query($inscllist) or die(mysqli_error());
          
          echo "<div class='alert alert-success fade in alert-dismissable'>
            <strong>Success!</strong> list Details Added sucessfully....
          </div>";
          }
          
          
               
          
          
       }
       $flocthtml116='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml116.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml116.='</select>';
            
            
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
  <h3 class="box-title" style="padding-left:15px;">Personal Dust Analysis Report</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
     </div>
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">S.L No</div>
             <div class="col-md-2">Date</div>
             <div class="col-md-2 "><div class="headcls">Location</div></div>
             <div class="col-md-2 "><div class="headcls">Filter Paper Initial Weight (g)</div></div>
             <div class="col-md-1 "><div class="headcls">Filter Paper Final Weight (g)</div></div>
             <div class="col-md-1"><div class="headcls">Dust Collected (g)</div></div>
             <div class="col-md-1"><div class="headcls">Dust Concentration (mg/m3)</div></div>
             <div class="col-md-1"><div class="headcls">Free Silica (%)</div></div>
             <div class="col-md-1"><div class="headcls">MEL (mg/m3)</div></div>
          </div>
      </div>
     </thead>
    
   </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    <div id="field" style="margin-top:0px;">
   
    <div class="col-md-12 np mb10">
     
     <?php
     for($i=1;$i<8;$i++)
     {
     ?>
           <div class="col-md-1"><?=$i?></div>
           <div class="col-md-2">
             <input class="form-control" type="date" value="" name="entrydate[]">
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <?=$flocthtml116?> 
                  </div>
           </div>
           <div class="col-md-2">
                  <div class="form-group">
                             <input type="text" class="form-control" name="filter1[]" > 
                  </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="filter2[]" > 
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="dust1[]" >  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="dust2[]" >  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                       <input type="text" class="form-control" name="free[]" >  
            </div>
           </div>
           <div class="col-md-1">
            <div class="form-group">
                     <input type="text" class="form-control" name="mel[]" value="3.0"  readonly="true">  
            </div>
           </div>
     <?php
     }
     ?>   
           
   </div>
   </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
       
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
  
  
  
  
  <?php
  }
  else if($lid==18)
  {
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
              
              $param=$_POST['param']; 
              $unit=$_POST['unit'];
              $norms=$_POST['norms'];
              $monitoringdate=$_POST['entrydate'];
              $ondate=date('Y-m-d H:i:s');
           
              foreach($_POST['flocation'] as $key=>$value)
              {
               
                   $locationid=$value;
                   $gwabox=$_POST['GWAbox'][$key];
                   
                   $sqlday="SELECT * FROM `GroundWaterQuality1` WHERE `Date`='$monitoringdate' and `LocationId`='$locationid' and `Value`='$gwabox' and `Pid`='$pid'";
                   $queryday=$cudb->query($sqlday);
                   $cnt=mysqli_num_rows($queryday);
                   if($cnt==0)
                   {
                    $insertnoise="insert into GroundWaterQuality1 set `Parameters`='$param',`Unit`='$unit',`Norms`='$norms',`LocationId`='$locationid',`Lid`='$lid',`Pid`='$pid',`UserId`='$user',`Value`='$gwabox',`Date`='$monitoringdate',`OnDate`='$ondate'";
                     $result=$cudb->query($insertnoise);
                   }
                   
                 
              }
            
              echo "<div class='alert alert-success fade in alert-dismissable'>
                 <strong>Success!</strong>Added sucessfully....
                 </div>";
          
      }
      
      $flocthtml114='<select name="flocation[]" class="form-control" id="exampleInputEmail1" class="required"><option>Choose Location To Add Report</option>';
            $sql="SELECT * FROM location WHERE eid=$lid and pid=$pid";
            $query1=$cudb->query($sql) or die(mysql_error());
          while($result=mysqli_fetch_object($query1))
              {
               $flocthtml114.='<option value="'.$result->id.'">'.$result->location.'</option>';
              } 
            $flocthtml114.='</select>';
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
  <h3 class="box-title" style="padding-left:15px;">Ground Water Quality - (D) Bacteriological Quality of Drinking Water</h3>
  <div class="thead">
   <div class="col-md-6 text-center" style="margin-top:10px;">
     <div class="form-group">
       <input class="form-control" type="date" value="" name="entrydate">
     </div>
   </div>
   
   <table class="table table-striped table-bordered">
     <thead class="thbg">
      <div id="field">
          <div class="col-md-12 np mb10">
             <div class="col-md-1">Parameters</div>
             <div class="col-md-1">Unit</div>
             <div class="col-md-1 ">Norms</div>
             <div class="col-md-2 "><div class="headcls">GW1</div></div>
             <div class="col-md-2 "><div class="headcls">GW2</div></div>
             <div class="col-md-2"><div class="headcls">GW3</div></div>
             <div class="col-md-2"><div class="headcls">GW4</div></div>
             <div class="col-md-1"><div class="headcls">GW5</div></div>
          </div>
      </div>
     </thead>
    
   </table>
   
  </div>
       
<div class="tfx"> 
<table class="table table-striped table-bordered">
  
  <tbody> 
  <div class="row">
      
  </div>
    
    
     <div id="field">
      <div id="field0">
          <div class="col-md-12 np mb10">
               <div class="col-md-3"></div>
               <div class="col-md-2"><?=$flocthtml114?></div>
               <div class="col-md-2"><?=$flocthtml114?></div>
               <div class="col-md-2"><?=$flocthtml114?></div>
               <div class="col-md-2"><?=$flocthtml114?></div>
               <div class="col-md-1"><?=$flocthtml114?></div>
         </div>
      </div>
    </div>
    
    <div id="field" style="margin-top:0px;">
   
         <div class="col-md-12 np mb10">
          
                <div class="col-md-1"><input type="hidden" name="param" value="Total Coliform"/>Total Coliform</div>
                <div class="col-md-1"><input type="hidden" name="unit" value="MPN"/>MPN</div>
                <div class="col-md-1"><input type="hidden" name="norms" value="Shall not be detectable in any 100ml sample"/>Shall not be detectable in any 100ml sample</div>
                <div class="col-md-2">
                       <div class="form-group">
                            <input type="text" class="form-control" name="GWAbox[]" > 
                       </div>
                </div>
                <div class="col-md-2">
                 <div class="form-group">
                           <input type="text" class="form-control" name="GWAbox[]"> 
                 </div>
                </div>
                <div class="col-md-2">
                 <div class="form-group">
                           <input type="text" class="form-control" name="GWAbox[]">  
                 </div>
                </div>
                <div class="col-md-2">
                 <div class="form-group">
                            <input type="text" class="form-control" name="GWAbox[]" >     
                 </div>
                </div>
                <div class="col-md-1">
                 <div class="form-group">
                            <input type="text" class="form-control" name="GWAbox[]" >    
                 </div>
                </div>
        </div>
   </div>
    </div>
  </tbody>
</table>
  <div class="form-group">
       
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
  
  <?php          
  }
  ?>
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
        var floct='<?=$flocthtml;?>';
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3">'+floct+'</div><div class="col-md-3"><input class="form-control" id="datepicker'+next+'" type="text" value="" name="entrydate[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="particular_matter[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="remark[]"></div></div></div></div>';
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
        var floct='<?=$flocthtml115;?>';
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3">'+floct+'</div><div class="col-md-3"><input class="form-control" type="text" value="" name="location_code[]"></div><div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div><div class="col-md-2"><input class="form-control" type="text" value="" name="water_level[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="remark[]"></div></div></div></div>';
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
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10 bb"><div class="col-md-1"><input class="form-control" type="date" value="" name="entrydate[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s1[]"  style="line-height: 25px;"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s2[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s3[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s4[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s5[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s6[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s7[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s8[]"></div><div class="col-md-1"><input class="form-control" type="text" value="" name="s9[]"></div><div class="col-md-1"><select name="a10[]" class="form-control mb10"><option value="Iron">Iron</option><option value="Copper">Copper</option><option value="Zinc">Zinc</option><option value="Manganese">Manganese</option></select><input class="form-control" type="text" value="" name="s10[]"></div><div class="col-md-1"><select name="a11[]"  class="form-control mb10"><option value="Calcium">Calcium</option><option value="Magnesium">Magnesium</option><option value="Sodium">Sodium</option><option value="Potassium">Potassium</option></select><input class="form-control" type="text" value="" name="s11[]"></div></div></div>';

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
        var floct='<?=$flocthtml11;?>';
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="col-md-12 np mb10"><div class="col-md-3">'+floct+'</div><div class="col-md-3"><input class="form-control" type="text" value="" name="code[]"></div><div class="col-md-3"><input class="form-control" type="date" value="" name="entrydate[]"></div><div class="col-md-3"><input class="form-control" type="text" value="" name="result[]"></div></div></div></div>';
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

</body>
</html>

