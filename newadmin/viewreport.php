<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$lid=$_GET["lid"];
$pid=$_GET["pid"];
include("logout_chk.php");
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
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
    border: 1px solid #c1ceda;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #c1ceda; text-align:center;
}
.table-bordered > tbody > tr > td{color:#333;}
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
.bgw {background: #fff;}
input#date.wht {
    background: #fff !important;
    color: #000 !important;
}
.form-group {
    margin-bottom: 0px;
}
select#sel1 {
    background: #fff !important;
    color: #000 !important;
}
.ht{    min-height: 765px;}
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
      <h1>Environmental Monitoring<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Clearance Conditions</li>
      </ol>
    </section>

    <!-- Main content -->
       <form action="viewreport.php?lid=<?php echo $lid; ?>&pid=<?php echo $pid; ?>" method="post">
    <div class="form-group col-md-2">
      <label for="inputPassword4" class="blc">From</label>
      <input id="date" type="date" name="formd" value="<?php echo $_POST['formd'] ?>" class="form-control wht" id="inputPassword4">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4" class="blc">To</label>
      <input id="date" name="todate" type="date" value="<?php echo $_POST['todate'] ?>" class="form-control wht" id="inputEmail4" > 
    </div>
    
  
  <div class=" col-md-2">
  <div class="form-group">
  <label for="sel1" class="blc">Location</label>
  <select class="form-control wht"  id="sel1" name="location">
    <option value="">Select Location</option>
    <?php
    $sell="SELECT * FROM location WHERE eid='$lid' AND pid='$pid'";
     $query=$cudb->query($sell) or die(mysqli_error());  
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
    ?>
    <option <?php if($_POST['location']==$result->id) { ?> <?php echo "selected" ?><? } ?> value="<?=$result->id;?>"><?=$result->location;?></option>
    <?php
            }
            ?>
     <option <?php if($_POST['location']=='all') { ?> <?php echo "selected" ?><? } ?> value="all"> All Location  </option>    
  </select>
</div>
  
  
  </div>


  <div class="col-md-2">
    <div class="form-group">
     <br>
    <input type="submit" class="btn btn-primary" name="submit">
  </div>
</div>
  </form>
  <div class="btn btn-primary" onClick="fnExcelReport('fugitive');">Print</div>

    <?php if($lid==1) { ?>
    
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt ht"> 
    <div class="hds"> 
  <h3 class="box-title">Ambinet Air Quality</h3>
  </div>
  
  
  <div class="form-row">
<?php 
if($_REQUEST['location']!='all')
{
 ?>
<h4>Location Name : <?php echo GetName('location', 'location', 'id', $_REQUEST['location']) ?></h4>
<?php
}
?>
   <table class="table table-striped table-bordered" id="fugitive" style="background:#747e97;">
    <thead>
  <tr>   
      <!--<th>Station Code</th>-->
      <!--<th>Location</th>-->
      <th>Sl. No.</th>
      <th>Date</th>
      <th>PM 10 (&#181;g/m<sup>3</sup>)</th>
      <th>PM 2.5 (&#181;g/m<sup>3</sup>)</th>
      <th>SO<sub>2</sub> (&#181;g/m<sup>3</sup>)</th>
      <th>NO<sub>x</sub> (&#181;g/m<sup>3</sup>)</th>
      <th>CO (Mg/m<sup>3</sup>)</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
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

  if($location=='all')
  {
$sql1="SELECT * FROM monitoring_list where env_id=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

  }
  else
  {
  
$sql1="SELECT * FROM monitoring_list WHERE date_entry BETWEEN '".$formd."' and '".$todate."' and  lid=$location and env_id=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 
}
}

else
{
$sql1="SELECT * FROM monitoring_list where env_id=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

}
?>

<?php
     //loop through the page
     
       
        $i=0;$resp=array();
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          $resp['pm10'][]=$result1->pm10;$resp['pm25'][]=$result1->pm25;$resp['so2'][]=$result1->so2;
          $resp['nox'][]=$result1->nox;$resp['co'][]=$result1->co;
        ?>  
<tr>
<!--  <td><?php echo GetName('location', 'station_code', 'id', $result1->lid) ?></td>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>-->
<td><?=$i;?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->pm10; ?></td>
<td><?php echo $result1->pm25; ?></td>
<td><?php echo $result1->so2; ?></td>
<td><?php echo $result1->nox; ?></td>
<td><?php echo $result1->co; ?></td>
<td><?php echo $result1->remark; ?></td>
   </tr>
 <?php } ?>
 <tr>
  <td colspan="2">Maximum</td>
  <td><?=max($resp['pm10']);?></td>
  <td><?=max($resp['pm25']);?></td>
  <td><?=max($resp['so2']);?></td>
  <td><?=max($resp['nox']);?></td>
  <td><?=max($resp['co']);?></td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td colspan="2">Minimum</td>
  <td><?=min($resp['pm10']);?></td>
  <td><?=min($resp['pm25']);?></td>
  <td><?=min($resp['so2']);?></td>
  <td><?=min($resp['nox']);?></td>
  <td><?=min($resp['co']);?></td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td colspan="2">Average</td>
  <td><?=array_sum($resp['pm10'])/$i;?></td>
  <td><?=array_sum($resp['pm25'])/$i;?></td>
  <td><?=array_sum($resp['so2'])/$i;?></td>
  <td><?=array_sum($resp['nox'])/$i;?></td>
  <td><?=array_sum($resp['co'])/$i;?></td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td colspan="2">Standard</td>
  <td>100</td>
  <td>60</td>
  <td>80</td>
  <td>80</td>
  <td>4</td>
  <td>&nbsp;</td>
 </tr>
 </div> 
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <?php } else if($lid==2) { ?>
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt">  
  <h3 class="box-title">Fugitive Emmision</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>   
      <th>Location Name</th>
      <th>Date of Monitoring</th>
      <th>Total Suspended Particulate Matter(TSPM)result in (&#181;g/m3)</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >='$_POST[formd]' and date_entry <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and lid= $_POST[location]";
}
$sql1="SELECT * FROM fugitive where env_id=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->particular_matter; ?></td>
<td><?php echo $result1->remark; ?></td>
   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <?php } else if($lid==6) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Ground Water Level</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>   
      <th>Location Name</th>
      <th>Station Code</th>
      <th>Date Of Measurement</th>
      <th>Depth (meter)</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >='$_POST[formd]' and date_entry <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
    $sql1="SELECT * FROM ground_water_level where lid=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->LocationId) ?></td>
<td><?php echo $result1->StationCode; ?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Depth; ?></td>
<td><?php echo $result1->remark; ?></td>
   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php } else if($lid==8) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
              <!-- /.box-body -->
        <div class="col-md-12 np"> <div class="main-cnt"> 
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and MontoringDate >='$_POST[formd]' and MontoringDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && $_POST['location']!='')
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM WorkZoneNoise where Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();
$timing=array('08:00AM','09:00AM','10:00AM','11:00AM','12:00PM','01:00PM','02:00PM','03:00PM');
while($result1=mysqli_fetch_object($query1))
{
 $resp[$result1->MontoringDate][$result1->LocationId][]=$result1->MonitoringValue;
 $rest[$result1->MontoringDate][$result1->MonitoringTime][$result1->LocationId]=$result1->MonitoringValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->MontoringDate]=$result1->MontoringDate;
 $i=$i+1;
}


?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>

<table class="table table-striped table-bordered" id="fugitive">
 <thead>
  <tr>
   <th colspan="<?=count($loca)+1;?>"><h3>Work Zone Noise Level Monitoring : <?php echo $dval ?> </h3></th>
  </tr>
 </thead>
<thead>
  <tr>   
      <th>Time</th>
      <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
      <th>Location<?=$i;?></th>
      <?php
       }
       ?>
    </tr>
</thead>
<tbody>
<tr>
 <td>Location Name</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td>Date Of Monitoring</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
foreach($timing as $tkey=>$tval)
{
?>
<tr>
 <td><?=$tval;?></td>
  <?php
   foreach($loca as $key=>$value)
  {
   ?>
  <td><?php echo $rest[$dval][$tval][$value] ?></td>
  <?php
  }
 ?>
</tr>
<?php
}
?>
</tbody>
</table>

<?php
}
?>
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
 <?php } else if($lid==7) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  
    
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and MontoringDate >='$_POST[formd]' and MontoringDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM AmbientNoiseDay where Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();
$timing=array('06:00AM-07:00AM','07:00AM-08:00AM','08:00AM-09:00AM','09:00AM-10:00AM','10:00AM-11:00AM','11:00AM-12:00PM','12:00AM-01:00PM','01:00PM-02:00PM','02:00PM-03:00PM','03:00PM-04:00PM','04:00PM-05:00PM','05:00PM-06:00PM','06:00PM-07:00PM','07:00PM-08:00PM','08:00PM-09:00PM','09:00PM-10:00PM');
while($result1=mysqli_fetch_object($query1))
{
 $resp[$result1->MontoringDate][$result1->LocationId][]=$result1->MonitoringValue;
 $rest[$result1->MontoringDate][$result1->MonitoringTime][$result1->LocationId]=$result1->MonitoringValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->MontoringDate]=$result1->MontoringDate;
 $i=$i+1;
}


?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>

<table class="table table-striped table-bordered" id="fugitive">
 <thead>
  <tr>
   <th colspan="<?=count($loca)+2;?>"><h3>Ambient Noise Level Monitoring (Day Time) : <?php echo $dval ?> </h3></th>
  </tr>
 </thead>
<thead>
  <tr>   
      <th>Sl No</th>
      <th>Time</th>
      <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
      <th>Location<?=$i;?></th>
      <?php
       }
       ?>
    </tr>
</thead>
<tbody>
<tr>
 <td colspan="2">Location Name</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="2">Date Of Monitoring</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
foreach($timing as $tkey=>$tval)
{
?>
<tr>
 <td><?=$tkey+1;?></td>
 <td><?=$tval;?></td>
  <?php
   foreach($loca as $key=>$value)
  {
   ?>
  <td><?php echo $rest[$dval][$tval][$value] ?></td>
  <?php
  }
 ?>
</tr>
<?php
}
?>
<tr>
 <td>&nbsp;</td>
 <td>Maximum</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=max($resp[$dval][$value]);?></td>
 <?php
 }
 ?>
</tr>
<tr>
 <td>&nbsp;</td>
 <td>Minimum</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=min($resp[$dval][$value]);?></td>
 <?php
 }
 ?>
</tr>
<tr>
 <td>&nbsp;</td>
 <td>Logarithmic Avg</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=array_sum($resp[$dval][$value])/count($resp[$dval][$value])?></td>
 <?php
 }
 ?>
</tr>
</tbody>
</table>

<?php
}
?>
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
 <?php }
 else if($lid==14) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  
    
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and MontoringDate >='$_POST[formd]' and MontoringDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM AmbientNoiseNight where Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();
$timing=array('10:00PM-11:00PM','11:00PM-12:00AM','12:00AM-01:00AM','01:00AM-02:00AM','02:00AM-03:00AM','03:00AM-04:00AM','04:00AM-05:00AM','05:00AM-06:00AM');
while($result1=mysqli_fetch_object($query1))
{
 $resp[$result1->MontoringDate][$result1->LocationId][]=$result1->MonitoringValue;
 $rest[$result1->MontoringDate][$result1->MonitoringTime][$result1->LocationId]=$result1->MonitoringValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->MontoringDate]=$result1->MontoringDate;
 $i=$i+1;
}


?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>

<table class="table table-striped table-bordered" id="fugitive">
 <thead>
  <tr>
   <th colspan="<?=count($loca)+2;?>"><h3>Ambient Noise Level Monitoring (Night Time) : <?php echo $dval ?> </h3></th>
  </tr>
 </thead>
<thead>
  <tr>   
      <th>Sl No</th>
      <th>Time</th>
      <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
      <th>Location<?=$i;?></th>
      <?php
       }
       ?>
    </tr>
</thead>
<tbody>
<tr>
 <td colspan="2">Location Name</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="2">Date Of Monitoring</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
foreach($timing as $tkey=>$tval)
{
?>
<tr>
 <td><?=$tkey+1;?></td>
 <td><?=$tval;?></td>
  <?php
   foreach($loca as $key=>$value)
  {
   ?>
  <td><?php echo $rest[$dval][$tval][$value] ?></td>
  <?php
  }
 ?>
</tr>
<?php
}
?>
<tr>
 <td>&nbsp;</td>
 <td>Maximum</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=max($resp[$dval][$value]);?></td>
 <?php
 }
 ?>
</tr>
<tr>
 <td>&nbsp;</td>
 <td>Minimum</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=min($resp[$dval][$value]);?></td>
 <?php
 }
 ?>
</tr>
<tr>
 <td>&nbsp;</td>
 <td>Logarithmic Avg</td>
 <?php
 foreach($loca as $key=>$value)
 {
 ?>
 <td><?=array_sum($resp[$dval][$value])/count($resp[$dval][$value])?></td>
 <?php
 }
 ?>
</tr>
</tbody>
</table>

<?php
}
?>
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
 <?php }
  else if($lid==5) { ?>
<section class="content">
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
              <!-- /.box-body -->
        <div class="col-md-12 np"> <div class="main-cnt"> 
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and SamplingDate >='$_POST[formd]' and SamplingDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM SurfaceWaterAnalysis where Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();

while($result1=mysqli_fetch_object($query1))
{
 $resp[$result1->SamplingDate][$result1->LocationId][]=$result1->SamplingValue;
 $rest[$result1->SamplingDate][$result1->SamplingId][$result1->LocationId]=$result1->SamplingValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->SamplingDate]=$result1->SamplingDate;
 $i=$i+1;
}
?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>

<table class="table table-striped table-bordered" id="fugitive">
 <thead>
  <tr>
   <th colspan="<?=count($loca)+2;?>"><h3>Results Of Surface Water Analysis : <?php echo $dval ?> </h3></th>
  </tr>
 </thead>
<thead>
  <tr>   
      <th>Parameters</th>
      <th>Unit</th>
      <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
      <th>SW<?=$i;?></th>
      <?php
       }
       ?>
    </tr>
</thead>
<tbody>
<tr>
 <td colspan="2">Sampling Location</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="2">Date Of Sampling</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
$sqll="SELECT * FROM `max_permissible` WHERE `lid`='$lid' and `is_delete`=0";
$queryy=$cudb->query($sqll);
while($result=mysqli_fetch_array($queryy))
     {
?>
<tr>
 <td><?=$result['constrain_name']?></td>
 <td><?=$result['unit_value']?></td>
  <?php
   foreach($loca as $key=>$value)
  {
   ?>
  <td><?php echo $rest[$dval][$result['id']][$value] ?></td>
  <?php
  }
 ?>
</tr>
<?php
}
?>
</tbody>
</table>

<?php
}
?>
 </div>
 
  
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <?php }else if($lid==15) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Result of Flow of Water Measurement</h3>
   <table class="table table-striped table-bordered" id="fugitive" >
    <thead>
  <tr>
      <th>Location Name</th>
      <th>Station Code</th>
      <th>Date of Measurement</th>
      <th>Result in(m<sup>3</sup>/min)</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and DateofMeasurement >='$_POST[formd]' and DateofMeasurement <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and lid= $_POST[location]";
}

$sql1="SELECT * FROM FlowWaterMeasurement where Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->LocationId) ?></td>
<td><?php echo $result1->StationCode; ?></td>
<td><?php echo date('d-m-y',strtotime($result1->DateofMeasurement)); ?></td>
<td><?php echo $result1->Result; ?></td>
   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php } else if($lid==4) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np">
         <div class="main-cnt">
          <h3 class="box-title">Ground Water Quality - (A) Organoleptic and Physical Parameters</h3>
 <?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and SamplingDate >='$_POST[formd]' and SamplingDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM GroundWaterQuality where GroundType='A' and Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();

while($result1=mysqli_fetch_object($query1))
{
 $rest[$result1->SamplingDate][$result1->SamplingId][$result1->LocationId]=$result1->SamplingValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->SamplingDate]=$result1->SamplingDate;
 $i=$i+1;
}
?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th colspan="<?=count($loca)+4;?>"><h3>Date : <?=$dval;?></h3></th>
  </tr>
  <tr>
   <th rowspan="2">Parameter</th>
   <th rowspan="2">Unit </th>
   <th colspan="2">Norms</th>
   <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
     <th rowspan="2">GW<?=$i;?></th>
      <?php
       }
       ?>
  </tr>
  <tr>
      <th>Acceptable Limit</th>
      <th>Permissible Limit</th>
  </tr>
    </thead>
<tbody>
 <tr>
 <td colspan="4">Sampling Location</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="4">Date Of Sampling</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
     ?>
<tr>
<td><?=$result->constrain_name;?></td>
<td><?=$result->unit_value;?></td>
<td><?=$result->acceptable_limit;?></td>
<td><?=$result->permissible_limit;?></td>
<?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?=$rest[$dval][$result->id][$value]?></td>
<?php
 }
 ?>
   </tr>
<?php
     }
     ?>
</tbody>
</table>
   <?php
}
?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
       </div>
    </section>
    <!-- /.content -->
 <?php }
 else if($lid==16) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np">
         <div class="main-cnt">
          <h3 class="box-title">Ground Water Quality - (B) General Parameters Concerning substances Undesirable in Excessive Amounts : </h3>
 <?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and SamplingDate >='$_POST[formd]' and SamplingDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM GroundWaterQuality where GroundType='B' and Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();

while($result1=mysqli_fetch_object($query1))
{
 $rest[$result1->SamplingDate][$result1->SamplingId][$result1->LocationId]=$result1->SamplingValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->SamplingDate]=$result1->SamplingDate;
 $i=$i+1;
}
?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th colspan="<?=count($loca)+4;?>"><h3>Date : <?=$dval;?></h3></th>
  </tr>
  <tr>
   <th rowspan="2">Parameter</th>
   <th rowspan="2">Unit </th>
   <th colspan="2">Norms</th>
   <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
     <th rowspan="2">GW<?=$i;?></th>
      <?php
       }
       ?>
  </tr>
  <tr>
      <th>Acceptable Limit</th>
      <th>Permissible Limit</th>
  </tr>
    </thead>
<tbody>
 <tr>
 <td colspan="4">Sampling Location</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="4">Date Of Sampling</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
     ?>
<tr>
<td><?=$result->constrain_name;?></td>
<td><?=$result->unit_value;?></td>
<td><?=$result->acceptable_limit;?></td>
<td><?=$result->permissible_limit;?></td>
<?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?=$rest[$dval][$result->id][$value]?></td>
<?php
 }
 ?>
   </tr>
<?php
     }
     ?>
</tbody>
</table>
   <?php
}
?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
       </div>
    </section>
    <!-- /.content -->
 <?php }
 else if($lid==17) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np">
         <div class="main-cnt">
          <h3 class="box-title">Ground Water Quality - (C) Parameters Concerning Toxic Substances</h3>
 <?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and SamplingDate >='$_POST[formd]' and SamplingDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM GroundWaterQuality where GroundType='C' and Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();

while($result1=mysqli_fetch_object($query1))
{
 $rest[$result1->SamplingDate][$result1->SamplingId][$result1->LocationId]=$result1->SamplingValue;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->SamplingDate]=$result1->SamplingDate;
 $i=$i+1;
}
?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th colspan="<?=count($loca)+4;?>"><h3>Date : <?=$dval;?></h3></th>
  </tr>
  <tr>
   <th rowspan="2">Parameter</th>
   <th rowspan="2">Unit </th>
   <th colspan="2">Norms</th>
   <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
     <th rowspan="2">GW<?=$i;?></th>
      <?php
       }
       ?>
  </tr>
  <tr>
      <th>Acceptable Limit</th>
      <th>Permissible Limit</th>
  </tr>
    </thead>
<tbody>
 <tr>
 <td colspan="4">Sampling Location</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="4">Date Of Sampling</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>
<?php
     $sql="SELECT * FROM max_permissible WHERE lid=$lid and is_delete=0";
     $query1=$cudb->query($sql) or die(mysql_error());
     while($result=mysqli_fetch_object($query1))
     {
     ?>
<tr>
<td><?=$result->constrain_name;?></td>
<td><?=$result->unit_value;?></td>
<td><?=$result->acceptable_limit;?></td>
<td><?=$result->permissible_limit;?></td>
<?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?=$rest[$dval][$result->id][$value]?></td>
<?php
 }
 ?>
   </tr>
<?php
     }
     ?>
</tbody>
</table>
   <?php
}
?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
       </div>
    </section>
    <!-- /.content -->
 <?php }
 else if($lid==18) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np">
         <div class="main-cnt">
          <h3 class="box-title">Ground Water Quality - (D) Bacteriological Quality of Drinking Water :</h3>
 <?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and Date >='$_POST[formd]' and SamplingDate <='$_POST[todate]'";
  
}
if(isset($_POST['location']) && ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
$sql1="SELECT * FROM GroundWaterQuality1 where  Lid=$lid and Pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
$i=0;
$rest=array();$resp==$loca=$datadate=array();

while($result1=mysqli_fetch_object($query1))
{
 $rest[$result1->Date][$result1->LocationId]=$result1->Value;
 $loca[$result1->LocationId]=$result1->LocationId;
 $datadate[$result1->Date]=$result1->Date;
 $i=$i+1;
}
?>  

<?php
foreach($datadate as $dkey=>$dval)
{
?>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th colspan="<?=count($loca)+3;?>"><h3>Date : <?=$dval;?></h3></th>
  </tr>
  <tr>
   <th>Parameter</th>
   <th>Unit </th>
   <th>Norms</th>
   <?php
      $i=0;
        foreach($loca as $key=>$value)
       {
        $i++;
        ?>
     <th>GW<?=$i;?></th>
      <?php
       }
       ?>
  </tr>
    </thead>
<tbody>
 <tr>
 <td colspan="3">Sampling Location</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo GetName('location', 'location', 'id', $value) ?></td>
<?php
}
 ?>
</tr>
<tr>
 <td colspan="3">Date Of Sampling</td>
 <?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?php echo $dval ?></td>
<?php
}
 ?>
</tr>

<tr>
<td>Total Coliform</td>
<td>MPN</td>
<td>Shall not be detectable in any 100ml sample</td>
<?php
 foreach($loca as $key=>$value)
{
 ?>
<td><?=$rest[$dval][$value]?></td>
<?php
 }
 ?>
   </tr>
</tbody>
</table>
   <?php
}
?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
       </div>
    </section>
    <!-- /.content -->
 <?php }
 if($lid==21) { ?>
    
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt ht"> 
    <div class="hds"> 
  <h3 class="box-title">Personal Dust Analysis Report</h3>
  </div>
  
  
  <div class="form-row">
   <table class="table table-striped table-bordered" id="fugitive" style="background:#747e97;">
    <thead>
  <tr>   
      <th>Sl. No.</th>
      <th>Date</th>
      <th>Location</th>
      <th>Filter Paper Initial Weight(g)</th>
      <th>Filter Paper Final Weight(g)</th>
      <th>Dust Collected(g)</th>
      <th>Dust Concentration(mg/m<sup>3</sup>)</th>
      <th>Free Silica(%)</th>
      <th>MEL(mg/m3)</th>
    </tr>
    </thead>
    
  
  
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

  if($location=='all')
  {
$sql1="SELECT * FROM PersonalDust where Lid=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

  }
  else
  {
  
$sql1="SELECT * FROM PersonalDust WHERE Date BETWEEN '".$formd."' and '".$todate."' and  LocationId=$location and Lid=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 
}
}
else
{
$sql1="SELECT * FROM PersonalDust where Lid=$lid and pid=$pid";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

}
?>

<?php
     //loop through the page
     
       
        $i=0;$resp=array();
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
        ?>  
<tr>
<td><?=$i;?></td>
<td><?php echo date('d-m-y',strtotime($result1->Date)); ?></td>
<td><?php echo GetName('location', 'location', 'id', $result1->LocationId) ?></td>
<td><?php echo $result1->FilterPaperInitial; ?></td>
<td><?php echo $result1->FilterPaperFinal; ?></td>
<td><?php echo $result1->DustCollect; ?></td>
<td><?php echo $result1->DustConcentrate; ?></td>
<td><?php echo $result1->FreeSilica; ?></td>
<td><?php echo $result1->MEL; ?></td>
   </tr>
 <?php } ?>
 </div> 
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <?php }
 else if($lid==12) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Vehicular Emission</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
    <tr>
      <th rowspan="2">NO. OF VEHICLES MONITORED</th>
      <th colspan="2">SMOKE (HSU)</th>
      <th colspan="2">HC (PPM)</th>
      <th colspan="2">NOX (%)</th>
      <th colspan="2">CO (%)</th>
    </tr>
    <tr>
     <th>MIN</th>
     <th>MAX</th>
     <th>MIN</th>
     <th>MAX</th>
     <th>MIN</th>
     <th>MAX</th>
     <th>MIN</th>
     <th>MAX</th>
    </tr>
    </thead>
    
  

  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >='$_POST[formd]' and date_entry <='$_POST[todate]'";
  
}
if(isset($_POST['location'])&& ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and LocationId= $_POST[location]";
}
    $sql1="SELECT * FROM VehicularEmission where lid=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo $result1->NoofVehicle; ?></td>
<td><?php echo $result1->SmokeMin; ?></td>
<td><?php echo $result1->SmokeMax; ?></td>
<td><?php echo $result1->HCMin; ?></td>
<td><?php echo $result1->HCMax; ?></td>
<td><?php echo $result1->NOXMin; ?></td>
<td><?php echo $result1->NOXMax; ?></td>
<td><?php echo $result1->COMin; ?></td>
<td><?php echo $result1->COMax; ?></td>
   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php } else if($lid==13) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">PDS</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
		<th>Sl No</th>
      <th>Location</th>
      <th>Name of The Worker</th>
      <th>Designation </th>
     <th>Dust Concentration (mg/m<sup>3</sup>)</th>
	 <th>Free Silica (%)</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location'])&& ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and lid= $_POST[location]";
}

    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->FreeSilica; ?></td>
<td><?php echo $result1->date_entry; ?></td>
<td><?php echo $result1->FreeSilica; ?></td>
<td><?php echo $result1->date_entry; ?></td>
   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php } else if($lid==13) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">PDS</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th>Location</th>
      <th>Date</th>
      <th>FreeSilica </th>
     
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location'])&& ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and lid= $_POST[location]";
}

    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->FreeSilica; ?></td>


   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php } else if($lid==13) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">PDS</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th>Location</th>
      <th>Date</th>
      <th>FreeSilica </th>
     
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location'])&& ! ($_POST['location']=='all'|| $_POST['location']==''))
{
   $quy_con.= " and lid= $_POST[location]";
}
    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con";
$query1=$cudb->query($sql1) or die(mysqli_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->FreeSilica; ?></td>


   </tr>
 <?php } ?>
 </div>
 
  </tbody>
</table> 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php }  ?>    
 
    
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
<script src="dist/js/exceldownload.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/tableFixer.js"></script>
<script>

    
    $( document ).ready(function() {
  $("#fugitive").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>

<style>
.table-striped > tbody > tr:nth-of-type(2n+1) {
    background: #fff !important;
}
 </style>
 <script>
 $(document).ready(function() {
$("#pfilter").change(function () {
    var prid = $(this).val();
   window.location.replace("viewcl.php?prid='"+prid+"'");
   
});

$("#cfilter").change(function () {
    var clid = $(this).val();
    var pid2= $("#pfilter").val();
    console.log(pid2);
   window.location.replace("viewcl.php?clid='"+clid+"'"+"&pid2="+pid2);
});
});  

 </script>

</body>
</html>
