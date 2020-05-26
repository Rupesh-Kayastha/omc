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
$cid=$_GET['cid'];
$pid=$_GET['pid'];
$editid=$_GET['editid'];
$type=$_GET['type'];


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
  $target_dir = "uploads/docupload/";
  $target_file = $target_dir . basename($_FILES["docupload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if (move_uploaded_file($_FILES["docupload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $docupload=basename( $_FILES["docupload"]["name"]); // used to store the filename in a variable
				if($docupload)
				{
   echo $upclist="UPDATE condition_timeline SET complied='$complied', user_id='$user_id', remark='$remark', suggestion='$suggestion', action_taken='$action_taken', timeline='$timeline', responsibility='$responsibility', docupload='$docupload' WHERE id='$clistupdate'";
}
else
{
	echo $dbimg=GetName('condition_timeline', 'docupload','id',$clistupdate);
	$upclist="UPDATE condition_timeline SET complied='$complied', user_id='$user_id', remark='$remark', suggestion='$suggestion', action_taken='$action_taken', timeline='$timeline', responsibility='$responsibility', docupload='$dbimg' WHERE id='$clistupdate'";
}

$upres=$cudb->query($upclist) or die(mysqli_error());
 echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> clerance Conditions  Updated sucessfully....
</div>";
header("Location: userviewupdate.php?cid=".$cid."");
//for sms intigrationz
$mobilenos=GetName('clerance','mobileno','id',$cid);
$clrns=GetName('clerance','c_name','id',$cid);
$prj=GetName('projects','p_name','id',$pid);
$prjnumber=GetName('projects','phone','id',$pid);
$usrreply=GetName('admin','username','id',$_SESSION["UsrID"]);
$allmobileno="".$mobilenos.",".$prjnumber."";
$msgcontent="A New Reply To ".$clrns." by User ".$usrreply." for the project ".$prj."";
function curl($url)
{
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}
$mobile = $allmobileno; //enter Mobile numbers comma seperated
$username = "krititechh"; //your username
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
<!-- Google Font --><script src="dist/js/jquery.min.js"></script> 
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.thead {
	width: 100%;
	float: left;
	text-align: center;
	text-transform: uppercase;
}
.tfx {
	width: 100%;
	float: left;
	height: 300px;
	overflow: auto;
	font-size: 14px;
	text-align: center;
}
.table-bordered {
	border: 1px solid rgba(0,0,0,0.2);
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	border: 1px solid rgba(0,0,0,0.2);
	text-align: center;
	color: #fff;
}
h3 {
	margin-top: 0px;
}
thead.thbg {
	background: rgba(0,0,0,0.4);
	color: #fff;
	font-weight: normal;
}
.table-bordered>thead>tr>th {
	font-weight: normal;
}
.table-striped > tbody > tr:nth-of-type(2n+1) {
	background: rgba(0,0,0,0.1) !important;
}
.table {
	margin-bottom: 0px;
}
.clist ul li {
	list-style: decimal;
}

@media print {
.main-sidebar {
	display: none;
}
.main-header {
	display: none;
}
.tfx {
	height: auto;
	overflow: inherit;
}
.main-footer {
	display: none;
}
table-bordered {
	border: 1px solid rgba(0,0,0,0.2);
}
.nonprint {
	display: none;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	border: 1px solid rgba(0,0,0,0.2);
	text-align: center;
	color: #fff;
}
}
.alert.alert-success.fade.in.alert-dismissable {
	position: absolute;
	left: 278px;
	background: green;
}
thead.bgcolor {
    background: #3d3838;
}
table#userview1 td {
    color: #000000;
}
table#userview2 td {
    color: #000000;
}

div#general,div#special, div#additional {
    height: 490px;
    overflow-y: scroll !important;
    max-height: none;
    min-height: 0px;
    max-width: none;
    min-width: 0px;

}
.tab-pane {padding: 0px;}
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
    <h1 class="text-center"><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a><?php echo GetName('projects','p_name','id',$pid); ?></h1><h1><?php echo GetName('clerance','c_name','id',$cid); ?></h1>
    <ol class="breadcrumb">
	
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Project</li>
    </ol>
  </section>
		
	<div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Condition</a></li>
                                        <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special Condition</a></li>
                                        <li role="presentation"><a href="#additional" aria-controls="additional" role="tab" data-toggle="tab">Additional Condition</a></li>
                                       
                                    </ul>
																																				 <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="general">
																																									 <table class="table table-striped table-bordered" id="userview">
																																								<thead>
                                                                                <tr>
               
                <th>Conditions</th>
                <th >Status</th>
                <th>Responsibility</th>
                <th>Suggestion</th>
                <th>Action Taken</th>
                <th>Timeline</th>
                <th>Remarks</th>
                <th>Update</th>
              </tr>
            </thead>
															<tbody>
              <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='general' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());
?>
              <?php
     //loop through the page
     
       
        $i=2;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>
        
              <tr>
																<?php
															$timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id";
															$querytimeline=$cudb->query($timelinequery) or die(mysqli_error());
															$numrows=mysqli_num_rows($querytimeline);
															?>
<td rowspan="<?php echo $numrows; ?>" class="wordwrap"><?php echo $result->condition_text; ?></td>
														
															
															<?php
															$k=2;
															while($timelineresult=mysqli_fetch_object($querytimeline))
															{
																$k=$k+1;
																?>
									
																
                <form name="cupdate" id="cupdate" method="post" enctype="multipart/form-data">
                  <?php if($type==edit && $editid==$timelineresult->id) { ?>
                  <td style="width:100px;"><select class="form-control complied" name="complied" id="complied">
                  	<option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select></td>
                  <td><select class="form-control responsibility" name="responsibility" id="responsibility">
                  	<option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select></td>
                  <td>

                  	<input class="form-control" value="<?php echo $timelineresult->suggestion; ?>" type="text" name="suggestion" id="suggestion"></td>
                  <td><input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>"></td>
                  <td><select class="form-control" name="timeline" id="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) {	?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select></td>
                  <td><input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark">
																		<input type="file" value="<?php echo $timelineresult->docupload; ?>" name="docupload" id="docupload" style="width: 99%;"></td>
																	
                  <?php if($type=="edit") { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                    </td>
                  <?php } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  <?php } else { ?>


                  <td style="width:100px;"><?php if($timelineresult->complied) { ?>
                    <?php echo $timelineresult->complied; ?>
                    <?php } else { ?>
                    <select class="form-control complied" name="complied" id="complied">
                    	<option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select>
                    <?php } ?></td>
                  <td style="width:100px;"><?php if($timelineresult->responsibility || $timelineresult->complied) { ?>
                    <?php echo $timelineresult->responsibility; ?>
                    <?php } else { ?>
                    <select class="form-control responsibility" name="responsibility" id="responsibility">
                    	<option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select>
                    <?php } ?></td>
                  <td class="nonprint" style="width:100px;">
                  	<?php if($timelineresult->suggestion || $timelineresult->complied) { ?>
                    <?php echo $timelineresult->suggestion; ?>
                    <?php } else if($timelineresult->responsibility=='OMC') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                    <input class="form-control"  value="<?php echo $timelineresult->suggestion; ?>" type="text" name="suggestion" id="suggestion">
                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;">
                  	<?php if($timelineresult->action_taken || $timelineresult->complied) { ?>
                    <?php echo $timelineresult->action_taken; ?>
                    <?php } else if($timelineresult->responsibility=='Consultant') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                     <input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>">

                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;"><?php if($timelineresult->timeline || $timelineresult->complied) { ?>
                    <?php echo $timelineresult->timeline; ?>&nbsp;<?php if($timelineresult->timeline) { ?><?php echo "Week"; ?> <?php } ?>
                    <?php } else { ?>
                    <select class="form-control" name="timeline" id="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=80; $j++) {	?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    <?php } ?></td>
                  <td style="width:110px;">
                  	<?php if($timelineresult->remark || $timelineresult->complied) { ?>
                    <?php echo $timelineresult->remark; ?>
                    <?php } else if ($timelineresult->complied=='Complied') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>
                     <input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark">

                    <?php } ?>

                    <br />
                    <?php if($timelineresult->docupload) { ?>
                    <a href="uploads/docupload/<?php echo $timelineresult->docupload; ?>">View File</a>
                    <?php } else { ?>
                    <input type="file" value="<?php echo $timelineresult->docupload; ?>" name="docupload" id="docupload" style="width: 100%;">
																			
                    <?php } ?>
                    </td>
                  <?php if($timelineresult->timeline  && $timelineresult->responsibility) { ?>
                  <td class="nonprint" style="width:100px;">Updated By <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <br> <div id="clickreply" class="btn btn-primary clicktoaddid" data-toggle="modal" data-id="<?php echo $timelineresult->timeline_id; ?>" data-target=".myModal">Add Reply</div></td>
                  <?php } elseif($timelineresult->complied) { ?>
																		<td class="nonprint" style="width:100px;"><a href="userviewupdate.php?cid=<?php echo $cid; ?>&editid=<?php echo $timelineresult->id; ?>&type=edit&pid=<?php echo $pid; ?>"> Edit </a></td>
																		<? } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  
                  <?php } ?>
                  <input type="hidden" name="clistupdate" id="clistupdate" value="<?php echo $timelineresult->id; ?>">
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
                 
                </form>
								</tr>

                




							<?php } ?>
              </tr>
              <?php } ?>
            </tbody>																									
																																								
          </table>
																																										
																																								</div>
																																								<div role="tabpanel" class="tab-pane" id="special">
																																									<table class="table table-striped table-bordered" id="userview1">
                                                                                <thead>
                                                                                <tr>
               
                <th>Conditions</th>
                <th>Status</th>
                <th>Responsibility</th>
                <th>Suggestion</th>
                <th>Action Taken</th>
                <th>Timeline</th>
                <th>Remarks</th>
                <th>Update</th>
              </tr>
            </thead>
                              <tbody>
              <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='special' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());
?>
              <?php
     //loop through the page
     
       
        $i=2;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>
        
              <tr class="temphide">
                                <?php
                              $timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id";
                              $querytimeline=$cudb->query($timelinequery) or die(mysql_error());
                              $numrows=mysqli_num_rows($querytimeline);
                              ?>
                <td rowspan="<?php echo $numrows; ?>" class="wordwrap"><?php echo $result->condition_text; ?></td>
                            
                              
                              <?php
                              $k=2;
                              while($timelineresult=mysqli_fetch_object($querytimeline))
                              {
                                $k=$k+1;
                                ?>
                  
                               
                                  
                <form name="cupdate" id="cupdate" method="post" enctype="multipart/form-data">
                  <?php if($type==edit && $editid==$timelineresult->id) { ?>
                  <td style="width:100px;"><select class="form-control complied" name="complied" id="complied">
                    <option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select></td>
                  <td><select class="form-control responsibility" name="responsibility" id="responsibility">
                    <option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select></td>
                  <td>

                    <input class="form-control" <?php
                    $uname=GetName('admin','username','id',$_SESSION["UsrID"]);
                     if($uname=='omc') { ?>disabled <? } ?> value="<?php echo $timelineresult->suggestion; ?>" type="text" name="suggestion" id="suggestion"></td>


                  <td><input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>"></td>
                  <td><select class="form-control" name="timeline" id="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Day</option>
                      <?php } ?>
                    </select></td>
                  <td><input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark"></td>
                  <?php if($type=="edit") { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                    </td>
                  <?php } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  <?php } else { ?>


                  <td style="width:100px;"><?php if($timelineresult->complied) { ?>
                    <?php echo $timelineresult->complied; ?>
                    <?php } else { ?>
                    <select class="form-control complied" name="complied" id="complied">
                      <option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select>
                    <?php } ?></td>
                  <td style="width:100px;"><?php if($timelineresult->responsibility) { ?>
                    <?php echo $timelineresult->responsibility; ?>
                    <?php } else { ?>
                    <select class="form-control responsibility" name="responsibility" id="responsibility">
                      <option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select>
                    <?php } ?></td>
                  <td class="nonprint" style="width:100px;">
                    <?php if($timelineresult->suggestion) { ?>
                    <?php echo $timelineresult->suggestion; ?>
                    <?php } else if($timelineresult->responsibility=='OMC') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                    <input class="form-control" value="<?php echo $timelineresult->suggestion; ?>" type="text" <?php
                    $uname=GetName('admin','username','id',$_SESSION["UsrID"]);
                     if($uname='omc') { ?>disabled <? } ?> name="suggestion" id="suggestion">
                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;">
                    <?php if($timelineresult->action_taken) { ?>
                    <?php echo $timelineresult->action_taken; ?>&nbsp;<?php if($timelineresult->timeline) { ?><?php echo "Week"; ?> <?php } ?>
                    <?php } else if($timelineresult->responsibility=='Consultant') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                     <input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>">

                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;"><?php if($timelineresult->timeline) { ?>
                    <?php echo $timelineresult->timeline; ?>
                    <?php } else { ?>
                    <select class="form-control" name="timeline" id="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    <?php } ?></td>
                  <td style="width:100px;">
                    <?php if($timelineresult->remark) { ?>
                    <?php echo $timelineresult->remark; ?>
                    <?php } else if ($timelineresult->complied=='Complied') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>
                     <input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark">

                    <?php } ?>

                    <br />
                    <input type="file" name="docupload" id="docupload"></td>
                  <?php if($timelineresult->timeline  && $timelineresult->responsibility && $timelineresult->complied) { ?>
                  <td class="nonprint" style="width:100px;"><a href="userviewupdate.php?cid=<?php echo $cid; ?>&editid=<?php echo $timelineresult->id; ?>&type=edit"> Edit </a></td>
                  <?php } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  <?php } ?>
                  <input type="hidden" name="clistupdate" id="clistupdate" value="<?php echo $timelineresult->id; ?>">
                </form>
                              </tr>
                              <?php } ?>
              </tr>
              <?php } ?>
            </tbody>                                                  
                                                                                
          </table>
																																									
																																									
																																								</div>
																																								<div role="tabpanel" class="tab-pane" id="additional">
                                                                                  <table class="table table-striped table-bordered" id="userview2">
                                                                                <thead>
                                                                                <tr>
               
                <th>Conditions</th>
                <th>Status</th>
                <th>Responsibility</th>
                <th>Suggestion</th>
                <th>Action Taken</th>
                <th>Timeline</th>
                <th>Remarks</th>
                <th>Update</th>
              </tr>
            </thead>
                              <tbody>
																															
              <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='additional' AND cid=$cid";
$query=$cudb->query($sql) or die(mysql_error());
?>
              <?php
     //loop through the page
     
       
        $i=2;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>
        
              <tr class="temphide">
                                <?php
                              $timelinequery="SELECT * FROM condition_timeline WHERE timeline_id=$result->id";
                              $querytimeline=$cudb->query($timelinequery) or die(mysql_error());
                              echo $numrows=mysqli_num_rows($querytimeline);
                              ?>
																														
																											
																														
																						
                <td rowspan="<?php echo $numrows+1; ?>"><?php echo $result->condition_text; ?></td>
                            
                              
                              <?php
                              $k=2;
                              while($timelineresult=mysqli_fetch_object($querytimeline))
                              {
                                $k=$k+1;
                                ?>
                  
                                <tr>
                                  
                <form name="cupdate" id="cupdate" method="post">
                  <?php if($type==edit && $editid==$timelineresult->id) { ?>
                  <td style="width:100px;">
																			<select class="form-control complied" name="complied" id="complied">
                    <option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select></td>
                  <td><select class="form-control responsibility" name="responsibility" id="responsibility">
                    <option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select></td>
                  <td>

                    <input class="form-control" <?php
                    $uname=GetName('admin','username','id',$_SESSION["UsrID"]);
                     if($uname=='omc') { ?>disabled <? } ?> value="<?php echo $timelineresult->suggestion; ?>" type="text" name="suggestion" id="suggestion"></td>


                  <td><input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>"></td>
                  <td><select class="form-control" name="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select></td>
                  <td><input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark"></td>
                  <?php if($type=="edit") { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                    </td>
                  <?php } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  <?php } else { ?>


                  <td style="width:100px;"><?php if($timelineresult->complied) { ?>
                    <?php echo $timelineresult->complied; ?>
                    <?php } else { ?>
                    <select class="form-control complied" name="complied" id="complied">
                      <option value="">Select Option</option>
                      <option value="Complied" <?php if($timelineresult->complied=='Complied') { ?>selected <?php } ?>>Complied</option>
                      <option value="Not Complied" <?php if($timelineresult->complied=='Not Complied') { ?>selected <?php } ?>>Not Complied</option>
                      <option value="Partially Complied" <?php if($timelineresult->complied=='Partially Complied') { ?>selected <?php } ?>>Partially Complied</option>
                    </select>
                    <?php } ?></td>
                  <td style="width:100px;"><?php if($timelineresult->responsibility) { ?>
                    <?php echo $timelineresult->responsibility; ?>
                    <?php } else { ?>
                    <select class="form-control responsibility" name="responsibility" id="responsibility">
                      <option value="">Select Option</option>
                      <option value="Consultant" <?php if($timelineresult->responsibility=='Consultant') { ?>selected <?php } ?>>Consultant</option>
                      <option value="OMC" <?php if($timelineresult->responsibility=='OMC') { ?>selected <?php } ?>>OMC</option>
                      <option value="BOTH" <?php if($timelineresult->responsibility=='BOTH') { ?>selected <?php } ?>>BOTH</option>
                    </select>
                    <?php } ?></td>
                  <td class="nonprint" style="width:100px;">
                    <?php if($timelineresult->suggestion) { ?>
                    <?php echo $timelineresult->suggestion; ?>
                    <?php } else if($timelineresult->responsibility=='OMC') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                    <input  class="form-control" <?php
                    $uname=GetName('admin','username','id',$_SESSION["UsrID"]);
                     if($uname=='omc') { ?>disabled <? } ?> value="<?php echo $timelineresult->suggestion; ?>" type="text" name="suggestion" id="suggestion">
                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;">
                    <?php if($timelineresult->action_taken) { ?>
                    <?php echo $timelineresult->action_taken; ?>
                    <?php } else if($timelineresult->responsibility=='Consultant') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>

                     <input type="text" class="form-control" name="action_taken" id="action_taken" value="<?php echo $timelineresult->action_taken; ?>">

                    <?php } ?>

                </td>
                  <td class="nonprint" style="width:100px;"><?php if($timelineresult->timeline) { ?>
                    <?php echo $timelineresult->timeline; ?>
                    <?php } else { ?>
                    <select class="form-control" name="timeline">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>" <?php if($timelineresult->timeline==$j) { ?>selected <?php } ?>><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    <?php } ?></td>
                  <td style="width:100px;">
                    <?php if($timelineresult->remark) { ?>
                    <?php echo $timelineresult->remark; ?>
                    <?php } else if ($timelineresult->complied=='Complied') { ?>
                   <?php echo "N/A"; ?>
                    <?php } else { ?>
                     <input class="form-control" type="text" value="<?php echo $timelineresult->remark; ?>" name="remark" id="remark">

                    <?php } ?>

                    <br />
                    <input type="file" name="docupload" id="docupload" style="width: 100%;"></td>
                  <?php if($timelineresult->timeline  && $timelineresult->responsibility && $timelineresult->complied) { ?>
                  <td class="nonprint" style="width:100px;"><a href="userviewupdate.php?cid=<?php echo $cid; ?>&editid=<?php echo $timelineresult->id; ?>&type=edit"> Edit </a></td>
                  <?php } else { ?>
                  <td class="nonprint" style="width:100px;"><input type="submit" name="submit" class="btn btn-primary" value="Update"></td>
                  <?php } ?>
                  <?php } ?>
                  <input type="hidden" name="clistupdate" id="clistupdate" value="<?php echo $timelineresult->id; ?>">
                </form>
                              </tr>
                              <?php } ?>
              </tr>
              <?php } ?>
            </tbody>                                                  
                                                                                
          </table>
																																								</div>
																																					</div>
</div>
</div>
		
  
  <!-- Main content -->
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs"> </div>
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Odishagovt</a>. All rights
    reserved. </footer>
</div>

<!-- ./wrapper --> 
</div>
<!-- jQuery 3 --> 

<div class="modal fade myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your Comment For this Condition </h4>
        </div>
        <div class="modal-body">  

          <form method="post" class="reply_data" name="reply_data" id="reply_data" enctype="multipart/form-data">
          <p>
            <label>Status</label>
            <select class="form-control complied" name="complied_r" id="complied_r">
                    <option value="">Select Option</option>
                      <option value="Complied">Complied</option>
                      <option value="Not Complied">Not Complied</option>
                      <option value="Partially Complied">Partially Complied</option>
                    </select></p>
										<div id="hideres">
             <label>Responsibility</label>  
             <select class="form-control responsibility" name="responsibility_r" id="responsibility_r">
                    <option value="">Select Option</option>
                      <option value="Consultant">Consultant</option>
                      <option value="OMC">OMC</option>
                      <option value="BOTH">BOTH</option>
                    </select> 
</div>
										<div id="hidesug">
              <label>Suggestion From Consultant Desc</label> 
              <input class="form-control" value="" type="text" name="suggestion_r" id="suggestion_r">
										</div>
										<div id="hideact">
              <label>Action Taken</label>
              <input type="text" class="form-control" name="action_taken_r" id="action_taken_r" value="">
										</div>
										<div id="hidetim">
              <label>Timeline</label> 
              <select class="form-control" name="timeline_r" id="timeline_r">
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>"><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
										</div>
              <label>Remark</label> 
              <input class="form-control" type="text" value="" name="remark_r" id="remark_r">
              <label>Upload Doc</label>
              <input type="file" name="docupload" id="docupload">
              <input type="hidden" name="r_user_id" id="r_user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
              <input type="hidden" name="timeline_id_r" id="timeline_id_r" value="<?php echo $timelineresult->timeline_id ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
<br>
              <div class="submit btn btn-primary add_reply">Add Reply</div>
              </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  

<!-- Bootstrap 3.3.7 --> 
<script src="dist/js/bootstrap.min.js"></script> 

<!-- AdminLTE App --> 
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/tableFixer.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
  $("#userview").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
  $("#userview1").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
  $("#userview2").tableHeadFixer({left:0,head:true,headBG:"#423e3d",leftBG:"#f4f4f4"});
});
</script>
<!--<script type="text/javascript">
									$(document ).ready(function() {
									$(".complied").change(function () {
            if ($(this).val() == "Complied") {								
													$(this).closest('td').next('td').next('td').next('td').next('td').next('td').find('#remark').hide();
            } else {
                $("td").find("#remark").show();
            }
        });	
									$(".responsibility").change(function () {
            if ($(this).val() == "Consultant") {								
													$(this).closest('td').next('td').next('td').find('#action_taken').hide();
													$(this).closest('td').next('td').find('#suggestion').show();
            } else if($(this).val() == "OMC") {
                $(this).closest('td').next('td').find('#suggestion').hide();
																$(this).closest('td').next('td').next('td').find('#action_taken').show();
            } else {
													$(this).closest('td').next('td').find('#suggestion').show();
													$(this).closest('td').next('td').next('td').find('#action_taken').show();
												}
        });
								});
								</script> -->
                <script type="text/javascript">
//triggered when modal is about to be shown
$(document).on("click", ".clicktoaddid", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #timeline_id_r").val(myBookId);
     
});
</script>

                <script type="text/javascript">
                  $(document).ready(function() {
                  $(".complied").change(function () {
                  if ($(this).val() == "Complied") {
                    $(this).closest('td').next('td').find('#responsibility').hide();
                    $(this).closest('td').next('td').next('td').find('#suggestion').hide();
                    $(this).closest('td').next('td').next('td').next('td').find('#action_taken').hide();
                    $(this).closest('td').next('td').next('td').next('td').next('td').find('#timeline').hide();

                    }

                    else
                      {

                    $(this).closest('td').next('td').find('#responsibility').show();
                    $(this).closest('td').next('td').next('td').find('#suggestion').show();
                    $(this).closest('td').next('td').next('td').next('td').find('#action_taken').show();
                    $(this).closest('td').next('td').next('td').next('td').next('td').find('#timeline').show();
                  
  
                      }
        }); 
                  
                });
                </script>
																
																<script type="text/javascript">
                  $(document).ready(function() {
                  $(".complied").change(function () {
																			
                  if ($(this).val() == "Complied") {
                    $(this).closest('div').find('#hideres').hide();
                    $(this).closest('div').find('#hidesug').hide();
                    $(this).closest('div').find('#hideact').hide();
                    $(this).closest('div').find('#hidetim').hide();
                    }

                    else
                      {

                    $(this).closest('div').find('#hideres').show();
                    $(this).closest('div').find('#hidesug').show();
                    $(this).closest('div').find('#hideact').show();
                    $(this).closest('div').find('#hidetim').show();
                  
  
                      }
        }); 
                  
                });
                </script>

                <script>
$(document).ready(function(){
$(".add_reply").click(function () {  
    var postData = new FormData($('#reply_data')[0]);
    postData.append("complied_r", $("select[name=complied_r]").val()); 
    postData.append("responsibility_r", $("select[name=responsibility_r]").val());
    postData.append("suggestion_r", $("input[name=suggestion_r]").val());
    postData.append("action_taken_r", $("input[name=action_taken_r]").val()); 
    postData.append("timeline_r", $("select[name=timeline_r]").val()); 
    postData.append("remark_r", $("input[name=remark_r]").val());
    postData.append("r_user_id", $("input[name=r_user_id]").val());
    postData.append("timeline_id_r", $("input[name=timeline_id_r]").val());
    postData.append("rcid", $("input[name=rcid]").val());
    postData.append("rpid", $("input[name=rpid]").val());
    postData.append('docupload', $('input[type=file]')[0].files[0]); 
   // alert(postData);
        $.ajax({
            url: "update_reply.php",
            type:'POST',
            data:postData,
            success: function(response) {
          alert("Reply Added Successfully to This Condition");
          //location.reload();
        },
        processData: false,
        contentType: false
        });
});
});
</script>

</body>
</html>
