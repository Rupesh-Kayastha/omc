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
$cid=$_GET['cid'];
$pid=$_GET['pid'];
$timelineid=$_GET['timelineid'];
$editid=$_GET['editid'];
$type=$_GET['type'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dashboard</title>
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
@import url('https://fonts.googleapis.com/css?family=Goudy+Bookletter+1911|Work+Sans');
.table > tbody > tr > td {
  vertical-align: top !important;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
  border: 1px solid rgba(0,0,0,0.2);
  text-align: center;
  color: #000;
}
.table > tbody > tr > td {
  text-align: center;
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 22px;
  height: 22px;
  padding: 10px 10px;
}
.btn-circle.btn-xl {
  width: 40px;
  height: 40px;
  padding: 10px 10px;
  font-size: 20px;
  line-height: 20px;
  border-radius: 35px;
  background: #d44207;
  color: #fff;
  float: left;
}
.btn-circle.btn-xla {
  width: 40px;
  height: 40px;
  padding: 10px 10px;
  font-size: 20px;
  line-height: 20px;
  border-radius: 35px;
  background: #03A9F4;
  color: #fff;
  float: left;
}
.btn-circle.btn-xlb {
  width: 40px;
  height: 40px;
  padding: 10px 10px;
  font-size: 20px;
  line-height: 20px;
  border-radius: 35px;
  background: #4caf50;
  color: #fff;
  float: left;
}
.trns {
  width: 93%;
  height: 200px;
  position: absolute;
  z-index: 9999;
  background: #000000b5;
  top: -12px;
  left: 13px;
  margin: 13px;
  display: none;
}
ul.icn {
  margin: 0px;
  padding: 0px;
}
ul.icn li {
  list-style: none;
  text-align: center;
  margin-bottom: 2px;
}
.allitm {
  margin-bottom: 10px;
  float: left;
  border-bottom: 1px solid #ccc;
  width: 100%;
  padding: 7px;
}
.sln {
  width: 3%;
  float: left;
}
.dtl {
  width: 93%;
  float: left;
  text-align: justify;
  cursor: pointer;
}
.dtl-btn {
  width: 4%;
  float: right;
  text-align: right;
}
.comment {
  width: 100%;
  float: left;
}
.topcomment {
  width: 86%;
  float: left;
  margin-top: 5px;
  margin-left: 10%;
  border-radius: 5px;
  margin-bottom: 5px;
  display: none;
}
.topcomment.default {
  display: block;
}
.topcomment-right {
  width: 100%;
  float: left;
  margin-top: 40px;
  border-radius: 5px;
  margin-bottom: 5px;
  padding: 2%;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px;
}
.table1>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px;
}
.commentdetails {
  margin-top: 10px;
  font-weight: bold;
  float: left;
  width: 100%;
}
span.msgby {
  font-size: 12px;
  color: #b1afaf;
  font-weight: normal;
}
.commentdetails1 {
  margin-top: 20px;
  font-weight: bold;
  float: left;
  width: 100%;
}
span.msgby {
  font-size: 11px;
  color: #b1afaf;
  font-weight: normal;
  margin-top: 20px;
}
p.dsc {
  font-size: 13px;
  color: #414242;
  font-weight: normal;
  font-family: 'Work Sans', sans-serif;
  min-width: 100%;
}
.tagbar {
  line-height: 28px;
  width: auto;
  float: right;
  height: 28px;
  background: #616161;
  border-radius: 17px;
  color: #fff;
  padding-left: 15px;
  font-size: 12px;
  font-weight: normal;
  padding-right: 15px;
  margin-left: 6px;
}
.content {
  padding-left: 0px;
  padding-right: 0px;
}
/* width */
::-webkit-scrollbar {
 width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
 box-shadow: inset 0 0 5px grey;
 border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
 background: #616161;
 border-radius: 10px;
}
.btn-circle.btn-xl-righta {
  width: 25px;
  height: 25px;
  padding: 3px 3px;
  font-size: 16px;
  line-height: normal;
  background: #d44207;
  color: #fff;
  float: left;
}
.btn-circle.btn-xl-rightb {
  width: 25px;
  height: 25px;
  padding: 3px 3px;
  font-size: 16px;
  line-height: normal;
  background: #03A9F4;
  color: #fff;
  float: left;
}
.btn-circle.btn-xl-rightc {
  width: 25px;
  height: 25px;
  padding: 3px 3px;
  font-size: 16px;
  line-height: normal;
  background: #4caf50;
  color: #fff;
  float: left;
}
.main-header {
  display: none;
}
ol.breadcrumb {
  display: none;
}
table.table1 {
  width: 100%;
  font-size: 11px;
}
p.dsc1 {
  font-size: 11px;
  color: #414242;
  font-weight: normal;
  font-family: 'Work Sans', sans-serif;
  min-width: 100%;
  margin-bottom: 20px;
}
.main-footer {
  display: none;
}
.mark {
  width: 30px;
  height: 13px;
  background: #ffffff;
  position: absolute;
  z-index: 999;
  right: 25%;
  top: 119px;
}
.topctg {
  float: left;
  margin-bottom: 20px;
  background: #424140;
  padding-top: 10px;
  padding-bottom: 10px;
  position: fixed;
  margin-bottom: 30px;
}
.topctg ul {
  margin: auto;
  padding: 0px;
}
.topctg li {
  list-style: none;
  font-size: 14px;
  text-align: center;
  float: left;
  margin-left: 5px;
  margin-right: 5px;
  padding-left: 5px;
  padding-right: 5px;
}
.topctg li a {
  text-decoration: none;
  color: #fff;
  font-family: 'Work Sans', sans-serif;
  ;
  font-size: 14px;
}
.tabcontent {
  display: none;
  margin-top: 30px;
  padding: 10px;
}
.tabcontent label {
  color: #000000;
}
select option {
  margin: 0px !important;
}
.nav-tabs{border-bottom: 2px solid #DDD;
    width: 97% !important;
    margin: 0 auto !important;
	    background: #fff;
    margin-top: 15px !important;
    font-weight: 600;
	}
.nav-tabs > li.active > a, .nav-tabs > li > a:hover {
  background: #ffffff;
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
      <h1><?php echo GetName('projects','p_name','id',$pid); ?> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>
    <!-- Main content -->
    <ul class="nav nav-tabs" role="tablist" id="updatetab" >
      <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Condition</a></li>
      <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special Condition</a></li>
      <li role="presentation"><a href="#additional" aria-controls="additional" role="tab" data-toggle="tab">Additional Condition</a></li>
    </ul>
    <div class="tab-content" style="padding-top:0px;">
      <div role="tabpanel" class="tab-pane active" id="general">
        <section class="content">
          <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:100%; float:left; overflow-x: hidden; height:700px;">
            <div class="row">
              <div class="col-md-12" id="accordion">
                <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='general' AND cid=$cid order by Priority asc ";
$query=$cudb->query($sql) or die(mysql_error());
?>
                <?php
     //loop through the page
     
        
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
        
        
          
          $i=$i+1;
          
        ?>
                <div class="allitm">
                  <div class="trns"> </div>
                  <div class="sln"><?php echo $i; ?></div>
                  <div class="dtl" style="width:35%;">
                    <?php
    $timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
                              $querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
                              $numrows=mysqli_num_rows($querytimeline);
                              
                              $timelineresult=mysqli_fetch_object($querytimeline);
                              if($timelineresult->complied=='Not Complied')
                              {
                                $complied='dist/img/red.png';
                              }
                              elseif($timelineresult->complied=='Complied')
                              {
                                $complied='dist/img/status.png';
                              }
                              elseif($timelineresult->complied=='Partially Complied')
                              {
                                $complied='dist/img/orrange.png';
                              }
                              
                              if($timelineresult->responsibility=='BOTH')
                              {
                                $response='dist/img/omc.png';
                              }
                              elseif($timelineresult->responsibility=='OMC')
                              {
                                $response='dist/img/redomc.png';
                              }
                              elseif($timelineresult->responsibility=='Consultant')
                              {
                                $response='dist/img/greenomc.png';
                              }
                              ?>
                    <?php echo $result->condition_text; ?> </div>
                  <div class="dtl-btn" style="width:62%;">
                    Contact Person <input type="text" class="textbox"  style="width:100px;" /> 
					 Delivery Date <input type="text" class="textbox datepicker" data-date-format="mm/dd/yyyy" style="width:100px;"/> 
                     Alert Reminder <select class="textbox">
					 					<option>1week</option>
										<option>2weeks</option>
										<option>3weeks</option>
										<option>4weeks</option>
										<option>5weeks</option>
										<option>6weeks</option>
										<option>7weeks</option>
										<option>8weeks</option>
										<option>9weeks</option>
										<option>10weeks</option>
										<option>11weeks</option>
										<option>12weeks</option>
										<option>13weeks</option>
										<option>14weeks</option>
										<option>15weeks</option>
									</select> 
                        <input type="submit" class="btn btn-primary" value="Submit"/>
                      
                  </div>
                  <div class="topcomment">
                    <div class="comment">
                      <?php
                              $k=0;
                              
                              
                                $k=$k+1;
                              
                                ?>
                      <table class="table" style=" background:#efefef;" >
                        <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
                        <tbody>
                          <tr>
                            <td>Status</td>
                            <td>Responsibility</td>
                            <td>Timeline</td>
                            <td>Attachment </td>
                          </tr>
                          <tr>
                            <td><?php echo $timelineresult->complied; ?></td>
                            <td><?php echo $timelineresult->responsibility; ?></td>
                            <td><?php echo $timelineresult->timeline; ?> Weeks</td>
                            <td><a href="uploads/docupload/<?php echo $timelineresult->docupload; ?>">View File</a></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php
    $timelinequeryright="SELECT * FROM condition_timeline WHERE timeline_id='$timelineid'and complied IS NOT NULL ORDER BY id DESC";
                              $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
                              //$resuright=mysqli_fetch_object($querytimelineright);
                              
                              ?>
          <div class="show_right_cond" style="display:none;">
            <div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:700px; overflow-x: hidden;">
              <div class="row">
                <div class="col-md-12">
                  <div class="allitm">
                    <div class="topcomment-right">
                      <div class="comment">
                        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
                                <?php
      $timelinequeryrightm="SELECT * FROM condition_message WHERE lcid=".$timelineresultright->id." ORDER BY id DESC";
                              $querytimelinerightm=$cudb->query($timelinequeryrightm) or die(mysqli_error());
                              
                              
                              ?>
                      <?php
    while($timelineresultrightm=mysqli_fetch_object($querytimelinerightm))
                              {
                                $k=$k+1;
                                ?>
                      <div class="commentdetails1">
                        <?php if($timelineresultrightm->m_type=='action') { ?>
                        <div class="btn-circle btn-xla"> A </div>
                        <?php } elseif ($timelineresultrightm->m_type=='suggestion') { ?>
                        <div class="btn-circle btn-xl">S</div>
                        <?php } elseif($timelineresultrightm->m_type=='remark') { ?>
                        <div class="btn-circle btn-xlb"> R </div>
                        <? } ?>
                        <div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
                          <p class="dsc1"> <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultrightm->user_id); ?> <?php echo $timelineresultrightm->submit_date; ?></span> <br />
                            <?php echo $timelineresultrightm->m_content; ?> </p>
                          <?php $tag_user=$timelineresultrightm->tag_user; 
          $taguser = explode(',', $tag_user);

          

    ?>
                          <?php 
    foreach($taguser as $value){ ?>
    <?php if($value) {?>
                          <div class="tagbar"><?php echo GetName('admin','fullname','id', $value); ?></div>
                          <?php } else{ ?>
    <?php } ?>
                          <?php } ?>
                        </div>
                      </div>
                      <? } ?>
                      <?php if($timelineresultright->complied=='Complied') { ?> 
         <?php $color='4caf50'; ?>  
         <?php } else { ?>               
         <?php $color='efefef'; ?> 
         <?php } ?>
                        <table class="table1" style=" background:#<?php echo $color; ?>" >
                          <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
                          <tbody>
                            <tr>
                              <td>Status</td>
                              <td>Responsibility</td>
                              <td>Timeline</td>
                              <td>Attachment </td>
                            </tr>
                            <tr>
                              <td><?php echo $timelineresultright->complied; ?></td>
                              <td><?php echo $timelineresultright->responsibility; ?></td>
                              <td><?php echo $timelineresultright->timeline; ?>Week</td>
                              <td><a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>">View File</a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <?php } ?>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div role="tabpanel" class="tab-pane" id="special">
        <section class="content">
          <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:100%; float:left; overflow-x: hidden; height:700px;">
            <div class="row">
              <div class="col-md-12" id="accordion_spcial">
                <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='special' AND cid=$cid order by Priority asc";
$query=$cudb->query($sql) or die(mysql_error());
?>
                <?php
     //loop through the page
     
        
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
        
        
          
          $i=$i+1;
          
        ?>
                <div class="allitm">
                  <div class="trns"> </div>
                  <div class="sln"><?php echo $i; ?></div>
                  <div class="dtl" style="width:35%;">
                    <?php
     $timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
                              $querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
                              $numrows=mysqli_num_rows($querytimeline);
                              
                              $timelineresult=mysqli_fetch_object($querytimeline);
                              if($timelineresult->complied=='Not Complied')
                              {
                                $complied='dist/img/red.png';
                              }
                              elseif($timelineresult->complied=='Complied')
                              {
                                $complied='dist/img/status.png';
                              }
                              elseif($timelineresult->complied=='Partially Complied')
                              {
                                $complied='dist/img/orrange.png';
                              }
                              
                              if($timelineresult->responsibility=='BOTH')
                              {
                                $response='dist/img/omc.png';
                              }
                              elseif($timelineresult->responsibility=='OMC')
                              {
                                $response='dist/img/redomc.png';
                              }
                              elseif($timelineresult->responsibility=='Consultant')
                              {
                                $response='dist/img/greenomc.png';
                              }
                              ?>
                    <?php echo $result->condition_text; ?> </div>
                 <div class="dtl-btn" style="width:62%;">
                    Contact Person <input type="text" class="textbox" style="width:100px;" /> 
					 Delivery Date <input type="text" class="textbox datepicker" data-date-format="mm/dd/yyyy" style="width:100px;" /> 
                      Alert Reminder <select class="textbox">
					 					<option>1week</option>
										<option>2weeks</option>
										<option>3weeks</option>
										<option>4weeks</option>
										<option>5weeks</option>
										<option>6weeks</option>
										<option>7weeks</option>
										<option>8weeks</option>
										<option>9weeks</option>
										<option>10weeks</option>
										<option>11weeks</option>
										<option>12weeks</option>
										<option>13weeks</option>
										<option>14weeks</option>
										<option>15weeks</option>
									</select> 
                        <input type="submit" class="btn btn-primary" value="Submit"/>
                      
                  </div>
                  <div class="topcomment">
                    <div class="comment">
                      <?php
                              $k=0;
                                $k=$k+1;
                                
                                ?>
                      <table class="table" style=" background:#efefef;" >
                        <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
                        <tbody>
                          <tr>
                            <td>Status</td>
                            <td>Responsibility</td>
                            <td>Timeline</td>
                            <td>Attachment </td>
                          </tr>
                          <tr>
                            <td><?php echo $timelineresult->complied; ?></td>
                            <td><?php echo $timelineresult->responsibility; ?></td>
                            <td><?php echo $timelineresult->timeline; ?> Weeks</td>
                            <td><a href="uploads/docupload/<?php echo $timelineresult->docupload; ?>">View File</a></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php
    $timelinequeryright="SELECT * FROM condition_timeline WHERE timeline_id='$timelineid' and complied IS NOT NULL ORDER BY id DESC";
                              $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
                              //$resuright=mysqli_fetch_object($querytimelineright);
                              
                              ?>
          <div class="show_right_cond" style="display:none;">
            <div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:700px; overflow-x: hidden;">
              <div class="row">
                <div class="col-md-12">
                  <div class="allitm">
                    <div class="topcomment-right">
                      <div class="comment">
                        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
                                <?php
      $timelinequeryrightm="SELECT * FROM condition_message WHERE lcid=".$$timelineresultright->id." ORDER BY id DESC";
                              $querytimelinerightm=$cudb->query($timelinequeryrightm) or die(mysqli_error());
                              
                              
                              ?>
                      <?php
    while($timelineresultrightm=mysqli_fetch_object($querytimelinerightm))
                              {
                                $k=$k+1;
                                ?>
                      <div class="commentdetails1">
                        <?php if($timelineresultrightm->m_type=='action') { ?>
                        <div class="btn-circle btn-xla"> A </div>
                        <?php } elseif ($timelineresultrightm->m_type=='suggestion') { ?>
                        <div class="btn-circle btn-xl">S</div>
                        <?php } elseif($timelineresultrightm->m_type=='remark') { ?>
                        <div class="btn-circle btn-xlb"> R </div>
                        <? } ?>
                        <div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
                          <p class="dsc1"> <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultrightm->user_id); ?> <?php echo $timelineresultrightm->submit_date; ?></span> <br />
                            <?php echo $timelineresultrightm->m_content; ?> </p>
                          <?php $tag_user=$timelineresultrightm->tag_user; 
          $taguser = explode(',', $tag_user);

          

    ?>
                          <?php 
    foreach($taguser as $value){ ?>
    <?php if($value) {?>
                          <div class="tagbar"><?php echo GetName('admin','fullname','id', $value); ?></div>
                          <?php } else{ ?>
                          <?php } ?>
                          <?php } ?>
                        </div>
                      </div>
                      <? } ?>
                      <?php if($timelineresultright->complied=='Complied') { ?> 
         <?php $color='4caf50'; ?>  
         <?php } else { ?>               
         <?php $color='efefef'; ?> 
         <?php } ?>
                        <table class="table1" style=" background:#<?php echo $color; ?>" >
                          <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
                          <tbody>
                            <tr>
                              <td>Status</td>
                              <td>Responsibility</td>
                              <td>Timeline</td>
                              <td>Attachment </td>
                            </tr>
                            <tr>
                              <td><?php echo $timelineresultright->complied; ?></td>
                              <td><?php echo $timelineresultright->responsibility; ?></td>
                              <td><?php echo $timelineresultright->timeline; ?>Week</td>
                              <td><a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>">View File</a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <?php } ?>
                        
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div role="tabpanel" class="tab-pane" id="additional">
        <section class="content">
          <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:100%; float:left; overflow-x: hidden; height:700px;">
            <div class="row">
              <div class="col-md-12" id="accordion_additional">
                <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='additional' AND cid=$cid order by Priority asc";
$query=$cudb->query($sql) or die(mysql_error());
?>
                <?php
     //loop through the page
     
        
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
        
        
          
          $i=$i+1;
          
        ?>
                <div class="allitm">
                  <div class="trns"> </div>
                  <div class="sln"><?php echo $i; ?></div>
                  <div class="dtl" style="width:35%;">
                    <?php
     $timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
                              $querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
                              $numrows=mysqli_num_rows($querytimeline);
                              $timelineresult=mysqli_fetch_object($querytimeline);
                              
                              if($timelineresult->complied=='Not Complied')
                              {
                                $complied='dist/img/red.png';
                              }
                              elseif($timelineresult->complied=='Complied')
                              {
                                $complied='dist/img/status.png';
                              }
                              elseif($timelineresult->complied=='Partially Complied')
                              {
                                $complied='dist/img/orrange.png';
                              }
                              
                              if($timelineresult->responsibility=='BOTH')
                              {
                                $response='dist/img/omc.png';
                              }
                              elseif($timelineresult->responsibility=='OMC')
                              {
                                $response='dist/img/redomc.png';
                              }
                              elseif($timelineresult->responsibility=='Consultant')
                              {
                                $response='dist/img/greenomc.png';
                              }
                              ?>
                    <?php echo $result->condition_text; ?> </div>
                  <div class="dtl-btn" style="width:62%;">
                    Contact Person <input type="text" class="textbox" style="width:100px;"/> 
					 Delivery Date <input type="text" class="textbox datepicker" data-date-format="mm/dd/yyyy" style="width:100px;"/> 
                      Alert Reminder <select class="textbox">
					 					<option>1week</option>
										<option>2weeks</option>
										<option>3weeks</option>
										<option>4weeks</option>
										<option>5weeks</option>
										<option>6weeks</option>
										<option>7weeks</option>
										<option>8weeks</option>
										<option>9weeks</option>
										<option>10weeks</option>
										<option>11weeks</option>
										<option>12weeks</option>
										<option>13weeks</option>
										<option>14weeks</option>
										<option>15weeks</option>
									</select> 
                        <input type="submit" class="btn btn-primary" value="Submit"/>
                      
                  </div>
                  <div class="topcomment">
                    <div class="comment">
                      <?php
                              $k=0;
                                $k=$k+1;
                                
                                ?>
                      <table class="table" style=" background:#efefef;" >
                        <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
                        <tbody>
                          <tr>
                            <td>Status</td>
                            <td>Responsibility</td>
                            <td>Timeline</td>
                            <td>Attachment </td>
                          </tr>
                          <tr>
                            <td><?php echo $timelineresult->complied; ?></td>
                            <td><?php echo $timelineresult->responsibility; ?></td>
                            <td><?php echo $timelineresult->timeline; ?> Weeks</td>
                            <td><a href="uploads/docupload/<?php echo $timelineresult->docupload; ?>">View File</a></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php
    $timelinequeryright="SELECT * FROM condition_timeline WHERE timeline_id='$timelineid' and complied IS NOT NULL ORDER BY id DESC";
                              $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
                              //$resuright=mysqli_fetch_object($querytimelineright);
                              
                              ?>
          <div class="show_right_cond" style="display:none;">
            <div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:700px; overflow-x: hidden;">
              <div class="row">
                <div class="col-md-12">
                  <div class="allitm">
                    <div class="topcomment-right">
                      <div class="comment">
                        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
                                <?php
      $timelinequeryrightm="SELECT * FROM condition_message WHERE lcid=".$timelineresultright->id." ORDER BY id DESC";
                              $querytimelinerightm=$cudb->query($timelinequeryrightm) or die(mysqli_error());
                              
                              
                              ?>
                      <?php
    while($timelineresultrightm=mysqli_fetch_object($querytimelinerightm))
                              {
                                $k=$k+1;
                                ?>
                      <div class="commentdetails1">
                        <?php if($timelineresultrightm->m_type=='action') { ?>
                        <div class="btn-circle btn-xla"> A </div>
                        <?php } elseif ($timelineresultrightm->m_type=='suggestion') { ?>
                        <div class="btn-circle btn-xl">S</div>
                        <?php } elseif($timelineresultrightm->m_type=='remark') { ?>
                        <div class="btn-circle btn-xlb"> R </div>
                        <? } ?>
                        <div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
                          <p class="dsc1"> <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultrightm->user_id); ?> <?php echo $timelineresultrightm->submit_date; ?></span> <br />
                            <?php echo $timelineresultrightm->m_content; ?> </p>
                          <?php $tag_user=$timelineresultrightm->tag_user; 
          $taguser = explode(',', $tag_user);

          

    ?>
                          <?php 
    foreach($taguser as $value){ ?>
                          <div class="tagbar"><?php echo GetName('admin','fullname','id', $value); ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <? } ?>
                        <table class="table1" style=" background:#efefef;" >
                          <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
                          <tbody>
                            <tr>
                              <td>Status</td>
                              <td>Responsibility</td>
                              <td>Timeline</td>
                              <td>Attachment </td>
                            </tr>
                            <tr>
                              <td><?php echo $timelineresultright->complied; ?></td>
                              <td><?php echo $timelineresultright->responsibility; ?></td>
                              <td><?php echo $timelineresultright->timeline; ?>Week</td>
                              <td><a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>">View File</a></td>
                            </tr>
                          </tbody>
                        </table>

                        
                        <?php } ?>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"> </div>
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Odishagovt</a>. All rights
    reserved. </footer>
</div>
<!-- ./wrapper --> 
<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 
<!-- Bootstrap 3.3.7 --> 
<script src="dist/js/bootstrap.min.js"></script> 
<script src="dist/js/bootstrap-datepicker.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion').find('.dtl').click(function(){
      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });
</script> 
<script type="text/javascript">
           $('.datepicker').datepicker({
    startDate: '-3d'
});
        </script>
<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion_spcial').find('.dtl').click(function(){

      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });
</script> 
<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion_additional').find('.dtl').click(function(){

      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });
</script> 
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> 
<!-- AdminLTE App --> 
<script src="dist/js/adminlte.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#updatetab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
</body>
</html>
