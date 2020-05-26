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
  <?php include_once('userheader.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="allnotification">
    <?php
    $userid=$_SESSION['UsrID'];
    $uquery="SELECT * FROM `Notification` WHERE `SendToId`='$userid' order by `NotificationId` desc";
    $uresult=$cudb->query($uquery);
    $numrows=mysqli_num_rows($uresult);
    if($numrows>0)
    {
    while($row=mysqli_fetch_object($uresult))
    {
  
    $sendername=GetName('admin','username','id',$row->SendById);
    $projectname=GetName('projects','p_name','id',$row->ProjectId);
    $cid=$row->ClearanceId;
    $pid=$row->ProjectId;
    $timelineid=$row->TimelineId;
    $id=$row->NotificationId;
    if($row->ViewStatus==1)
    {
     $bg='rgb(232, 230, 156)';
    }
    else
    {
     $bg='#fff';
    }
    ?>
    <div id="note<?=$row->NotificationId;?>">
        <h3 style="border:1px solid #dedede; height:auto;font-size:17px; width:100%; float: left; padding: 1%; color: #555;background:<?=$bg?>">New Notification sent by <?=$sendername;?> on <?=$projectname?>
         <span style="float: right;">
            <?php
            if($row->ViewStatus==1)
            {
            ?>
            <button onclick="updatestatus(<?=$cid?>,<?=$pid?>,<?=$timelineid?>,<?=$id?>);" style="background:#3ab54b;font-size:14px; width:50px;color: #fff; border: none;padding: 5px;cursor: pointer">Viewed</button>
            <?php
            }
            else
            {
            ?>
            <button onclick="$('#note<?=$id?>').hide();" style="background:#e84c3d;font-size:14px; color: #fff; border: none;padding: 5px; width:50px;cursor: pointer;">Cancel</button>
            <button onclick="updatestatus(<?=$cid?>,<?=$pid?>,<?=$timelineid?>,<?=$id?>);" style="background:#3ab54b;font-size:14px; width:50px;color: #fff; border: none;padding: 5px;cursor: pointer">View</button>
            <?php
            }
            ?>
           
         </span>
        </h3>
    </div>
  <?php
  }
    }
  ?>
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
<script>
    function updatestatus(cid,pid,timelineid,id)
    {
        $.ajax({url: "updatenotification.php?id="+id, success: function(result){
           if(result!='' && result==1)
           {
              location.href='http://omccompliance.com/newuserviewupdate.php?cid='+cid+'&pid='+pid+'&timelineid='+timelineid+'&note=1';
           }
         }}); 
    }
</script>
</body>
</html>
