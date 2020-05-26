<?php
include("connect.php");
$pas=$_GET["pas"];
$log=$_GET["log"];
include("user_logout_chk.php");
if($_COOKIE['adm'])
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
  <title> User Dashboard</title>
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
    border: 1px solid #c1ceda; text-align:center;color:#333;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th{color:#fff !important;}
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
table td[class*="col-"]{float: left;}
#container {
  
  height: 400px;
  margin: 0 auto
}
.info-box{   background:#fff; min-height:40px !important;}
.info-box-text{color:#ffffff;}

.info-box1{   background:#ccc;}
.info-box-text1{color:#333;}

div#cbox1 h2 {
    background: #e84c3d;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #ad2a1e;
}
div#cbox2 h2 {
    background: #af5a0f;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #ad2a1e;
}
div#cbox3 h2 {
    background: #f2c40f;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #b9960b;
}
div#cbox4 h2 {
    background: #3ab54b;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #1b8c2a;
}
div#cbox5 h2 {
    background: #00aff0;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #1b8eb9;
}
div#cbox6 h2 {
    background: #0054a5;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #0e3c69;
}
div#cbox7 h2 {
    background: #652d90;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #45146b;
}
div#cbox8 h2 {
    background: #006d91;
    margin-top: 0px;
    font-size: 15px;border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 10px;
    text-transform: uppercase;
    font-weight: bold;    border-bottom: 2px solid #08485d;
}

.info-box{    border: 1px solid #5a0804;}


/*-----------------------pag---------------------*/
.text-yellow {
    color: #b9d40b !important;
}
.text-aqua {
    color: #70af1a !important;
}
.info-box{ min-height:63px;}
.info-box-icon{ min-height:30px; height:62px;line-height: 70px;}
.info-box-icon1{ min-height:30px; height:62px;line-height: 70px;}
.bg-green {
    background: #097609;
}
.bg-yellow{ background:#b9261f !important;}
.bg-yellowz{ background:#b9261f !important;}
.bg-red {
    background-color: #70af1a !important;
}
.bg-aqua {
    background-color: #b9d40b !important;
}
.fix {
    width: 100%;
    float: right;
    height: 400px;
    overflow-x: hidden;
    overflow-y: scroll;
    padding-right: 10px;
}

.bg-yl {
    background: #9dd810; color:#fff;
}
.bg-rrd {
    background: #e5eb0b; color:#fff;
}
.bg-pnk {
    background: #92cc47; color:#fff;
}
.bg-lt {
    background: #9aef3f; color:#fff;
}
.prvl {
    width: 100%;
    float: left;
    margin-top: -19px;    margin-left: 20%;
}
.prvl ul{ margin:0px; padding:0px; }
.prvl ul li{ list-style:none; float:left; font-size:20px; }
.prvl ul li {
    list-style: none;
    float: left;
    font-size: 16px;
    padding-left: 10px;
    padding-right: 10px;
    line-height: 18px;
}
canvas {
    width: 100% !important;
    height: auto !important;
}
ul.chart-legend.clearfix li {
    float: left;
    margin-right: 20px;
    margin-bottom: 10px;
    font-size: 14px;
    
}
.allmines {
    width: 100%;
    float: left;
    padding-right:10px;
}

 #map {
        height: 400px;
        width: 700px;
      }
     
      #legend img {
        vertical-align: middle;
      }
.box-title1 {font-size: 10px; font-weight: bold;     text-align: center;}

.info-box-content.z {
    padding: 20px 10px; margin-left: 55px;
}
.info-box-content1 {
    padding: 5px 10px;
    margin-left: 71px;
    color: #ffffff;
    text-transform: uppercase;
    height: 70px;
    margin-bottom: 10px;
}
.info-box-icon1 {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 70px;
    width: 70px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

.info-box-icon1 {
    min-height: 31px;
    height: 70px !important;
    line-height: 60px !important;
}
.mrq {
    width: 96%;
    margin-left: 2%;
    margin-right: 2%;
    background: #ffffff;
    border: 1px solid #dedede;
    padding: 2%;
    font-size: 11px !important;
    height: 421px !important;
    float: left;
    position: relative;
}
.arrow-button {
    /* background: #555 !important; */
    background: #b9261f;
    /* background-size: 100% 51%; */
    /* background-repeat: no-repeat; */
    font-family: helvetica;
    padding: 7px 10px;
    font-size: 17px;
    color: #fff;
    /* line-height: 5px; */
    text-decoration: none;
    border-radius: 3px;
    margin-left: 0px;
    margin-top: 0px;
}

.makenotclick {
    filter: blur(1.2px);
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
      <h1>
       User Dashboard<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content"> 
<div class="main-cnt" style="height: auto;"> 
<div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
 <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
              
 <div id="map"></div>
    
    <script>
      <?php $selectmap="SELECT lat, lng FROM projects LIMIT 8";
              $mapquery=$cudb->query($selectmap) or die(mysqli_error());
              ?>  
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: new google.maps.LatLng(20.191005, 84.435904),
          mapTypeId: 'roadmap',
          gestureHandling: 'none',
          zoomControl: false,
          styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
        });
        var icons = {
          
          project: {
            name: 'Project',
            icon: 'dist/img/map.png'
          }
        };

        var features = [
        <?php while($resultmap=mysqli_fetch_object($mapquery)) 
          { ?>
          {
      position: new google.maps.LatLng(<?php echo $resultmap->lat ?>, <?php echo $resultmap->lng ?>),
            type: 'project'
          },
        <?php } ?>
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });

        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }

        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDacAdy5jV89SHXjwH08jt8l4EvVilWQuQ&callback=initMap">
    </script>
                  </div>
                </div>

                

              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="mrq">
       
       
       
<div class="arrow-button">Latest Circulars</div>

<!--<marquee onMouseOver="this.scrollAmount=0" onMouseOut="this.scrollAmount=2" scrollamount="2" direction="up" loop="true" style=" width:100%; font-family:arial; font-size:12px; padding:10px; height:313px; float:left; margin-top:15px;" >-->

<marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="2" direction="up" loop="true" style=" width:100%; font-family:arial; font-size:12px; padding:10px; height:313px; float:left; margin-top:15px;" >

  <?php
   $selquery="SELECT * FROM circular  where can_see like '%,$_SESSION[designation],%' or can_see like '%All%' limit 20";
  //$selquery="SELECT id,username,`password` FROM admin WHERE username='$name'";
  $qryresult=$cudb->query($selquery)or die(mysqli_error());
  while($selrow=mysqli_fetch_object($qryresult))
  {
  echo "<div style='color:#333; margin-bottom:10px;'>".substr(stripslashes($selrow->details),0,100)."...
  <br />
  <a href='//$_SERVER[HTTP_HOST]/newadmin/uploads/".$selrow->image."' target='blank' class='mdetails' style='color:red; font-size:10px;'>View Attachments</a> 
  <br />
  <div style='font-size:10px; color:#44c50f; text-align:right;'>
    By: ".$selrow->added_by." OMC
    <br />
    Dt. ".date('F jS, Y', strtotime($selrow->date))."
  </div>
  </div><p>";
  }
  ?>


</marquee>
<div style="width:100%; float:left;">
<a href="viewcircular.php" class="mmr">View All</a>
</div>
</div>
 </div>
 </div>
 </div>
 </section>   

    <!-- Main content -->
    <section class="content" style="background:#efefef;">  
       <?php include_once('usercommon.php')?>
       <div class="col-md-12">
        <div class="main-cnt" style=" background:#edeff0;height: auto; "> 
    <h3 class="box-title" style="padding-left:15px;">Latest Updates</h3>
    <?php $numbprj="SELECT * FROM projects";
    $numquery=$cudb->query($numbprj) or die(mysqli_error());
    ?>
    
<?php
     //loop through the page
   $i=0;
        while($resultprj=mysqli_fetch_object($numquery))
            {
      $i=$i+1;

        ?> 
        <?php $sql1="SELECT * FROM projects LEFT JOIN user_set_permission ON projects.id = user_set_permission.pid WHERE user_set_permission.uid=$user AND projects.id=$resultprj->id";
$query1=$cudb->query($sql1) or die(mysqli_error());
 $rowproject=mysqli_fetch_object($query1);
$checkdisabled=$rowproject->p_name;
?>

<?php if($rowproject->view==1)  {?>
      <a href="userprojectdtls.php?pid=<?php echo $resultprj->id; ?>">  <div class="col-md-4" id="cbox<?php echo $i; ?>">
      <div style="width:100%; float:left; background:#fff; box-shadow: 0px -1px 2px 2px rgba(0, 0, 0, 0.06); margin-bottom:15px; height:115px; color:#fff;border-radius: 10px 10px 0px 0px;"> 
        <h2 ><?php echo $resultprj->p_name; ?></h2>
    
        <h3 style="text-align:center; color:#ff7907; width:33%; float:left;"><span style=" font-size:20px;">
       
 <?php $uquery="SELECT COUNT(*) AS counttotal FROM clerance WHERE pid=$resultprj->id";
  $uresult=$cudb->query($uquery);
  $totrow=mysqli_fetch_object($uresult);
  echo $totrow->counttotal;
  ?>


        </span><br /> 

      

       <span style="font-size:14px;">Clerance</span></h3>
        <h3 style="text-align:center; color:#333; width:33%; float:left;"><span style="font-size:20px;"><?php $uquery1="SELECT COUNT(*) AS counttotal1 FROM clerance_list WHERE pid=$resultprj->id";
  $uresult1=$cudb->query($uquery1);
  $totrow1=mysqli_fetch_object($uresult1);
  echo $totrow1->counttotal1;
  ?></span>










  <br /> <span style="font-size:14px;">Condition</span></h3>
  <h3 style="text-align:center; color:#9ecb2d; width:33%; float:left;">  <span style=" font-size:20px; "><?php $projectstatcount="SELECT COUNT(*) as total 
FROM condition_message
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$resultprj->id
AND condition_message.complied =  'Complied' ";
$resultcount=$cudb->query($projectstatcount) or die(mysqli_error());
$pcount=mysqli_fetch_object($resultcount);
echo $ccount=$pcount->total; ?></span><br /><span style="font-size:14px;">Completed</span>
       </div>
        </div></a>
        
<?php } else { ?>
<span class="makenotclick"><div class="col-md-4" id="cbox<?php echo $i; ?>">
      <div style="width:100%; float:left; background:#fff; box-shadow: 0px -1px 2px 2px rgba(0, 0, 0, 0.06); margin-bottom:15px; height:115px; color:#fff;border-radius: 10px 10px 0px 0px;"> 
        <h2 ><?php echo $resultprj->p_name; ?></h2>
    
        <h3 style="text-align:center; color:#ff7907; width:33%; float:left;"><span style=" font-size:20px;">
       
 <?php $uquery="SELECT COUNT(*) AS counttotal FROM clerance WHERE pid=$resultprj->id";
  $uresult=$cudb->query($uquery);
  $totrow=mysqli_fetch_object($uresult);
  echo $totrow->counttotal;
  ?>


        </span><br /> 

      

       <span style="font-size:14px;">Clerance</span></h3>
        <h3 style="text-align:center; color:#333; width:33%; float:left;"><span style="font-size:20px;"><?php $uquery1="SELECT COUNT(*) AS counttotal1 FROM clerance_list WHERE pid=$resultprj->id";
  $uresult1=$cudb->query($uquery1);
  $totrow1=mysqli_fetch_object($uresult1);
  echo $totrow1->counttotal1;
  ?></span>










  <br /> <span style="font-size:14px;">Condition</span></h3>
  <h3 style="text-align:center; color:#9ecb2d; width:33%; float:left;">  <span style=" font-size:20px; "><?php $projectstatcount="SELECT COUNT(*) as total 
FROM condition_message
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$resultprj->id
AND condition_message.complied =  'Complied' ";
$resultcount=$cudb->query($projectstatcount) or die(mysqli_error());
$pcount=mysqli_fetch_object($resultcount);
echo $ccount=$pcount->total; ?></span><br /><span style="font-size:14px;">Completed</span>
       </div>
        </div></span>

<? } ?>

      <?php } ?>
  
</div>

<div class="main-cnt" style=" background:#edeff0; height: auto;"> 
<h3 class="box-title" style="padding-left:15px;">Project Monitoring</h3>

    <?php $numbprj="SELECT * FROM projects";
    $numquery=$cudb->query($numbprj) or die(mysqli_error());
    ?>
    
<?php
     //loop through the page
        while($resultprj=mysqli_fetch_object($numquery))
            {
        ?> 

        <?php $sql1="SELECT * FROM projects LEFT JOIN user_set_permission ON projects.id = user_set_permission.pid WHERE user_set_permission.uid=$user AND projects.id=$resultprj->id";
$query1=$cudb->query($sql1) or die(mysqli_error());
 $rowproject=mysqli_fetch_object($query1);
$checkdisabledm=$rowproject->p_name;
?>

<?php if($rowproject->view==1)  {?>


        <a href="monitoruserdtls.php?pid=<?php echo $resultprj->id; ?>">
        <div class="col-md-3">
    
    <div class="info-box bg-yellow">
            <span class="info-box-icon 2"><i class="fa fa-soundcloud"></i></span>
            <div class="info-box-content z">
              <span class="info-box-text"><?php echo $resultprj->p_name; ?></span>
              
              
            </div>
            <!-- /.info-box-content -->
          </div>
    
      
        </div>
     </a>

    <? } else { ?>

      <span class="makenotclick"><div class="col-md-3">
    
    <div class="info-box bg-yellow">
            <span class="info-box-icon 2"><i class="fa fa-soundcloud"></i></span>
            <div class="info-box-content z">
              <span class="info-box-text"><?php echo $resultprj->p_name; ?></span>
              
              
            </div>
            <!-- /.info-box-content -->
          </div>
    
      
        </div></span>

    <? } ?>

      <?php } ?>
  
</div>


 </div>
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

<!-- Bootstrap 3.3.7 -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/custom.js"></script>
</body>
</html>
