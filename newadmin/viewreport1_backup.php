<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
$lid=$_GET["lid"];
$pid=$_GET["pid"];
include("user_logout_chk.php");
if($_COOKIE['usr'])
{
	$user=$_COOKIE["usr"];
}
else
{
	$user=$_SESSION["UsrID"];
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

  <?php include_once('userheader.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

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
       <form action="viewreport1.php?lid=<?php echo $lid; ?>&pid=<?php echo $pid; ?>" method="post">
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
<?php /* ?> <form action="viewreport.php?lid=<?php echo $lid; ?>&pid=<?php echo $pid; ?>" method="post">
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
    <?php */ ?>

   <table class="table table-striped table-bordered" id="fugitive" style="background:#747e97;">
    <thead>
  <tr>   
      <th>Station Code</th>
      <th>Location</th>
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
$sql1="SELECT * FROM monitoring_list where env_id=$lid and pid=$pid and userid=$user";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

  }
  else
  {
  
$sql1="SELECT * FROM monitoring_list WHERE date_entry BETWEEN '".$formd."' and '".$todate."' and  lid=$location and pid=$pid and userid=$user";
$query1=$cudb->query($sql1) or die(mysqli_error()); 
}
}

else
{
$sql1="SELECT * FROM monitoring_list where env_id=$lid and pid=$pid and userid=$user";
$query1=$cudb->query($sql1) or die(mysqli_error()); 

}
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result1=mysqli_fetch_object($query1))
            {
          
          $i=$i+1;
          
        ?>  
<tr>
  <td><?php echo GetName('location', 'station_code', 'id', $result1->lid); ?></td>
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->pm10; ?></td>
<td><?php echo $result1->pm25; ?></td>
<td><?php echo $result1->so2; ?></td>
<td><?php echo $result1->nox; ?></td>
<td><?php echo $result1->co; ?></td>
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
      <th>Location</th>
      <th>Date</th>
      <th>Station Code</th>
     
      <th>Particular Matter</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location']))
{
   $quy_con.= " and lid= $_POST[location]";
}
$sql1="SELECT * FROM fugitive where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->station_code; ?></td>

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
	  <th>Sl No</th>
      <th>Location</th>
      <th>Date</th>
      <th>Station Code</th>
      <th>Depth (m)</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location']))
{
   $quy_con.= " and lid= $_POST[location]";
}
    $sql1="SELECT * FROM ground_water_level where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo GetName('location', 'location', 'id', $result1->lid); ?></td>
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->location_code; ?></td>
<td><?php echo $result1->latitude; ?></td>
<td><?php echo $result1->water_level; ?></td>
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
  <h3 class="box-title">Work Zone Noice Monitoring</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>   
      <th>Sl No</th>
      <th>Time</th>
      <th>WZNL 1 <br /> Date</th>
      <th>WZNL 2 <br /> Date</th>
	  <th>WZNL 3 <br /> Date</th>
	  <th>WZNL 4 <br /> Date</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php 
    $sql1="SELECT * FROM work_zone_noise where env_id=$lid and pid=$pid and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->level; ?></td>
<td><?php echo $result1->time_of; ?></td>
<td><?php echo $result1->dba; ?></td>
<td><?php echo $result1->dba; ?></td>
<td><?php echo $result1->dba; ?></td>
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
 
 <?php } else if($lid==7) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Work Ambient Noise</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>   
      <th>Sl No</th>
      <th>Time</th>
      <th>N1 <br /> Date</th>
      <th>N2 <br /> Date</th>
	  <th>N3 <br /> Date</th>
	  <th>N4 <br /> Date</th>
      <th>Remark</th>
    </tr>
    </thead>
    
  
  
<?php 
    $sql1="SELECT * FROM ambientnoise where env_id=$lid and pid=$pid and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Typeofarea; ?></td>
<td><?php echo $result1->Night; ?></td>
<td><?php echo $result1->Day; ?></td>
<td><?php echo $result1->Day; ?></td>
<td><?php echo $result1->Day; ?></td>
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
 <?php } else if($lid==9) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> 

<div class="main-cnt"> 

  <h3 class="box-title">Soil Quality</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  
	<tr>
		<th rowspan="2">Sl.No</th>
		<th rowspan="2" colspan="2">Parameters</th>
		<th rowspan="2">Unit</th>
		<th>S1</th>
		<th>S2</th>
		<th>S3</th>
		<th>S4</th>
	</tr>
	<tr>
		<th>Date</th>
		<th>Date</th>
		<th>Date</th>
		<th>Date</th>
		
	</tr>
    </thead>
	
	<tr>
		<td>1</td>
		<td colspan="2">Soil Colour</td>
		<td>-</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>2</td>
		<td colspan="2">Soil Texture</td>
		<td>-</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>3</td>
		<td colspan="2">pH</td>
		<td>-</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>4</td>
		<td colspan="2">Electrical Conductivity</td>
		<td>µmhos/cm</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>5</td>
		<td colspan="2">Organic Carbon</td>
		<td>%</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>6</td>
		<td colspan="2">Organic Matter</td>
		<td>%</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>7</td>
		<td colspan="2">Available Nitrogen </td>
		<td>Kg/ha</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>8</td>
		<td colspan="2">Available Phosphorous</td>
		<td>Kg/ha</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>9</td>
		<td colspan="2">Available Potassium</td>
		<td>Kg/ha</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td rowspan="4">10</td>
		<td rowspan="4">Micro Nutrients</td>
		<td>Iron</td>
		<td>mg/kg</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		
		<td>Copper</td>
		<td>mg/kg</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		
		<td>Zinc</td>
		<td>mg/kg</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		
		<td>Manganese</td>
		<td>mg/kg</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td rowspan="9">11</td>
		<td rowspan="9">Exchangable Cations</td>
		<td rowspan "2">Calcium</td>
		<td>meq/100gm</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>% Contribution*</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td rowspan="2">Magnesium</td>
		<td>meq/100gm</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>% Contribution*</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td rowspan="2">Sodium</td>
		<td>meq/100gm</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>% Contribution*</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td rowspan="2">Potasium</td>
		<td>meq/100gm</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>% Contribution*</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2">Total Bases</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	

    
  
  
<?php 
    $sql1="SELECT * FROM soilquality where env_id=$lid and pid=$pid and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->SoilColour; ?></td>
<td><?php echo $result1->SoilTexture; ?></td>
<td><?php echo $result1->PH; ?></td>
<td><?php echo $result1->ElectricalConductivity; ?></td>
<td><?php echo $result1->OrganicCarbon; ?></td>
<td><?php echo $result1->OrganicMatter; ?></td>
<td><?php echo $result1->AvailableNitrogen; ?></td>
<td><?php echo $result1->AvailablePhosphorous; ?></td>
<td><?php echo $result1->AvailablePotassium; ?></td>
<td><?php echo $result1->Micronutriant; ?></td>
<td><?php echo $result1->MValue; ?></td>
<td><?php echo $result1->ExchangeableCations; ?></td>
<td><?php echo $result1->EValue; ?></td>
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
 <?php } else if($lid==3) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Surface Water Quality Monitoring</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th>Sl.No</th>
      <th>Parameters</th>
      <th>Unit</th>
      <th>SW1</th>
      <th>SW2</th>
      <th>SW3</th>
      <th>SW4</th>
    </tr>
    </thead>
    <tr>
    <td>1</td>
    <td>Color</td>
    <td>Hazen</td>
	<td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>2</td>
    <td>Odour</td>
	<td>Unobjectionable</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>3</td>
    <td>Suspended Solids</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>4</td>
    <td>Turbidity</td>
    <td>NTU</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>5</td>
    <td>pH value</td>
    <td>--</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>6</td>
    <td>Temperature</td>
    <td><sup>0</sup>C</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>7</td>
    <td>Oil & Grease</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>8</td>
    <td>Ammonia nitrogen(as N)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>9</td>
    <td>Total Kj. Nitrogen(as NH<sub>3</sub>)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>10</td>
    <td>Total Hardness (as CaCO<sub>3</sub>)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>11</td>
    <td>Iron (as Fe)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>12</td>
    <td>Chloride (as Cl)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>13</td>
    <td>Fluoride (as F)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>14</td>
    <td>Total Dissolved Solids</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>15</td>
    <td>Calcium (as Ca)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>16</td>
    <td>Magnesium (as Mg)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>17</td>
    <td>Copper(as Cu)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>18</td>
    <td>Nickel (as Ni)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>19</td>
    <td>Manganese (as Mn)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>20</td>
    <td>Sulfate (as SO4)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>21</td>
    <td>Nitrate (as NO3)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>22</td>
    <td>Sulfide (as S)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>23</td>
    <td>Phenolic Compounds (as C6H5OH)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>24</td>
    <td>Mercury (as Hg)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>25</td>
    <td>Vanadium
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>26</td>
    <td>Cadmium (as Cd)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>27</td>
    <td>Chromium(VI)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>28</td>
    <td>Total Chromium
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  <tr>
    <td>29</td>
    <td>Selenium (as Se)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>30</td>
    <td>Arsenic (as As)

</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>31</td>
    <td>Cyanide (as CN)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>32</td>
    <td>Lead (as Pb)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>33</td>
    <td>Zinc (as Zn)</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>34</td>
    <td>Anionic Detergent as MBAS
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>35</td>
    <td>Alkalinity (as CaCO3)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>36</td>
    <td>Free Ammonia (N)
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>37</td>
    <td>Bioassay Test
</td>
    <td>%</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>38</td>
    <td>Coli form Organism
</td>
    <td>MPN/100ml
</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>39</td>
    <td>Total Residual Chlorine
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  <tr>
    <td>40</td>
    <td>Nitrate Nitrogen</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>41</td>
    <td>Dissolved Oxygen as O2
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>42</td>
    <td>BOD, 3 days at 270C
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>43</td>
    <td>COD
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>44</td>
    <td>Electrical Conductivity(EC)
</td>
    <td>µmhos/cm
</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
   <tr>
    <td>45</td>
    <td>Phosphate
</td>
    <td>mg/l</td>
    <td> </td>
    <td> </td>
    <td>  </td>
    <td> </td>
  </tr>
  
  
  
  
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location']))
{
   $quy_con.= " and lid= $_POST[location]";
}
    $sql1="SELECT * FROM surfacewaterqualitymonitering where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->ParameterName; ?></td>
<td><?php echo $result1->ClassA; ?></td>
<td><?php echo $result1->ClassB; ?></td>
<td><?php echo $result1->ClassC; ?></td>
<td><?php echo $result1->ClassD; ?></td>
<td><?php echo $result1->ClassE; ?></td>

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
<?php } else if($lid==5) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Surface Water Flow Measurement</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
		<th>Sl No</th>
		<th>Station Code </th>
      <th>Location Name</th>
      <th>Date</th>
      <th>Discharge</th>
	  <th>Remark </th>
    </tr>
    </thead>
    
  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location']))
{
   $quy_con.= " and lid= $_POST[location]";
}
    $sql1="SELECT * FROM flowofwatermeasurement where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->StationCode; ?></td>
<td><?php echo $result1->Latitude; ?></td>
<td><?php echo $result1->Longitude; ?></td>
<td><?php echo $result1->FlowofWater; ?></td>

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
<?php } else if($lid==5) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Ground Water Quality</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
      <th>Location</th>
      <th>Date</th>
      <th>Station Code </th>
      <th>Latitude </th>
      <th>Longitude </th>
      <th>Flow of Water </th>
    </tr>
    </thead>
    
  
  
<?php

    $sql1="SELECT * FROM flowofwatermeasurement where env_id=$lid and pid=$pid and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->StationCode; ?></td>
<td><?php echo $result1->Latitude; ?></td>
<td><?php echo $result1->Longitude; ?></td>
<td><?php echo $result1->FlowofWater; ?></td>

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

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Ground Water Quality</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
     
      <th>Parameter</th>
      <th>Unit </th>
	  <th>Acceptable Limit</th>
      <th>Permissible Limit</th>
      <th>GW1</th>
      <th>GW2</th>
      <th>GW3</th>
      <th>GW4</th>
      <th>GW5</th>
    </tr>
    </thead>
    
  <tr>
  		<td>Color, max</td>
		<td>Hazen</td>
		<td>5</td>
		<td>15</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Odour</td>
		<td></td>
		<td>Agreeable</td>
		<td>Agreeable</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>pH value</td>
		<td>-</td>
		<td>6.5-8.5</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Taste</td>
		<td></td>
		<td>Agreeable</td>
		<td>Agreeable</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Trubidity,max</td>
		<td>NTU</td>
		<td>1</td>
		<td>5</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Total Dissolved Solids,max</td>
		<td>mg/l</td>
		<td>500</td>
		<td>2000</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Aluminium,max</td>
		<td>mg/l</td>
		<td>0.03</td>
		<td>0.2</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Anionic Detergents,max</td>
		<td>mg/l</td>
		<td>0.2</td>
		<td>0.1</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Barium,max</td>
		<td>mg/l</td>
		<td>0.7</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Boron,max</td>
		<td>mg/l</td>
		<td>0.5</td>
		<td>1</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Calcium,max</td>
		<td>mg/l</td>
		<td>75</td>
		<td>200</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Chloride,max</td>
		<td>mg/l</td>
		<td>250</td>
		<td>1000</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Copper,max</td>
		<td>mg/l</td>
		<td>0.05</td>
		<td>1.5</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Fluoride,max</td>
		<td>mg/l</td>
		<td>1</td>
		<td>1.5</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Free Residual Chlorine,min</td>
		<td>mg/l</td>
		<td>0.2</td>
		<td>1</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Iron,max</td>
		<td>mg/l</td>
		<td>0.3</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Magnesium,max</td>
		<td>mg/l</td>
		<td>30</td>
		<td>100</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Manganese,max</td>
		<td>mg/l</td>
		<td>0.1</td>
		<td>0.3</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Mineral Oil,max</td>
		<td>mg/l</td>
		<td>0.5</td>
		<td>No relaxasation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Nitrate,max</td>
		<td>mg/l</td>
		<td>45</td>
		<td>200</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Phenolic compound,max</td>
		<td>mg/l</td>
		<td>0.001</td>
		<td>0.002</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Selenium,max</td>
		<td>mg/l</td>
		<td>0.01</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Sulphate,max</td>
		<td>mg/l</td>
		<td>200</td>
		<td>400</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Sulphide,max</td>
		<td>mg/l</td>
		<td>0.05</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Total Alkalinity,max</td>
		<td>mg/l</td>
		<td>200</td>
		<td>600</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Zinc,max</td>
		<td>mg/l</td>
		<td>5</td>
		<td>15</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Cadmium,max</td>
		<td>mg/l</td>
		<td>0.003</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
   <tr>
  		<td>Cynaide,max</td>
		<td>mg/l</td>
		<td>0.05</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Lead,max</td>
		<td>mg/l</td>
		<td>0.01</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Mercury,max</td>
		<td>mg/l</td>
		<td>0.001</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Molybednum,max</td>
		<td>mg/l</td>
		<td>0.07</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Nickel,max</td>
		<td>mg/l</td>
		<td>0.02</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Polychlorinated,max</td>
		<td>mg/l</td>
		<td>0.0005</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Polynuclear aromatic hydrocarbons(as PAH),max</td>
		<td>mg/l</td>
		<td>0.0001</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Total Arsenic,max</td>
		<td>mg/l</td>
		<td>0.01</td>
		<td>0.05</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Total Chromium,max</td>
		<td>mg/l</td>
		<td>0.05</td>
		<td>No relaxsation</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
  <tr>
  		<td>Hexavalent Chromuim</td>
		<td>mg/l</td>
		<td>$</td>
		<td>$</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>
 
 <tr>
  		<td>Total Coliform</td>
		<td>MPN</td>
		<td colspan="2">Shall not be detectable in any 100ml sample</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  </tr>

  
  
<?php
$quy_con='';
if((isset($_POST['formd'])&&$_POST['formd']!='')&& (isset($_POST['todate'])&&$_POST['todate']!='')){
  $quy_con.=  " and date_entry >=$_POST[formd] and date_entry <=$_POST[todate]";
  
}
if(isset($_POST['location']))
{
   $quy_con.= " and lid= $_POST[location]";
}
    $sql1="SELECT * FROM groundwaterqualitymonitering where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Parameter; ?></td>
<td><?php echo $result1->Unit; ?></td>
<td><?php echo $result1->PermissibleUnit; ?></td>
<td><?php echo $result1->GW1; ?></td>
<td><?php echo $result1->GW2; ?></td>
<td><?php echo $result1->GW3; ?></td>
<td><?php echo $result1->GW4; ?></td>
<td><?php echo $result1->GW5; ?></td>


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
 
 <?php } else if($lid==11) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Surface Runoff</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
	  <th>Sl No</th>
      <th>Date</th>
	  <th>Location</th>
	  <th>Station Code</th>
      <th>pH </th>
      <th>Total Suspended Solid (mg/l) </th>
      <th>Cr+6 (mg/l) </th>
      <th>Total Chromium (mg/l)</th>
	  <th>O &amp; G (mg/l)</th>
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
    $sql1="SELECT * FROM SurfaceRunoff where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->PH; ?></td>
<td><?php echo $result1->TotalSuspendedSolid; ?></td>
<td><?php echo $result1->Iron; ?></td>
<td><?php echo $result1->TotalChromium; ?></td>
<td><?php echo $result1->TotalChromium; ?></td>
<td><?php echo $result1->TotalChromium; ?></td>
<td><?php echo $result1->TotalChromium; ?></td>
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
 <?php } else if($lid==10) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Meterological Information</h3>
   <table class="table table-striped table-bordered" id="fugitive">
    <thead>
  <tr>
    <th>Location</th>
      <th>Date</th>
      <th>Temperature (&#8451;)<br /> Max &nbsp; &nbsp; &nbsp; &nbsp; Min </th>
      <th>Relative Humidity (%)<br /> Max &nbsp; &nbsp; &nbsp; &nbsp; Min  </th>
      <th>Wind Speed (m/s)<br /> Max &nbsp; &nbsp; &nbsp; &nbsp; Min </th>
      <th>Predominant Wind Direction (From) </th>
      <th>Rainfall (mm) </th>
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
 //"SELECT * FROM MeteorologicalInformation where env_id=$lid and pid=$pid";
    $sql1="SELECT * FROM MeteorologicalInformation where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Temprature; ?></td>
<td><?php echo $result1->RelativeHumidity; ?></td>
<td><?php echo $result1->WindSpeed; ?></td>
<td><?php echo $result1->WindDirection; ?></td>
<td><?php echo $result1->RainFall; ?></td>

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
<?php } else if($lid==12) { ?>
 
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
	  <th>Sl No</th>
      <th>Vehicle No</th>
      <th>Type of Vehicle</th>
      <th>Smoke (HSU) </th>
      <th>HC (PPM) </th>
      <th>CO (%) </th>
      <th>NoX (%) </th>
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
    $sql1="SELECT * FROM VehicularEmission where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo GetName('location', 'location', 'id', $result1->lid) ?></td>
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Smoke; ?></td>
<td><?php echo $result1->CO; ?></td>
<td><?php echo $result1->HC; ?></td>
<td><?php echo $result1->NOX; ?></td>

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

    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
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

    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
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
    $sql1="SELECT * FROM Pds where env_id=$lid and pid=$pid $quy_con and userid=$user";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
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
<?php } else if($lid==15) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Mine Discharge Water</h3>
   <table class="table table-striped table-bordered" id="fugitive" >
    <thead>
  <tr>
      <th>Location</th>
      <th>Date</th>
      <th>pH</th>
      <th>TSS (mg/l)</th>
      <th>Total Cr (mg/l)</th>
      <th>Cr<sup>+6 </sup> (mg/l)</th>
      <th>Iron (mg/l)</th>
      <th>O&G (mg/l)</th>
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
    $sql1="SELECT * FROM MineDischargeWater where env_id=$lid and pid=$pid $quy_con";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->PH; ?></td>
<td><?php echo $result1->TSS; ?></td>
<td><?php echo $result1->TotalCr; ?></td>
<td><?php echo $result1->Cr; ?></td>
<td><?php echo $result1->Iron; ?></td>
<td><?php echo $result1->OG; ?></td>


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
<?php } else if($lid==14) { ?>
 
 <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          
              <!-- /.box-body -->

        <div class="col-md-12 np"> <div class="main-cnt"> 
  <h3 class="box-title">Ground Water Sampling</h3>
   <table class="table table-striped table-bordered" id="fugitive" >
    <thead>
  <tr>
      <th>Location</th>
      <th>Date / TIme</th>
      <th>Cr <sup>+6</sup> (mg/l)</th>
      
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
    $sql1="SELECT * FROM GroundWaterSampling where env_id=$lid and pid=$pid $quy_con";
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
<td><?php echo date('d-m-Y',strtotime($result1->date_entry)); ?></td>
<td><?php echo $result1->Cr; ?></td>



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
<?php } ?>    
 
    
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

<script src="dist/js/custom.js"></script>

</body>
</html>
