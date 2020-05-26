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
 .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid rgba(0,0,0,0.2); text-align:center;color:#333;
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

</style>
<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>

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
        Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 


<div class="main-cnt"> 


<div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            
            <!-- /.box-header -->
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
      type: 'project',
      title:'<?php echo $resultmap->p_name ?>'
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

      markers.push(marker);
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));


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
      
    <?php /*?><div class="fix">
        <?php 
    $sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysql_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?> 
        <a href="projectdtls.php?pid=<?php echo $result->id; ?>">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-soundcloud"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $result->p_name; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
         <? } ?>
      </div><?php */?>
        </div>
      </div>
<div class="row" style="display: none;">
<div class="col-md-4">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">NOT COMPLIED</h3>
<div class="progress">
  <?php $selectc="SELECT COUNT(*) as total FROM clerance_list"; 
        $upres=$cudb->query($selectc) or die(mysqli_error());
        $totalc=mysqli_fetch_object($upres);
        $totalcondition=number_format($totalc->total, 0);
        $selectcm="SELECT COUNT(*) as total FROM condition_message where complied='Not Complied'"; 
        $upresm=$cudb->query($selectcm) or die(mysqli_error());
        $totalcm=mysqli_fetch_object($upresm);
        $totalconditionm=number_format($totalcm->total,0);
        $totalperc=round(($totalcondition/$totalconditionm) * 100);
        $fulltotal=$totalperc/1000;
  ?>
  <div class="progress-bar progress-bar-striped" style="width:<?php echo $fulltotal; ?>%"></div>
  
  <div class="prvl"> 
  <ul>
  <li>20%</li>
  <li>40%</li>
  <li>80%</li>
  <li>100%</li>
  
   </ul>
  </div>
</div>
                  
                </div>
                <!-- /.box-header -->
                
 
              </div>
   
            </div>

<div class="col-md-4">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">PARTIALLY COMPLIED</h3>
<div class="progress">
  <?php $selectcp="SELECT COUNT(*) as total FROM clerance_list"; 
        $upresp=$cudb->query($selectcp) or die(mysqli_error());
        $totalcp=mysqli_fetch_object($upres);
        $totalconditionp=number_format($totalcp->total, 0);
        $selectcmp="SELECT COUNT(*) as total FROM condition_message where complied='Partially Complied'"; 
        $upresmp=$cudb->query($selectcmp) or die(mysqli_error());
        $totalcmp=mysqli_fetch_object($upresmp);
        $totalconditionmp=number_format($totalcmp->total,0);
        $totalpercp=round(($totalconditionp/$totalconditionmp) * 100);
        $fulltotalp=$totalperc/1000;
  ?>
  <div class="progress-bar progress-bar-striped" style="width:<?php echo $fulltotalp; ?>%"></div>
  <div class="prvl"> 
  <ul>
  <li>20%</li>
  <li>40%</li>
  <li>80%</li>
  <li>100%</li>
  
   </ul>
  </div>
  
</div>
                  
                </div>
                <!-- /.box-header -->
                
 
              </div>
   
            </div>
      
<div class="col-md-4">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">COMPLIED</h3>

<div class="progress">
  <?php $selectcd="SELECT COUNT(*) as total FROM clerance_list"; 
        $upresd=$cudb->query($selectcd) or die(mysqli_error());
        $totalcd=mysqli_fetch_object($upresd);
        $totalconditiond=number_format($totalcd->total, 0);
        $selectcmd="SELECT COUNT(*) as total FROM condition_message where complied='Complied'"; 
        $upresmd=$cudb->query($selectcmd) or die(mysqli_error());
        $totalcmd=mysqli_fetch_object($upresmd);
        $totalconditionmd=number_format($totalcmd->total,0);
        $totalpercd=round(($totalconditiond/$totalconditionmd) * 100);
        $fulltotald=$totalperc/1000;
  ?>
  <div class="progress-bar progress-bar-striped" style="width:<?php echo $fulltotald; ?>%"></div>
  <div class="prvl"> 
  <ul>
  <li>20%</li>
  <li>40%</li>
  <li>80%</li>
  <li>100%</li>
  
   </ul>
  </div>
  
</div>
                  
                </div>
                <!-- /.box-header -->
                
 
              </div>
   
            </div>      

</div>

<div class="main-cnt1" style=" background:#edeff0;"> 
<h3 class="box-title">Project Statistics</h3>

    <?php $numbprj="SELECT * FROM projects";
    $numquery=$cudb->query($numbprj) or die(mysqli_error());
    ?>
    
<?php
     //loop through the page
        while($resultprj=mysqli_fetch_object($numquery))
            {
        ?> 
        
        <div class="col-md-3 no-padding">
      <div style="width:96%; float:left; background:#fff;box-shadow: 0px -1px 2px 2px rgba(0, 0, 0, 0.06); margin-bottom:14px; height:115px;color:#fff;"> 
        <h2 style="margin-top:0px; padding-top:7px;
background: #b9261f;
 height:30px; text-shadow:1px 1px 1px #333; font-size:14px; text-align:center;"><?php echo $resultprj->p_name; ?></h2>
    
        <h3 style="text-align:center; color:#ff7907; width:33%; float:left;"><span style=" font-size:20px;">
       
 <?php $uquery="SELECT COUNT(*) AS counttotal FROM clerance WHERE pid=$resultprj->id";
  $uresult=$cudb->query($uquery);
  $totrow=mysqli_fetch_object($uresult);
  echo $totrow->counttotal;
  ?>


        </span><br /> <span style="font-size:14px;"><a href="projectdtls.php?pid=<?php echo $resultprj->id; ?>">Clearance</a></span></h3>
        <h3 style="text-align:center; color:#333; width:33%; float:left;"><span style=" font-size:20px; "><?php $uquery1="SELECT COUNT(*) AS counttotal1 FROM clerance_list WHERE pid=$resultprj->id";
  $uresult1=$cudb->query($uquery1);
  $totrow1=mysqli_fetch_object($uresult1);
  echo $totrow1->counttotal1;
  ?></span><br /> <span style="font-size:14px;">Condition</span></h3>
        <h3 style="text-align:center; color:#9ecb2d; width:33%; float:left;"><span style=" font-size:20px; "><?php $projectstatcount="SELECT COUNT(*) as total 
FROM condition_message
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$resultprj->id
AND condition_message.complied =  'Complied' ";
$resultcount=$cudb->query($projectstatcount) or die(mysqli_error());
$pcount=mysqli_fetch_object($resultcount);
echo $ccount=$pcount->total; ?></span><br /><span style="font-size:14px;">Completed</span>
       </div>
        </div>
     

      <?php } ?>
  
</div>

<div class="row">
<div class="col-md-12">
  <h3 class="box-title">Project Status</h3>

</div>
</div>

<div class="allmines">

<div class="row">

<?php $projectstat="SELECT * FROM projects";
    $upres=$cudb->query($projectstat) or die(mysqli_error());
?>
<?php 
$k=0;
while($rowchart=mysqli_fetch_object($upres)){ 
  $cpid=$rowchart->id;
$k=$k+1;
$projectstatcount="SELECT COUNT(*) as total 
FROM condition_message
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$cpid
AND condition_message.complied =  'Complied' ";
$resultcount=$cudb->query($projectstatcount) or die(mysqli_error());
$pcount=mysqli_fetch_object($resultcount);
$ccount=$pcount->total;
// not complied
$projectstatcountnc="SELECT COUNT(*) as total 
FROM condition_message
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$cpid
AND condition_message.complied =  'Not Complied' OR condition_message.complied = ''";
$resultcountnc=$cudb->query($projectstatcountnc) or die(mysqli_error());
$pcountnc=mysqli_fetch_object($resultcountnc);
$ccountnc=$pcountnc->total;

// partially complied
$projectstatcountpc="SELECT COUNT(*) as total 
FROM condition_message 
LEFT JOIN clerance_list ON clerance_list.id = condition_message.ctid
WHERE clerance_list.pid =$cpid
AND condition_message.complied =  'Partially Complied' ";
$resultcountpc=$cudb->query($projectstatcountpc) or die(mysqli_error());
$pcountpc=mysqli_fetch_object($resultcountpc);
$ccountpc=$pcountpc->total;

//not started

$selns="SELECT COUNT(*) as total FROM clerance_list where pid=$cpid";
$nsr=$cudb->query($selns) or die(mysqli_error());
$notsc=mysqli_fetch_object($nsr);
$nsc=$notsc->total;
$allcomp=$ccountpc+$ccount;
$notstarted=$nsc-$allcomp;
?>
      <div class="col-md-3">
      
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title1" style="text-transform: uppercase;"><?php echo $rowchart->p_name; ?></h3>
                  
                </div>
                <div class="box-body">
                    <canvas id="pieChart<?php echo $k; ?>" height="200"></canvas>                  
                </div>
              </div>

            </div>
            
   <script>
      $(function () {

    var pieChartCanvas<?php echo $k;?> = $("#pieChart<?php echo $k;?>").get(0).getContext("2d");
    var pieChart<?php echo $k;?> = new Chart(pieChartCanvas<?php echo $k;?>);
     var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 0, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false
          //String - A legend template
         
        };
    
        var PieData<?php echo $k; ?> = [
          
          {
            value: <?php echo $notstarted; ?>,
            color: "#dd4b39",
            highlight: "#dd4b39",
            label: "NOT COMPLIED"
          },
          {
            value: <?php echo $ccountpc; ?>,
            color: "#b9d40b",
            highlight: "#b9d40b",
            label: "PARTIALLY COMPLIED"
          },
          {
            value: <?php echo $ccount ?>,
            color: "#70af1a",
            highlight: "#70af1a",
            label: "COMPLIED"
          },
        ];
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
    pieChart<?php echo $k;?>.Doughnut(PieData<?php echo $k;?>, pieOptions);
      });
    </script>         
     
            <?php } ?>
          </div>


      </div>

      
      


  <ul class="chart-legend clearfix" style="font-size: 12px;">
                  
                    <li><i class="fa fa-circle text-red"></i> NOT COMPLIED</li>
                    <li><i class="fa fa-circle text-yellow"></i>  PARTIALLY COMPLIED</li>
                    <li><i class="fa fa-circle text-aqua"></i> COMPLIED</li>

                  </ul>

<div class="main-cnt1" style=" background:#edeff0;"> 
<h3 class="box-title">Project Monitoring</h3>

    <?php $numbprj="SELECT * FROM projects";
    $numquery=$cudb->query($numbprj) or die(mysqli_error());
    ?>
    
<?php
     //loop through the page
        while($resultprj=mysqli_fetch_object($numquery))
            {
        ?> 
        <a href="monitoringdtls.php?pid=<?php echo $resultprj->id; ?>">
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

      <?php } ?>
  
</div>
</div>

    </section> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs" style="display:none;">
      
    </div>
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Odishagovt</a>. All rights
    reserved.
  </footer>

 
  

</div>
<!-- ./wrapper -->



<!-- Bootstrap 3.3.7 -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/Chart.js"></script>
<script src="dist/js/dashboard2.js"></script>





</body>
</html>
