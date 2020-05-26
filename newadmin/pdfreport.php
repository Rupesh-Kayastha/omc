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
$pid=$_GET['pid'];
$projectdetail=$cudb->query("select * from `projects` where `id`='$pid'") or die(mysqli_error());
$resprojectdetail=mysqli_fetch_object($projectdetail);
  if(isset($_GET['reportsubmit']))
  {
    $date=$_GET['month'];
    $month=date('m',strtotime($date));
    $year=date('Y',strtotime($date));
  }
  
$loc="SELECT * FROM location WHERE eid='1' and pid='$pid'";
$location=$cudb->query($loc) or die(mysqli_error());

$loc1="SELECT * FROM location WHERE eid='2' and pid='$pid'";
$location1=$cudb->query($loc1) or die(mysqli_error());

$loc2="SELECT * FROM location WHERE eid='7' and pid='$pid'";
$location2=$cudb->query($loc2) or die(mysqli_error());
$loc3="SELECT * FROM location WHERE eid='8' and pid='$pid'";
$location3=$cudb->query($loc3) or die(mysqli_error());

$loc4="SELECT * FROM location WHERE eid='3' and pid='$pid'";
$location4=$cudb->query($loc4) or die(mysqli_error());

$loc5="SELECT * FROM location WHERE eid='10' and pid='$pid'";
$location5=$cudb->query($loc5) or die(mysqli_error());

$loc6="SELECT  min(Temprature)as minTemprature,max(Temprature) as maxTemprature,min(RelativeHumidity)as minRelativeHumidity,max(RelativeHumidity) as maxRelativeHumidity,min(WindSpeed) as minWindSpeed,max(WindSpeed) as maxWindSpeed,RainFall,date_entry FROM MeteorologicalInformation WHERE env_id =10 AND pid =$pid group by `date_entry` order by `date_entry` asc";
$location6=$cudb->query($loc6) or die(mysqli_error());

$loc7="SELECT MIN( pm10 ) AS minpm10, MAX( pm10 ) AS maxpm10, MIN( pm25 ) AS minpm25, MAX( pm25 ) AS maxpm25,  `lid` 
FROM monitoring_list WHERE env_id =1 AND pid =$pid GROUP BY  `lid`";
$location7=$cudb->query($loc7) or die(mysqli_error());

$loc8="SELECT MIN( so2 ) AS minso2, MAX( so2 ) AS maxso2, MIN( nox ) AS minnox, MAX( nox ) AS maxnox,  `lid` 
FROM monitoring_list WHERE env_id =1 AND pid =$pid GROUP BY  `lid`";
$location8=$cudb->query($loc8) or die(mysqli_error());

$loc9="SELECT MIN( co ) AS minco, MAX( co ) AS maxco,  `lid` 
FROM monitoring_list WHERE env_id =1 AND pid =$pid GROUP BY  `lid`";
$location9=$cudb->query($loc9) or die(mysqli_error());
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
  <link rel="stylesheet" href="dist/css/jquery-ui.css">
    <style> 
#container {
  
  height: 400px;
  margin: 0 auto
}
</style>
<style>
html,body{margin:0px; padding:0px;}
.pagebox{width:100%; height:auto; float:left; margin-bottom:15px;}

.page{width:940px; margin:auto; height:980px; padding:30px; border:3px solid #000;}
.page1{width:940px; margin:auto; height:auto; padding:30px;}
h2{font-family:Arial, Helvetica, sans-serif; font-size:28px; text-align:center; font-weight:normal; border-top:1px dotted #333; border-bottom:1px dotted #333; padding:7px;}
.logobar{text-align:center; color:#cf534b; font-style:italic; font-family:Arial, Helvetica, sans-serif; font-size:22px;}
.mainimg{width:100%; height:auto; float:left; margin-top:20px; text-align:center; color:#cf534b;font-family:Arial, Helvetica, sans-serif; font-size:22px;}
.smallimg{width:100%; height:auto; float:left; text-align:center; font-size:16px; font-family:Arial, Helvetica, sans-serif;color:#cf534b;}
h4{font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000; text-align:left;  margin-bottom:10px;}
h5{font-family:Arial, Helvetica, sans-serif;  color:#000; text-align:left; font-style:italic; font-size:14px; text-decoration:underline;  margin-bottom:10px;}
table{border:1px solid #f79646; border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:15px; width:100%;}
table tr td{border:1px solid #f79646; border-collapse:collapse; padding:5px; background:#fde4d0;}
table tr th{border:1px solid #f79646; border-bottom:2px solid #f79646; border-collapse:collapse; text-align:left; padding:5px; }
p{font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:1.5; text-align:justify;}
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
        Dashboard<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <form method="get" action="#" >
    <div class="row">
      <div class="col-md-4">
        <input type="hidden" name="pid" value="<?=$pid;?>" />
        <input type="text" name="month" id="startDate" class="date-picker" autocomplete="off"
      </div>
      <div class="col-md-4">
        <input type="submit" name="reportsubmit" class="btn btn-success" />
      </div>
    </div>
    </form>
   
       <!-- Info boxes -->
<div class="row">
    	<div class="pagebox">
		<div class="page">
			<h2>ENVIRONMENTAL MONITORING REPORT<br/> (<?=$date;?>)</h2>
			<div class="logobar">
				<img src="dist/img/logo.jpg" /><br/><br/>
				ODISHA MINING CORPORATION LTD
			</div>
			<div class="mainimg">
				<img src="dist/img/1.jpg"/><br/><br/>
				<?=$resprojectdetail->p_name;?>
			</div>
			<div class="smallimg">
				<img src="dist/img/2.jpg"/><br/><br/>
				M/s CENTRE FOR ENVOTECH AND MANAGEMENT CONSULTANCY PVT. LTD<br/>
				<span style="color:#000; font-weight:bold;">BHUBANESWAR, ODISHA</span>
			</div>
		</div>
	</div>
	
	<div class="pagebox">
		<div class="page1">
			<h4>INDEX</h4>
			<table>
				<tr>
					<th>Sl. No.</th>
					<th>Descriptions</th>
					<th>Page No.</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Preamble</td>
					<td>02</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Details of Monitoring/Sampling Stations</td>
					<td>03-04</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Results & Discussion</td>
					<td>05-15</td>
				</tr>
			</table>
			
			<h4>TABLE</h4>
			<table>
				<tr>
					<th>Table  No.</th>
					<th>Particulars</th>
					<th>Page No.</th>
				</tr>
				<tr>
					<td>1.1</td>
					<td>Scope of Work</td>
					<td>2</td>
				</tr>
				<tr>
					<td>2.1</td>
					<td>Details of AAQ Monitoring Stations</td>
					<td>3</td>
				</tr>
				<tr>
					<td>2.2</td>
					<td>Details of Fugitive Emission Monitoring Stations</td>
					<td>3</td>
				</tr>
				<tr>
					<td>2.3</td>
					<td>Details of Noise (Ambient & Work Zone) Monitoring Stations</td>
					<td>4</td>
				</tr>
				<tr>
					<td>2.4</td>
					<td>Details of Water Sampling Stations (Surface)</td>
					<td>4</td>
				</tr>
				<tr>
					<td>2.5</td>
					<td>Details of Meteorological Monitoring Stations</td>
					<td>4</td>
				</tr>
				<tr>
					<td>3.1</td>
					<td>Results of Site Specific Meteorological Data</td>
					<td>5</td>
				</tr>
				<tr>
					<td>3.2</td>
					<td>Max and Min value of Meteorological Data during April 2018</td>
					<td>7</td>
				</tr>
				<tr>
					<td>3.3(a)</td>
					<td>Summarized Results of Ambient Air Quality</td>
					<td>8</td>
				</tr>
				<tr>
					<td>3.3(b)</td>
					<td>Summarized Results of Ambient Air Quality</td>
					<td>8</td>
				</tr>
				<tr>
					<td>3.3(c)</td>
					<td>Summarized Results of Ambient Air Quality</td>
					<td>8</td>
				</tr>
				<tr>
					<td>3.4</td>
					<td>Results of Fugitive Emissions Monitoring</td>
					<td>12</td>
				</tr>
				<tr>
					<td>3.5</td>
					<td>Summarized Results of Noise Monitoring</td>
					<td>12</td>
				</tr>
				<tr>
					<td>3.6</td>
					<td>Results of Work zone Noise Monitoring</td>
					<td>12</td>
				</tr>
				<tr>
					<td>3.7</td>
					<td>Results of Surface Water Analysis</td>
					<td>14</td>
				</tr>
				<tr>
					<td>3.8</td>
					<td>Result of Flow of Water Measurement</td>
					<td>15</td>
				</tr>
			</table>
			<h4>1.0	PREAMBLE</h4>
			<p>
				Odisha Mining Corporation Limited (hereinafter termed as OMC), a Government of Odisha undertaking has engaged M/s Centre For Envotech And Management Consultancy Pvt. Ltd. (hereinafter terms as CEMC), Bhubaneswar, Odisha for carrying out various Environmental Monitoring and Analysis Work in different mine leases of OMC located in the district of Jajpur, Keonjhar, Sundergarh and Koraput.
<br/><br/>
M/s Centre For Envotech And Management Consultancy Pvt. Ltd. possesses MOEF Recognition, NABL Accreditation and SPCB, Odisha empanelment for its laboratory division and also NABET Accreditated consultant to carry out EIA/EMP Report for various sectors like Mining, Mineral Beneficiation, Coal Washery, Thermal Power Plant, Metallurgical Industry and Infrastructure & Building Projects. 
<br/><br/>
Environmental Monitoring& Analysis Work of OMC includes monitoring& analysis of Air Environment, Water Environment, Land Environment such as Ambient Air Quality, Work Zone Air Quality, Noise Level, Water Quality, Waste Water Quality, Vehicular Emission and Soil Quality. Apart from these, various other activities such as suggestions to control the pollution, conducting various kinds of audits are also a part of this programme. 
<br/><br/>
This report presents the Environmental related data in respect of Meteorology, Air Quality (Ambient & Work Zone), Noise Level (Ambient & Work Zone), Surface Water Quality, Flow of Water Measurement of Bangur Chromite Mining Project in Keonjhar district of Odisha during ‘‘April 2018’’.


			</p>
			<h5>Scope of the Work</h5>
			<p>The scope of work during ‘‘April 2018’’is as follows:</p>
			<h4>Table No. 1.1: Scope of Work</h4>
			<table>
				<tr>
					<th>Sl. No.</th>
					<th>Particulars</th>
					<th>Frequency of Monitoring</th>
					<th>No. of Stations</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Ambient Air Quality (AAQ)</td>
					<td>Weekly Twice</td>
					<td>6</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Fugitive Emission (FE)</td>
					<td>Monthly Once</td>
					<td>6</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Noise Level Survey (NL)</td>
					<td>Monthly Once</td>
					<td>4</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Work Zone Noise Level Survey (WZNL)</td>
					<td>Monthly Once</td>
					<td>2</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Surface Water Quality (SWQ)</td>
					<td>Monthly Once</td>
					<td>4</td>
				</tr>
				<tr>
					<td>6</td>
					<td>Surface Water Flow Measurement (SWFM)</td>
					<td>Monthly Once</td>
					<td>4</td>
				</tr>
				<tr>
					<td>7</td>
					<td>Meteorological Monitoring (MM)</td>
					<td>Hourly Basis</td>
					<td>1</td>
				</tr>
			</table>
			<h4>2.0	DETAILS OF MONITORING/SAMPLING STATIONS</h4>
			<p>To carry out the Environmental Data Generation programme, CEMC in due consultation with OMC has identified different location to collect the samples for Air & Water Environment in and around the mining lease. The details of stations identified are as follows. The locations of monitoring stations are shown in Plate I & II. 

</p>
<h4>Ambient Air Quality (AAQ)</h4>
<p>The prime objective of the ambient air quality study is to establish the existing ambient air quality in and around the mining lease area. The existing ambient air quality was monitored at six (6) locations.  Monitoring was carried out for Particulate Matter (PM10), Particulate Matter (PM2.5), Sulphur Dioxide (SO2), Oxides of Nitrogen (NOX) and Carbon Monoxide (CO). The monitoring is carried out as per the guideline stipulated by Central Pollution Control Board.</p>

<h4>Table No. 2.1: Details of AAQ Monitoring Stations</h4>
			<table>
				<tr>
					<th rowspan="2">Station Details</th>
					<th rowspan="2">Station Code</th>
					<th colspan="2" style="text-align:center;">GPS Coordinates</th>
				</tr>
				<tr>
					
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
        <?php
        while($reslocation=mysqli_fetch_object($location))
        {
        ?>
				<tr>
					<td><?=$reslocation->location;?></td>
					<td><?=$reslocation->station_code;?></td>
					<td><?=$reslocation->latitude;?></td>
					<td><?=$reslocation->longitude;?></td>
				</tr>
				<?php
        }
        ?>
			</table>
			
			<h4>Work Zone Air Quality (FE)</h4>
			<p>To assess the level of fugitive dust due to mining and allied activities, six (6) monitoring stations were selected within the lease considering the activity area. Fugitive emissions monitoring was carried out once in a month on 8 hrly basis.</p>
			<h4>Table No. 2.2: Details of Fugitive Emission Monitoring Stations</h4>
			<table>
				<tr>
					<th rowspan="2">Station Details</th>
					<th rowspan="2">Station Code</th>
					<th colspan="2" style="text-align:center;">GPS Coordinates</th>
				</tr>
				<tr>
					
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
				 <?php
        while($reslocation1=mysqli_fetch_object($location1))
        {
        ?>
				<tr>
					<td><?=$reslocation1->location;?></td>
					<td><?=$reslocation1->station_code;?></td>
					<td><?=$reslocation1->latitude;?></td>
					<td><?=$reslocation1->longitude;?></td>
				</tr>
				<?php
        }
        ?>
			</table>
			<h4>Noise Level (NL & WZNL)</h4>
			<p>
				Noise level monitoring was carried out in nearby areas termed as Ambient Noise Level as well as work zone area termed as Work Zone Noise Level. Four Ambient Noise Stations have been identified and is carried out for 24 hours on hourly interval once in a month. Two locations have been identified in working area within the mining lease and is measures on hourly interval for 8 hours once in a month. 



			</p>
			<h4>Table No. 2.3: Details of Noise (Ambient & Work Zone) Monitoring Stations</h4>
		
			<table>
				<tr>
					<th rowspan="2">Station Details</th>
					<th rowspan="2">Station Code</th>
					<th colspan="2" style="text-align:center;">GPS Coordinates</th>
				</tr>
				<tr>
					
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;">Ambient Noise</td>
				</tr>
				<?php
        while($reslocation2=mysqli_fetch_object($location2))
        {
        ?>
				<tr>
					<td><?=$reslocation2->location;?></td>
					<td><?=$reslocation2->station_code;?></td>
					<td><?=$reslocation2->latitude;?></td>
					<td><?=$reslocation2->longitude;?></td>
				</tr>
				<?php
        }
        ?>
				<tr>
					<td  colspan="4" style="text-align:center;">Work Zone Noise </td>
				</tr>
				<?php
        while($reslocation3=mysqli_fetch_object($location3))
        {
        ?>
				<tr>
					<td><?=$reslocation3->location;?></td>
					<td><?=$reslocation3->station_code;?></td>
					<td><?=$reslocation3->latitude;?></td>
					<td><?=$reslocation3->longitude;?></td>
				</tr>
				<?php
        }
        ?>
			</table>
			<h4>Surface Water Quality (SWQ & SWFM)</h4>
			<p>In order to assess the quality of surface water, four locations have been identified over Salandi River and Salandi Canal which is flowing on the western side of the mining lease area. The locations have been identified considering the discharge point of mine discharge water. One grab sample was collected from each point in a month and was analyzed various parameters as stipulated in the scope of work. The same locations are identified to measure the flow in the river.

</p>
<h4>Table No. 2.4: Details of Water Sampling Stations (Surface)</h4>
			<table>
				<tr>
					<th rowspan="2">Station Details</th>
					<th rowspan="2">Station Code</th>
					<th colspan="2" style="text-align:center;">GPS Coordinates</th>
				</tr>
				<tr>
					
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
				
				<?php
        while($reslocation4=mysqli_fetch_object($location4))
        {
        ?>
				<tr>
					<td><?=$reslocation4->location;?></td>
					<td><?=$reslocation4->station_code;?></td>
					<td><?=$reslocation4->latitude;?></td>
					<td><?=$reslocation4->longitude;?></td>
				</tr>
				<?php
        }
        ?>
				
			</table>
			<h4>Meteorology</h4>
			<p>
				An Automatic Weather Monitoring Station is installed at the rooftop of OMC colony (21014’47.76”N; 86019’1.02”E)to collect the meteorological data on hourly basis continuously. The parameters monitored at the meteorological station were Temperature, Relative Humidity, Wind Speed, Wind Direction and Rainfall. These parameters were recorded at weather monitoring station using the respective sensors.
			</p>
			<h4>Table No. 2.5: Details of Meteorological Monitoring Stations</h4>
			<table>
				<tr>
					<th rowspan="2">Station Details</th>
					<th rowspan="2">Station Code</th>
					<th colspan="2" style="text-align:center;">GPS Coordinates</th>
				</tr>
				<tr>
					
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
				
				<?php
        while($reslocation5=mysqli_fetch_object($location5))
        {
        ?>
				<tr>
					<td><?=$reslocation5->location;?></td>
					<td><?=$reslocation5->station_code;?></td>
					<td><?=$reslocation5->latitude;?></td>
					<td><?=$reslocation5->longitude;?></td>
				</tr>
				<?php
        }
        ?>
				
				
			</table>
			<h4>3.0 RESULTS AND DISCUSSION</h4>
			<h4>3.1	Meteorology</h4>
			<p>
				Summarized meteorological data such as temperature, relative humidity, rainfall, and wind speed and wind direction are given in Table No. 3.1. During the month of ‘April 2018’the temperature varied from 13.950c to 42.390C & Relative Humidity varied from 98.9%o 10.3%. The maximum wind speed recorded during the month was 7.5m/s and overall average wind speed is calculated to be 1.44m/s. 21.77% of the time the wind remained calm (&lt;0.5 m/s). The predominant wind direction as observed to be from South West (SW) direction during the month. There was no rainfall during this month. Max. And Min. Value of temperature, relative humidity, rainfall, wind speed and wind direction on each day basis for April 2018 are given in Table No. 3.2.
			</p>
			<h4>Table No. 3.1:  Results of Site Specific Meteorological Data</h4>
			<table>
				<tr>
					<th colspan="2">Parameters</th>
					<th >April 2018</th>
					
				</tr>
				<tr>
					<td rowspan="3">Temperature (0C)</td>
					<td>Maximum</td>
					<td>42.39</td>
				</tr>
				<tr>
					<td>Minimum</td>
					<td>13.95</td>
				</tr>
				<tr>
					<td>Average</td>
					<td>28.02</td>
				</tr>
				<tr>
					<td rowspan="3">Relative Humidity (%)</td>
					<td>Maximum</td>
					<td>98.9</td>
				</tr>
				<tr>
					<td>Minimum</td>
					<td>10.3</td>
				</tr>
				<tr>
					<td>Average</td>
					<td>60.96</td>
				</tr>
				<tr>
					<td rowspan="2">Wind Speed(m/s)</td>
					<td>Maximum</td>
					<td>7.5</td>
				</tr>
				<tr>
					<td>Average</td>
					<td>1.44</td>
				</tr>
				<tr>
					<td rowspan="17">Wind Direction (%)</td>
					<td>Wind Direction (%)</td>
					<td>4.16</td>
				</tr>
				<tr>
					<td>NNE</td>
					<td>5.64</td>
				</tr>
				<tr>
					<td>NE</td>
					<td>3.36</td>
				</tr>
				<tr>
					<td>ENE</td>
					<td>1.07</td>
				</tr>
				<tr>
					<td>E</td>
					<td>3.22</td>
				</tr>
				<tr>
					<td>ESE</td>
					<td>2.55</td>
				</tr>
				<tr>
					<td>SE</td>
					<td>2.82</td>
				</tr>
				<tr>
					<td>SSE</td>
					<td>3.22</td>
				</tr>
				<tr>
					<td>S</td>
					<td>3.76</td>
				</tr>
				<tr>
					<td>SSW</td>
					<td>5.77</td>
				</tr>
				<tr>
					<td>SW</td>
					<td>11.42</td>
				</tr>
				<tr>
					<td>WSW</td>
					<td>10.61</td>
				</tr>
				<tr>
					<td>W</td>
					<td>7.52</td>
				</tr>
				<tr>
					<td>WNW</td>
					<td>4.03</td>
				</tr>
				<tr>
					<td>NW</td>
					<td>3.89</td>
				</tr>
				<tr>
					<td>NNW</td>
					<td>5.10</td>
				</tr>
				<tr>
					<td>CALM</td>
					<td>21.77</td>
				</tr>
				<tr>
					<td rowspan="2">Rainfall(mm)</td>
					<td>Monthly Total</td>
					<td>0</td>
				</tr>
				<tr>
					<td>No. of rainy days</td>
					<td>0</td>
				</tr>
			</table>
			<h4 style="text-align:center;">Figure No. 3.1: Wind rose (24 hrly) during the month of April 2018</h4>
			<div class="mainimg" style="margin-bottom:15px;">
				<img src="dist/img/3.jpg"/>
			</div>
			<h4 style="text-align:center;">Table No. 3.2:  Max and Min value of Meteorological Data during April 2018</h4>
			<table>
				<tr>
					<th rowspan="2">Date</th>
					<th colspan="2">Temperature (0C)</th>
					<th colspan="2">Relative Humidity (%)</th>
					<th colspan="2">Wind Speed (m/s)</th>
					<th rowspan="2">Rainfall (mm)</th>
					
				</tr>
				<tr>
					<th>Max.</th>
					<th>Min.</th>
					<th>Max.</th>
					<th>Min.</th>
					<th>Max.</th>
					<th>Min.</th>
				</tr>
        <?php
        while($reslocation6=mysqli_fetch_object($location6))
        {
        ?>
				<tr>
					<td><?=date('d-m-Y',strtotime($reslocation6->date_entry));?></td>
					<td><?=$reslocation6->maxTemprature;?></td>
					<td><?=$reslocation6->minTemprature;?></td>
					<td><?=$reslocation6->maxRelativeHumidity;?></td>
					<td><?=$reslocation6->minRelativeHumidity;?></td>
					<td><?=$reslocation6->maxWindSpeed;?></td>
					<td><?=$reslocation6->minWindSpeed;?></td>
					<td><?=$reslocation6->RainFall;?></td>
				</tr>
				<?php
        }
        ?>
			</table>
			<h4>3.2	Ambient Air Quality Monitoring</h4>
			<p>The Summarized results of AAQ are given in the Table No. 3.3 and the details of AAQ monitoring during the month of April 2018 are given in the Annexure I.</p>
			<h4>Table No.3.3(a): Summarized Results of Ambient Air Quality</h4>
			<table>
				<tr>
					<th rowspan="2">Sl. No.</th>
					<th rowspan="2">Location Name</th>
					<th rowspan="2">Station Code</th>
					<th colspan="3">PM<sub>10</sub></th>
					<th colspan="3">PM<sub>2.5</sub></th>
				</tr>
				<tr>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg.</th>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg.</th>
				</tr>
        <?php
        $l=0;
        while($reslocation7=mysqli_fetch_object($location7))
        {
          $l++;
        ?>
				<tr>
					<td><?=$l;?></td>
					<td><?php echo GetName('location', 'location', 'id', $reslocation7->lid) ?></td>
					<td><?php echo GetName('location', 'station_code', 'id', $reslocation7->lid) ?></td>
					<td><?=$reslocation7->minpm10;?></td>
					<td><?=$reslocation7->maxpm10;?></td>
					<td><?=round(($reslocation7->minpm10+$reslocation7->maxpm10)/2,2);?></td>
					<td><?=$reslocation7->minpm25;?></td>
					<td><?=$reslocation7->maxpm25;?></td>
					<td><?=round(($reslocation7->minpm25+$reslocation7->maxpm25)/2,2);?></td>
				</tr>
				<?php
        }
        ?>
				<tr>
					<td colspan="3" style="text-align:center;">CPCB Std.</td>
					<td colspan="3" style="text-align:center;">100 µg/m<sup>3</sup></td>
					<td colspan="3" style="text-align:center;">60 µg/m<sup>3</sup></td>
				</tr>
			</table>
			<h4>Table No. 3.3(b): Summarized Results of Ambient Air Quality</h4>
			<table>
				<tr>
					<th rowspan="2">Sl. No.</th>
					<th rowspan="2">Location Name</th>
					<th rowspan="2">Station Code</th>
					<th colspan="3">SO<sub>2</sub></th>
					<th colspan="3">NO<sub>x</sub></th>
				</tr>
				<tr>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg.</th>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg.</th>
				</tr>
				<?php
        $l=0;
        while($reslocation8=mysqli_fetch_object($location8))
        {
          $l++;
        ?>
				<tr>
					<td><?=$l;?></td>
					<td><?php echo GetName('location', 'location', 'id', $reslocation8->lid) ?></td>
					<td><?php echo GetName('location', 'station_code', 'id', $reslocation8->lid) ?></td>
					<td><?=$reslocation8->minso2;?></td>
					<td><?=$reslocation8->maxso2;?></td>
					<td><?=round(($reslocation8->minso2+$reslocation8->maxso2)/2,2);?></td>
					<td><?=$reslocation8->minnox;?></td>
					<td><?=$reslocation8->maxnox;?></td>
					<td><?=round(($reslocation8->minnox+$reslocation8->maxnox)/2,2);?></td>
				</tr>
				<?php
        }
        ?>
				<tr>
					<td colspan="3" style="text-align:center;">CPCB Std.</td>
					<td colspan="3" style="text-align:center;">80 µg/m<sup>3</sup></td>
					<td colspan="3" style="text-align:center;">80 µg/m<sup>3</sup></td>
				</tr>
			</table>
			<h4>Table No. 3.3(c): Summarized Results of Ambient Air Quality</h4>
			<table>
				<tr>
					<th rowspan="2">Sl. No.</th>
					<th rowspan="2">Location Name</th>
					<th rowspan="2">Station Code</th>
					<th colspan="3">CO</th>
					<th colspan="3"></th>
				</tr>
				<tr>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg.</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<?php
        $l=0;
        while($reslocation9=mysqli_fetch_object($location9))
        {
          $l++;
        ?>
				<tr>
					<td><?=$l;?></td>
					<td><?php echo GetName('location', 'location', 'id', $reslocation9->lid) ?></td>
					<td><?php echo GetName('location', 'station_code', 'id', $reslocation9->lid) ?></td>
					<td><?=$reslocation9->minco;?></td>
					<td><?=$reslocation9->maxco;?></td>
					<td><?=round(($reslocation9->minco+$reslocation9->maxco)/2,2);?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php
        }
        ?>
				<tr>
					<td colspan="3" style="text-align:center;">CPCB Std.</td>
					<td colspan="3" style="text-align:center;">4 mg/m<sup>3</sup></td>
					<td colspan="3" style="text-align:center;"></td>
				</tr>
			</table>
			<p>
				<span style="font-weight:bold;">Salandi Bihar (A1):</span> The pollution level in Salandi Bihar for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 65µg/m3 whereas minimum concentration was observed 40µg/m3 during the month. PM2.5 concentration ranges between 18µg/m3  to 33µg/m3, SO2 concentration ranges between 5.2µg/m3 to 7.5µg/m3 and NOX concentration ranges between 9.8 to 13.5 µg/m3 during the month. CO concentration was observed below the detection limit during the month. <br/> <br/>
				<img src="dist/img/4.jpg"/><br/><br/>
				<span style="font-weight:bold;">Mine Office Near Gate-1(A2):</span> The pollution level in Mine Office Gate-1 for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 84µg/m3 whereas minimum concentration was observed 61µg/m3 during the month. PM2.5 concentration ranges between 29µg/m3 to 41µg/m3, SO2 concentration ranges between 6.3µg/m3 to 9.8µg/m3 and NOX concentration ranges between 12.6µg/m3 to 15.2µg/m3 during the month. CO concentration was observed below the detection limit during the month.<br/><br/>
				<img src="dist/img/5.jpg"/><br/><br/>
				<span style="font-weight:bold;">Mine Office Near Gate-2(A3):</span>The pollution level in Mine Office Gate-2 for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 88µg/m3 whereas minimum concentration was observed 70µg/m3 during the month. PM2.5 concentration ranges between 31µg/m3  to 46µg/m3, SO2 concentration ranges between 7.1µg/m3 to 10.2µg/m3 and NOX concentration ranges between 14.1µg/m3 to 16.5µg/m3 during the month. CO concentration was observed below the detection limit during the month..<br/><br/>
				<img src="dist/img/6.jpg"/><br/><br/>
				<span style="font-weight:bold;">Bangur Village(A4):</span>The pollution level in Bangur Village for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 70µg/m3 whereas minimum concentration was observed 49µg/m3 during the month. PM2.5 concentration ranges between 22µg/m3 to 35µg/m3, SO2 concentration ranges between 6.1 µg/m3 to 9.5 µg/m3 and NOX concentration ranges between 10.6 to 13.2µg/m3 during the month. CO concentration was observed below the detection limit during the month.<br/><br/>
				<img src="dist/img/7.jpg"/><br/><br/>
				<span style="font-weight:bold;">Sankhana Village(A5):</span> The pollution level in Sankhana Village for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 44µg/m3 whereas minimum concentration was observed 56µg/m3 during the month. PM2.5 concentration ranges between 19µg/m3  to 28µg/m3, SO2 concentration ranges between 5.3 µg/m3 to 7.2 µg/m3 and NOX concentration ranges between 10.1 to12.4µg/m3  during the month. CO concentration was observed below the detection limit during the month.<br/><br/>
				<img src="dist/img/8.jpg"/><br/><br/>
				<span style="font-weight:bold;">Nuarugudi Village(A6) :</span>The pollution level in Nuarugudi Village for the parameters  PM10, PM2.5, SO2, NOX& CO is within the stipulated norms of CPCB. The maximum concentration of PM10 was observed 70µg/m3 whereas minimum concentration was observed 55µg/m3 during the month. PM2.5 concentration ranges between 25µg/m3 to 36µg/m3, SO2 concentration ranges between 5.9µg/m3 to 9.6 µg/m3 and NOX concentration ranges between 9.2µg/m3 to 13.4µg/m3 during the month. CO concentration was observed below the detection limit during the month.<br/><br/>
				<img src="dist/img/9.jpg"/><br/><br/>
			</p>
			<h4>3.3 	Fugitive Emissions Monitoring</h4>
			<p>The results of fugitive emissions are given in Table No. 3.4.</p>
			<h4>Table No. 3.4: Results of Fugitive Emissions Monitoring</h4>
			<table>
				<tr>
					<th>Station Details</th>
					<th>Date of Monitoring</th>
					<th>Result in (µg/m<sup>3</sup>)</th>
				</tr>
				<tr>
					<td>Near Incline 1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Near ventilation Room</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Near Time Office</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Near Stack Yard</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Near Substation</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Near weigh Bridge</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<h4>3.4	Noise Monitoring</h4>
			<p>
				<span style="font-weight:bold;">Ambient Noise Level:</span> Four locations are surveyed to assess the noise level during day time and night time once during the month. Summarized Noise Level at each stations are given in Table No. 3.5 whereas the 24 hrly detailed noise level data is given in Annexure II. The logarithmic averages are calculated considering 30 dB(A) for BDL.
			</p>
			<h4>Table No. 3.5: Summarized Results of Noise Monitoring</h4>
			<table>
				<tr>
					<th rowspan="3">Station no.</th>
					<th rowspan="3">Date of Survey</th>
					<th colspan="6">Results</th>
				</tr>
				<tr>
					<th colspan="3">Day (0600-2200hr)</th>
					<th colspan="3">Night (2200-0600hr)</th>
				</tr>
				<tr>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg*</th>
					<th>Max.</th>
					<th>Min.</th>
					<th>Avg*</th>
				</tr>
				<tr>
					<td>N1</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>N2</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>N3</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>N4</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<h4>3.5	Surface Water Quality</h4>
			
			<p>As per the guideline of CPCB, the following criteria shall be taken into consideration for use of the surface water bodies. Table 3.7 shows the surface water quality at identified locations near the mining lease area. </p>
				
			<table>
				<tr>
					<th width="180">Designated-Best-Use</th>
					<th style="text-align:center;">Class of water</th>
					<th style="text-align:center;">Criteria</th>
				</tr>
				<tr>
					<td>Drinking WaterSource without conventional treatment but after disinfection</td>
					<td style="text-align:center;">A</td>
					<td>
						<ul>
							<li>Total Coliforms Organism MPN/100ml shall be 50 or less</li>
							<li>pH between 6.5 and 8.5</li>
							<li>Dissolved Oxygen 6mg/l or more</li>
							<li>Biochemical Oxygen Demand 5 days 20C 2mg/l or less</li>
							
						</ul>
					</td>
				</tr>
				<tr>
					<td>Outdoor bathing (Organised)</td>
					<td style="text-align:center;">B</td>
					<td>
						<ul>
							<li>Total Coliforms Organism MPN/100ml shall be 500 or less pH between 6.5 and 8.5 Dissolved Oxygen 5mg/l or more</li>
							<li>Biochemical Oxygen Demand 5 days 20C 3mg/l or less</li>
							
							
						</ul>
					</td>
				</tr>
				<tr>
					<td>Drinking water source after conventional treatment and disinfection</td>
					<td style="text-align:center;">C</td>
					<td>
						<ul>
							<li>Total Coliforms Organism MPN/100ml shall be 5000 or less pH between 6 to 9 Dissolved Oxygen 4mg/l or more</li>
							<li>Biochemical Oxygen Demand 5 days 20C 3mg/l or less</li>
							
						</ul>
					</td>
				</tr>
				<tr>
					<td>Propagation of Wild life and Fisheries</td>
					<td style="text-align:center;">D</td>
					<td>
						<ul>
							<li>pH between 6.5 to 8.5 Dissolved Oxygen 4mg/l or more</li>
							<li>Free Ammonia (as N) 1.2 mg/l or less</li>
							
						</ul>
					</td>
				</tr>
				<tr>
					<td>Irrigation, Industrial Cooling, Controlled Waste disposal</td>
					<td style="text-align:center;">D</td>
					<td>
						<ul>
							<li>pH betwwn 6.0 to 8.5</li>
							<li>Electrical Conductivity at 25C micro mhos/cm Max.2250</li>
							<li>Sodium absorption Ratio Max. 26</li>
							<li>Boron Max. 2mg/l</li>
							
						</ul>
					</td>
				</tr>
				<tr>
					<td></td>
					<td style="text-align:center;">Below-E</td>
					<td>Not Meeting A, B, C, D & E Criteria</td>
				</tr>
			</table>
			<h4>Table No. 3.6: Results of Work Zone Noise Monitoring</h4>
			<table>
				<tr>
					<th>Time</th>
					<th>WZNL1</th>
					<th>WZNL2</th>
				</tr>
				<tr>
					<td>8:00AM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>9:00AM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>10:00AM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>

					<td>11:00AM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>12:00Noon</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>1:00PM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>2:00PM</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>3:00PM</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<h4>3.6	Flow of Water Measurement</h4>
			<p>The results of flow of water are given in Table No. 3.8.</p>
			<p>
				<img src="dist/img/10.jpg"/><br/><br/>
				<img src="dist/img/11.jpg"/><br/><br/>
			</p>
		</div>
	</div>
</div>


      <!-- /.row -->



       
<!-- /.col -->
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
<script type="text/javascript" src="dist/js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
    
    $(".date-picker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});
</script>
<!-- Bootstrap 3.3.7 -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>





</body>
</html>
