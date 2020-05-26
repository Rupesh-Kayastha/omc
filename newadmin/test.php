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
    padding: 10px 10px;}
.btn-circle.btn-xl {
    width: 40px;
    height: 40px;
    padding: 10px 10px;
    font-size: 20px;
    line-height: 20px;
    border-radius: 35px;
    background: #d44207;
    color: #fff; float:left;
}
.btn-circle.btn-xla {
    width: 40px;
    height: 40px;
    padding: 10px 10px;
    font-size: 20px;
    line-height: 20px;
    border-radius: 35px;
    background: #03A9F4;
    color: #fff; float:left;
}
.btn-circle.btn-xlb {
    width: 40px;
    height: 40px;
    padding: 10px 10px;
    font-size: 20px;
    line-height: 20px;
    border-radius: 35px;
    background: #4caf50;
    color: #fff; float:left;
}
.trns {
    width: 93%;
    height: 200px;
    position: absolute;
    z-index: 9999;
    background: #000000b5;
    top: -12px;
    left: 13px;
    margin: 13px; display:none;
}
ul.icn {
    margin: 0px;
    padding: 0px;
}
ul.icn li {
    list-style: none;
    text-align: center;
    margin-bottom:2px;
}
.allitm {
    margin-bottom: 10px;
    float: left;
    border-bottom: 1px solid #ccc;
}
.sln {
    width: 3%;
    float: left;
}
.dtl{ width:93%; float:left; text-align:justify;}
.dtl-btn{ width:4%; float:right; text-align:right;}
.comment{ width:100%; float:left;}
.topcomment{ width:86%; float:left; margin-top:5px; margin-left:10%;border-radius: 5px; margin-bottom:5px;}
.topcomment-right {
    width: 100%;
    float: left;
    margin-top: 5px;
    border-radius: 5px;
    margin-bottom: 5px;
    padding: 2%;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;}
	
.table1>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;
	}
	
.commentdetails{ margin-top:10px; font-weight:bold; float:left;width:100%;}	
	span.msgby {
    font-size: 12px;
    color: #b1afaf; 
    font-weight: normal;
}

.commentdetails1{ margin-top:20px; font-weight:bold; float:left;width:100%;}	
	span.msgby {
    font-size: 11px;
    color: #b1afaf; 
    font-weight: normal;
	margin-top:20px;
}


p.dsc {
    font-size: 13px;
    color: #414242;
    font-weight: normal;
    font-family: 'Work Sans', sans-serif;
	min-width:100%;
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
	margin-left:6px;
}
.content {
    padding-left: 0px; padding-right: 0px;
   
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
    width: 100%; font-size: 11px;
}
p.dsc1 {
    font-size: 11px;
    color: #414242;
    font-weight: normal;
    font-family: 'Work Sans', sans-serif;
    min-width: 100%; margin-bottom:20px;
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

.topctg{ width:100%; float:left; margin-bottom:20px; background:#424140; padding-top:10px; padding-bottom:10px; position:fixed; margin-bottom:30px;}
.topctg ul{ margin:auto;}
.topctg li{ list-style:none; font-size:14px; text-align:center; float:left; margin-left:5px; margin-right:5px; padding-left:5px; padding-right:5px;}
.topctg li a{ text-decoration:none; color:#fff; font-family: 'Work Sans', sans-serif;; font-size:14px;}

.nav-tabs{border-bottom: 2px solid #DDD;
    width: 97% !important;
    margin: 0 auto !important;
	    background: #fff;
    margin-top: 15px !important;
    font-weight: 600;
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
      <h1><a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a> <?php echo GetName('projects','p_name','id',$pid); ?> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>
    <!-- Main content -->
	<ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Condition</a></li>
                                        <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special Condition</a></li>
                                        <li role="presentation"><a href="#additional" aria-controls="additional" role="tab" data-toggle="tab">Additional Condition</a></li>
                                       
                                    </ul>
									
									<div class="tab-content" style="padding-top:0px;">
									<div role="tabpanel" class="tab-pane active" id="general">
									<section class="content">
	<div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:70%; float:left; overflow-x: hidden; height:700px;">
	<div class="mark"> </div>
      <div class="row">
        <div class="col-md-12">
		<div class="allitm">
		<div class="trns"> </div>
		<div class="sln">1</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="OMC"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
			
		<div class="topcomment"> 
		<div class="comment">
		
		<table class="table" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xl"> S </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xla"> A </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 We met the regional water resources dept person in this regard. they have adviced us to appoint a permanent person to handle the sample collection and we shall be appointing mr XYZ for the same. hope ot rums good.
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xlb"> R </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		Thats some quick action. Keep it up. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		</div>		  
				  
				  
				  
		</div>
          
		  <div class="allitm">
		<div class="trns"> </div>
		<div class="sln">2</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
		</div>
		
		<div class="allitm">
		<div class="trns"> </div>
		<div class="sln">3</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
		</div>
		  
		  
		  <div class="allitm">
		<div class="trns"> </div>
		<div class="sln">1</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="OMC"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
			
		<div class="topcomment"> 
		<div class="comment">
		
		<table class="table" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xl"> S </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xla"> A </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 We met the regional water resources dept person in this regard. they have adviced us to appoint a permanent person to handle the sample collection and we shall be appointing mr XYZ for the same. hope ot rums good.
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		<div class="commentdetails">
		
		<div class="btn-circle btn-xlb"> R </div>
		<div style="width: calc(100% - 60px); float:right;">
		
		<p class="dsc">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		Thats some quick action. Keep it up. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
		
		</div>		  
				  
				  
				  
		</div>
          
		  <div class="allitm">
		<div class="trns"> </div>
		<div class="sln">2</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
		</div>
		
		<div class="allitm">
		<div class="trns"> </div>
		<div class="sln">3</div>
		<div class="dtl">
				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent. 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.
 				  If the proponent fails to start operation of the project but substantial physical progress has been made then a renewal of this consent shall be sought by the proponent.



				  
				   </div>
		<div class="dtl-btn">
				 <ul class="icn">
				 <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/omc.png" alt=" " height="15" width="15"> 
				 
				 </a>  </li>
				 
				<li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/status.png" alt=" " height="15" width="15"> </a>  </li>
				 
				 <li> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
				 </ul>
				   </div>
				  
		</div>
		  
        </div>
      </div>
</div>

<div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:auto; overflow-x: hidden;">
	
      <div class="row">
        <div class="col-md-12">
		<div class="allitm">
		
		<div class="topctg" style="position:inherit; margin-bottom:0px;" > 
		<ul> 
		<li> <a href="#"> Suggestion</a></li>
		<li> <a href="#"> Remark</a></li>
		<li> <a href="#"> Action </a></li>
		<li> <a href="#"> Status</a></li>
		
		</ul>
		</div>
		
		
		
   
          
    

		
		<div style="width:100%; float:left; overflow:auto; height:640px;">
		<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>		  
				  
			<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>
		
		
		
		<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>
		
		<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>
		
		<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>
		
		<div class="topcomment-right"> 
		<div class="comment">
		
		<table class="table1" style=" background:#efefef;" >
    <span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td> Timeline</td>
		 <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td>Not completed</td>
        <td>its completed</td>
        <td>13 days</td>
		 <td>view</td>
       
       
      </tr>
	  
    </tbody>
  </table>
		</div>
		</div>
		<div class="commentdetails1">
		
		<div class="btn-circle btn-xl-righta"> S </div>
		<div style="width: calc(100% - 40px); float:right; margin-bottom:20px;">
		
		<p class="dsc1">
		<span class="msgby"> Message by Deputy Director 23/03/2017 08:30 PM</span>
		<br />
		 Why dont u try to contact the regional water department in this regards. they might be able to help you collect water from the proper source. 
</p>
		
		<div class="tagbar">R.M </div>
		<div class="tagbar">M.M </div>
		<div class="tagbar">E.M.C </div>
		
		</div>
		 </div>
	
		</div>	  
				  
		</div>
          
		  
		
		
		  
        </div>
      </div>
</div>


    </section>	
									</div>
									<div role="tabpanel" class="tab-pane active" id="special">	
									</div>
									<div role="tabpanel" class="tab-pane active" id="additional">
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
<script src="editor.js"></script>
<script>
	$(document).ready(function() {
		$("#txtEditor").Editor();
	
    $(".list").click(function () {
        $("li", this).slideToggle();
    });
});
</script>
<script>
$(document).ready(function(){

    $(".clk").click(function(){
        $(".trns").slideToggle();
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
</body>
</html>
