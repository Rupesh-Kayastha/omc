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
<link rel="stylesheet" href="dist/css/parsley.css">
<!-- ----test----- -->
<link rel="stylesheet" href="dist/css/multiple-select.css">

<!-- ----test end------ -->
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
    margin-right: 10px;
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
    margin-right: 10px;
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
    margin-right: 10px;
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
    width: 100%;
    padding:7px;
}
.sln {
    width: 3%;
    float: left;
}
.dtl{ width:93%; float:left; text-align:justify; cursor: pointer;}
.dtl-btn{ width:4%; float:right; text-align:right;}
.comment{ width:100%; float:left;}
.topcomment{ width:86%; float:left; margin-top:5px; margin-left:10%;border-radius: 5px; margin-bottom:5px; display: none;}
.topcomment.default {display: block;}
.topcomment-right {
    width: 100%;
    float: left;
    margin-top: 40px;
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

.topctg{float:left; margin-bottom:20px; background:#424140; padding-top:10px; padding-bottom:10px; position:fixed; margin-bottom:30px;}
.topctg ul{ margin:auto; padding: 0px;}
.topctg li{ list-style:none; font-size:14px; text-align:center; float:left; margin-left:5px; margin-right:5px; padding-left:5px; padding-right:5px;}
.topctg li a{ text-decoration:none; color:#fff; font-family: 'Work Sans', sans-serif;; font-size:14px;}
.tabcontent{display: none;margin-top: 30px;
    padding: 10px; }
.tabcontent label {
    color: #000000;
}
select option {margin: 0px !important;}
.nav-tabs {
    border-bottom: 2px solid #DDD;
    width: 97% !important;
    margin: 0 auto !important;
     background: #383535;
}
.nav-tabs > li.active > a, .nav-tabs > li > a:hover {background: #ffffff;}
.nav-tabs{border-bottom: 2px solid #DDD;
    width: 97% !important;
    margin: 0 auto !important;
      background: #fff;
    font-weight: 600;
  }
  .cancellation_box{width:100%; height:100%; background:rgba(0,0,0,0.5); position:fixed; z-index:999999; top:0px; display:none; }
.cancellation_box .cancellation_box_content{width:50%; height:auto; background:#fff; margin:auto; margin-top:5%; border-radius:4px; position:relative;padding:5%;}
</style>
<link href="editor.css" type="text/css" rel="stylesheet"/>

</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
  <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;z-index: 99999;"><img src='dist/img/demo_wait.gif' width="64" height="64" /><br>Loading..</div>
  
  
    <!-- popup -->
                <div class="cancellation_box">
                  <div class="cancellation_box_content pulse">
                    <!--<i class="ion-close-circled close_icon" onclick="$('.cancellation_box').toggle();" style="font-size: 25px;float: right;margin-bottom: 1%;"></i>-->
                     <button type="button" onclick="$('.cancellation_box').toggle();">Close</button>
                     <embed src="uploads/docupload/" frameborder="0" width="100%" height="400px" id="docfile">
                  </div>
                </div>
  <!-- popup -->
  
<div class="wrapper">
  <?php include_once('userheader.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar1.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="display:block;float:left;width:100%;">
      <h1>
        <span style="color:#333;"><?php echo GetName('projects','p_name','id',$pid); ?></span>
        <span style="color:#FFC107;">( <?php echo GetName('clerance','c_name','id',$cid); ?> )</span>
      </h1>
      <ol class="breadcrumb" style="display: none;">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Project</li>
      </ol>
    </section>
    <!-- Main content -->
  <ul class="nav nav-tabs" role="tablist" id="updatetab">
                                        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Condition</a></li>

                                        <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special Condition</a></li>
                                        <li role="presentation"><a href="#additional" aria-controls="additional" role="tab" data-toggle="tab">Additional Condition</a></li>
                                       
                                    </ul>
                  
                  <div class="tab-content" style="padding-top:0px;">
                  <div role="tabpanel" class="tab-pane active" id="general">
                  <section class="content">
  <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:70%; float:left; overflow-x: hidden; height:700px;">
  
      <div class="row">
        <div class="col-md-12" id="accordion">
        <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='general' AND cid=$cid";
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
    <div class="dtl">

<?php
    $timelinequery="SELECT * FROM condition_message WHERE ctid=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
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
                              else
                              {
                                $complied='dist/img/default_complied.png';
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
                              else
                              {
                                $response='dist/img/default_responsibilty.png';
                              }
                              
                              ?>
      
         <?php echo $result->condition_text; ?>
           </div>
    <div class="dtl-btn" id="<?=$result->id?>">
         <ul class="icn">
         <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->responsibility;?>"> 
          <img src="<?=$response;?>" alt=" " height="15" width="15"> </a> </li>
                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->complied;?>">
                          <img src="<?=$complied;?>" alt=" " height="15" width="15"> </a>
                      </li>
         
         <li> <a href="newuserviewupdate.php?cid=<?php echo $cid; ?>&pid=<?php echo $pid;?>&timelineid=<?php echo $result->id; ?>&status=1" data-toggle="tooltip" data-placement="bottom" title="Update Status!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
         </ul>
           </div>
        <?php if($timelineresult->complied) { ?> 
      
    <div class="topcomment"> 
    <div class="comment">
    <?php
                              $k=0;
                              
                                $k=$k+1;
                              
                                ?>
    <table class="table" style=" background:#efefef;" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
    
    <?php if($timelineresult->complied=='Complied') { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Remark</td>
      <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresult->complied; ?></td>
        <td><p style="text-align: justify;"><?php echo $timelineresult->s_remark; ?></p></td>
        <td>
<?php if($timelineresult->docupload !="") { ?>
          <span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a>
        <?php } else { ?>
        	No Attachments
        <?php } ?>

        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
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
    <td>
    	<?php if($timelineresult->docupload!="") {?>
      <span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a></td>
       <?php } else { ?>
       	No Attachments
       <?php } ?>
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>


    </div>
    </div>      
          <?php } ?>
          
          
    </div>
          
    <?php } ?>
        </div>
      </div>
</div>


<div class="show_right_cond">
<div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:auto; overflow-x: hidden;">
      <div class="row">
        <div class="col-md-12">
    <div class="allitm">
    <div class="topctg" style="width:100% !important; top:0px; position:inherit; margin-bottom:0px;"> 
    <ul>
      <?php 
      if(isset($timelineid)) {
      $selectper="SELECT view, edit, change_status from user_set_permission WHERE pid='$pid' AND uid=$user";

      $rowchkpm=$cudb->query($selectper) or die(mysqli_error());
      $perdata=mysqli_fetch_object($rowchkpm);  
      $viewper=$perdata->view;
      //$listuserview=explode(",",$viewper);
      $editper=$perdata->edit;
      //$listuseredit=explode(",",$editper);
      $statusper=$perdata->change_status;
     // $listuserstatus=explode(",",$statusper);
       }
      ?>
<?php if($viewper=='1') { ?>
  <?php } ?>
<?php if(($editper=='1') || ($statusper=='1')) { ?>
    <li> <a class="tablinks" href="javascript:;" onClick="openForm(event, 'Suggestion')">Suggestion</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="openForm(event, 'Remark')">Remark</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="openForm(event, 'Action')">Action </a></li>
  <?php } ?>
<?php if($statusper=='1') { ?>
<li> <a class="tablinks" href="javascript:;" onClick="openForm(event, 'Status')">Status</a></li>     
<?php } ?>
</ul>
  </div>
   <div style="width:100%; float:left; overflow:auto; height:640px;">
  <div id="Suggestion" class="tabcontent">
  <form method="post" name="action_suggestion" id="action_suggestion" enctype="multipart/form-data" data-parsley-validate="">
    <label>Suggestion</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="suggestbox" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#suggestbox').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="suggestion">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
         
    <div class="submit btn btn-primary action_suggestion">Add Suggestion</div>
  </form>
</div>

<div id="Remark" class="tabcontent">
  <form method="post" name="action_remark" id="action_remark" enctype="multipart/form-data" data-parsley-validate="">
    <label>Remark</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="remarkbox" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#remarkbox').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="remark">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
        <input type="hidden" name="lcid" id="lcid" value="<?php echo $timelinelastid; ?>">
    <div class="submit btn btn-primary action_remark">Add Remark</div>
  </form>
</div>

<div id="Action" class="tabcontent">
  <form method="post" name="action_data" id="action_data">
    <label>Action</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="actionbox" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#actionbox').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="action">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">

    <div class="submit btn btn-primary action_data">Add Action</div>
  </form>
  
</div>
<div id="Status" class="tabcontent">
  <form method="post" name="status_data"  enctype="multipart/form-data">
          <p>
            <label>Status</label>
            <select class="form-control complied" name="complied_r" id="complied_r" required>
                    <option value="">Select Option</option>
                      <option value="Complied">Complied</option>
                      <option value="Not Complied">Not Complied</option>
                      <option value="Partially Complied">Partially Complied</option>
                    </select></p>
      <div id="hideres">
             <label>Responsibility</label>  
             <select class="form-control responsibility" name="responsibility_r" id="responsibility_r" required>
                    <option value="">Select Option</option>
                      <option value="Consultant">Consultant</option>
                      <option value="OMC">OMC</option>
                      <option value="BOTH">BOTH</option>
                    </select> 
</div>
                    
                    <div id="hidetim">
              <label>Timeline</label> 
              <select class="form-control" name="timeline_r" id="timeline_r" required>
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>"><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    </div>
              <label>Remark</label> 
              <!-- <textarea class="form-control" name="s_remark" id="s_remark"> </textarea> -->

               <textarea class="tinymce-enabled-message" name="s_remark" cols="45" id="description1"></textarea>
               
              <div id="statusbox" style="margin-bottom: 20px;">
                <label>Attachment</label>
                <input type="file" name="docupload[]" id="docupload">
              </div>
              <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#statusbox').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
              
              <input type="hidden" name="r_user_id" id="r_user_id" value="<?php echo GetName('admin','id','id',$user); ?>">     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
              <input type="hidden" name="timeline_id_r" id="timeline_id_r" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
<br>
              <div class="submit btn btn-primary" id="status_data">Add Status</div>
</form>
          <?php
              $sql="SELECT `id` FROM condition_message where ctid='$timelineid' and complied='complied'";
              $id1=$cudb->query($sql) or die(mysqli_error());
              $id=mysqli_fetch_object($id1);
              $ar=$id->id;

                $qry="SELECT * FROM DocumentUpload WHERE ConditionMessageId='$ar'";
                // $k=0;

                $result=$cudb->query($qry) or die(mysqli_error());
                while($row=mysqli_fetch_object($result))
                  {
                    // $k=$k+1;
            ?>
            <span onclick="openpopup('<?=$row->Document;?>')" style="cursor: pointer;">View Attachment</span>
            <a href="uploads/docupload/<?php echo $row->Document; ?>" style="display:none;">View Attachment</a>
            <?php
          }
          ?>
</div>

   
    <div class="topcomment-right"> 
    <div class="comment">
    <?php
    $timelinequeryright="SELECT * FROM condition_message WHERE ctid='$timelineid' ORDER BY id DESC";
    $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
     ?>
        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
        
    <div class="commentdetails1">
    
    
    <div style="margin-bottom:20px;">
    
     
     <?php if($timelineresultright->complied) { ?>

         <?php if($timelineresultright->complied=='Complied') { ?> 
         <?php $color='9ecb2d'; ?>  
         <?php } else if ($timelineresultright->complied=='Not Complied') { ?>               
         <?php $color='ff0000'; ?> 
         <?php } else { ?> 
         <?php $color='efefef'; ?>  
         <?php } ?>                     
    <table class="table1" style="background:#<?php echo $color; ?>;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <?php if($timelineresultright->complied=='Complied') { ?>
    <tbody>
      <tr>
       
      <td>Status</td>
      <td>Remark</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><p style="text-align: justify;"><?php echo $timelineresultright->s_remark; ?></p></td>
        <td style="display:none;">
        	<?php if($timelineresultright->docupload !="") { ?>
          <span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
        <?php } else { ?>
        	No Attachments
        <?php } ?>
        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td>Timeline</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><?php echo $timelineresultright->responsibility; ?></td>
        <td><?php echo $timelineresultright->timeline; ?>Week</td>
    <td style="display:none;">
    	<?php if($timelineresultright->docupload) { ?>
      <span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
    <?php } else { ?>
    	No Attachments
    <?php } ?>
    </td>
       
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>
    
     <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
     
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    
    
    
    <!--attachment-->
    
    
  <?php } else { ?>
  <?php if($timelineresultright->m_type=='action') { ?>
      <div class="btn-circle btn-xla"> A </div>
    <?php } elseif ($timelineresultright->m_type=='suggestion') { ?>
      <div class="btn-circle btn-xl">S</div>
    <?php } elseif($timelineresultright->m_type=='remark') { ?>
      <div class="btn-circle btn-xlb"> R </div>
    <? } ?>
    
    <p class="dsc1">
    <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <br />
    <?php echo $timelineresultright->m_content; ?>
</p>
    <?php 
  $tag_user=$timelineresultright->tag_user; 
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
    
    <br/><br/>
    <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
     
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    
    
    
    <!--attachment-->
    
    
     </div>
  <?php } } ?>
  
    </div>
        
  
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
  <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:70%; float:left; overflow-x: hidden; height:700px;">
  
      <div class="row">
        <div class="col-md-12" id="accordion_spcial">
        <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='special' AND cid=$cid";
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
    <div class="dtl">
<?php
     $timelinequery="SELECT * FROM condition_message WHERE ctid=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
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

                              else
                              {

                              $complied='dist/img/default_complied.png';

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
                              else
                              {
                              $response='dist/img/default_responsibilty.png';
                              }
                              ?>
      
         <?php echo $result->condition_text; ?>
           </div>
    <div class="dtl-btn" id="<?=$result->id?>">
         <ul class="icn">
         <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->responsibility;?>"> <img src="<?=$response;?>" alt=" " height="15" width="15"> </a> </li>
          <li>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->complied;?>">
              <img src="<?=$complied;?>" alt=" " height="15" width="15"> </a>
          </li>
         
         <li> <a href="newuserviewupdate.php?cid=<?php echo $cid; ?>&pid=<?php echo $pid;?>&timelineid=<?php echo $result->id; ?>&status=1" data-toggle="tooltip" data-placement="bottom" title="Update Status!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
         </ul>
           </div>
          
      <?php if($timelineresult->complied) { ?>
    <div class="topcomment"> 
    <div class="comment">
    <?php
                              $k=0;
                              
                              
                                $k=$k+1;
                                
                                ?>
    <table class="table" style=" background:#efefef;" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
    <?php if($timelineresult->complied=='Complied') { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Remark</td>
      <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresult->complied; ?></td>
        <td><p style="text-align: justify;"><?php echo $timelineresult->s_remark; ?></p></td>
        <td>
        	<?php if($timelineresult->docupload !="") {?>
          <span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a>
        <?php } else { ?>
        		No Attachments
        <?php } ?>
        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
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
    <td>
    	<?php if($timelineresult->docupload !="") { ?>
      <span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a>
    	<?php } else { ?>
    		No Attachments
    	<?php } ?>
    </td>
       
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>


    </div>
    </div>      
          
      <?php } ?>    
          
    </div>
          
    <?php } ?>
        </div>
         
      </div>
</div>


<div class="show_right_cond">
<div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:700px; overflow-x: hidden;">
  
      <div class="row">
        <div class="col-md-12">
    <div class="allitm">
    <div class="topctg" > 
    <ul>
      <?php 
      if(isset($timelineid)) {
      $selectper="SELECT view, edit, change_status from user_set_permission WHERE pid='$pid' AND uid=$user";



      $rowchkpm=$cudb->query($selectper) or die(mysqli_error());
      $perdata=mysqli_fetch_object($rowchkpm);  
      $viewper=$perdata->view;
      //$listuserview=explode(",",$viewper);
      $editper=$perdata->edit;
      //$listuseredit=explode(",",$editper);
      $statusper=$perdata->change_status;
      //$listuserstatus=explode(",",$statusper);
       }
      ?>
<?php if($viewper=='1') { ?>
  <?php } ?>
<?php if(($editper=='1') || ($statusper=='1')) { ?>
    <li> <a class="tablinks" href="javascript:;" onClick="opensForm(event, 's_Suggestion')">Suggestion</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="opensForm(event, 's_Remark')">Remark</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="opensForm(event, 's_Action')">Action </a></li>
  <?php } ?>
<?php if($statusper=='1') { ?>
<li> <a class="tablinks" href="javascript:;" onClick="opensForm(event, 's_Status')">Status</a></li>     
<?php } ?>
</ul>
    </div>  
  <div id="s_Suggestion" class="tabcontent">
  <form method="post" name="action_suggestion_special" id="action_suggestion_special" enctype="multipart/form-data">
    <label>Suggestion</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="suggestbox_special" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#suggestbox_special').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="suggestion">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $timelinelastidspecial; ?>">

    <div class="submit btn btn-primary action_suggestion_special">Add Suggestion</div>
  </form>

</div>

<div id="s_Remark" class="tabcontent">
  <form method="post" name="action_remark_special" id="action_remark_special" enctype="multipart/form-data">
    <label>Remark</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="remarkbox_special" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#remarkbox_special').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="remark">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $timelinelastidspecial; ?>">
    <div class="submit btn btn-primary action_remark_special">Add Remark</div>
  </form>
</div>

<div id="s_Action" class="tabcontent">
  <form method="post" name="action_data_special" id="action_data_special">
    <label>Action</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    <div id="actionbox_special" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#actionbox_special').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="action">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
        <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $timelinelastidspecial; ?>">

    <div class="submit btn btn-primary action_data_special">Add Action</div>
  </form>
  
</div>
<div id="s_Status" class="tabcontent">
  <form method="post" name="status_data_special" id="status_data_special" enctype="multipart/form-data">
          <p>
            <label>Status</label>
            <select class="form-control complied" name="complied_r_special" id="complied_r_special" required>
                    <option value="">Select Option</option>
                      <option value="Complied">Complied</option>
                      <option value="Not Complied">Not Complied</option>
                      <option value="Partially Complied">Partially Complied</option>
                    </select></p>
      <div id="hideres">
             <label>Responsibility</label>  
             <select class="form-control responsibility" name="responsibility_r_special" id="responsibility_r_special" required>
                    <option value="">Select Option</option>
                      <option value="Consultant">Consultant</option>
                      <option value="OMC">OMC</option>
                      <option value="BOTH">BOTH</option>
                    </select> 
</div>
                    
                    <div id="hidetim">
              <label>Timeline</label> 
              <select class="form-control" name="timeline_r_special" id="timeline_r_special" required>
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>"><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    </div>
              <label>Remark</label> 
              <textarea class="form-control" name="s_remark" id="s_remark"> </textarea>
             
              <div id="statusbox_special" style="margin-bottom: 20px;">
                <label>Attachment</label>
                <input type="file" name="docupload[]" id="docupload">
              </div>
              <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#statusbox_special').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
             
             
              <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
              <input type="hidden" name="r_user_id_special" id="r_user_id_special" value="<?php echo GetName('admin','id','id',$user); ?>">
              <input type="hidden" name="timeline_id_r_special" id="timeline_id_r_special" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid_special" id="rcid_special" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid_special" id="rpid_special" value="<?php echo $pid; ?>">
<br>
              <div class="submit btn btn-primary status_data_special">Add Status</div>
              </form>
</div>
    
    <div class="topcomment-right"> 
    <div class="comment">
    <?php
    $timelinequeryright="SELECT * FROM condition_message WHERE ctid='$timelineid' ORDER BY id DESC";
    $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
     ?>
        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
        
    <div class="commentdetails1">
    
    
    <div style="margin-bottom:20px;">
    
     
     <?php if($timelineresultright->complied) { ?>

         <?php if($timelineresultright->complied=='Complied') { ?> 
         <?php $color='4caf50'; ?>  
         <?php } else if ($timelineresultright->complied=='Not Complied') { ?>               
         <?php $color='ff0000'; ?> 
         <?php } else { ?> 
         <?php $color='efefef'; ?>  
         <?php } ?>                     
    <table class="table1" style="background:#<?php echo $color; ?>" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <?php if($timelineresultright->complied=='Complied') { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Remark</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><p style="text-align: justify;"><?php echo $timelineresultright->s_remark; ?></p></td>
        <td style="display:none;">
        	<?php if($timelineresultright->docupload !="") { ?>
          <span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
        	<?php } else { ?>
        		No Attachments
        	<?php } ?>
        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td>Timeline</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><?php echo $timelineresultright->responsibility; ?></td>
        <td><?php echo $timelineresultright->timeline; ?>Week</td>
    <td style="display:none;">
    	<?php if($timelineresultright->docupload !="") { ?>
      <span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
    	<?php } else { ?>
    		No Attachments
    	<?php } ?>
    </td>
       
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>
    
    <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
     
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    <!--attachment-->
    
    
  <?php } else { ?>
  <?php if($timelineresultright->m_type=='action') { ?>
      <div class="btn-circle btn-xla"> A </div>
    <?php } elseif ($timelineresultright->m_type=='suggestion') { ?>
      <div class="btn-circle btn-xl">S</div>
    <?php } elseif($timelineresultright->m_type=='remark') { ?>
      <div class="btn-circle btn-xlb"> R </div>
    <? } ?>
    
    <p class="dsc1">
    <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <br />
    <?php echo $timelineresultright->m_content; ?>
</p>
    <?php 
  $tag_user=$timelineresultright->tag_user; 
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
    
    
    <br/><br/>
    <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    <!--attachment-->
    
    
     </div>
  <?php } } ?>
  
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
  <div style="background:#fff; padding:20px; height:auto;border-radius: 1px;border: 1px solid #0000007a;     box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:70%; float:left; overflow-x: hidden; height:700px;">
  
      <div class="row">
        <div class="col-md-12" id="accordion_additional">
        <?php 
    $sql="SELECT *
FROM clerance_list WHERE  c_type='additional' AND cid=$cid";
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
    <div class="dtl">

<?php
     $timelinequery="SELECT * FROM condition_message WHERE ctid=$result->id and complied IS NOT NULL ORDER BY id DESC LIMIT 1";
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
                              else
                              {

                              $complied='dist/img/default_complied.png';

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
                              else
                              {
                               $response='dist/img/default_responsibilty.png';
                              }
                              ?>
      
         <?php echo $result->condition_text; ?>
           </div>
    <div class="dtl-btn" id="<?=$result->id?>">
         <ul class="icn">
         <li> <a href="#" class="clk" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->responsibility;?>"> <img src="<?=$response;?>" alt=" " height="15" width="15"> </a> </li>
          <li>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?=$timelineresult->complied;?>">
                          <img src="<?=$complied;?>" alt=" " height="15" width="15"> </a>
          </li>
         
         <li> <a href="newuserviewupdate.php?cid=<?php echo $cid; ?>&pid=<?php echo $pid;?>&timelineid=<?php echo $result->id; ?>&status=1" data-toggle="tooltip" data-placement="bottom" title="Update Status!"> <img src="dist/img/det.png" alt=" " height="15" width="15"> </a>  </li>
         </ul>
           </div>
          
      
    <div class="topcomment"> 
    <div class="comment">
    <?php
                              $k=0;
                                $k=$k+1;
                                
                                ?>
    <table class="table" style=" background:#efefef;" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresult->user_id); ?> <?php echo $timelineresult->submit_date; ?></span>
     <?php if($timelineresult->complied=='Complied') { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Remark</td>
      <td>Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresult->complied; ?></td>
        <td><?php echo $timelineresult->s_remark; ?></td>
        <td>
<?php if($timelineresult->docupload !="") { ?>
<span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a>
<?php } else { ?>
 No Attachments
<?php } ?>
        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td>Timeline</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresult->complied; ?></td>
        <td><?php echo $timelineresult->responsibility; ?></td>
        <td><?php echo $timelineresult->timeline; ?> Weeks</td>
    <td style="display:none;">
<?php if($timelineresult->docupload !="") {?>
<span onclick="openpopup('<?=$timelineresult->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a target="_blank" href="uploads/docupload/<?php echo $timelineresult->docupload; ?>" style="display:none;">View File</a>
<?php } else { ?>
	No Attachments
<?php } ?>
    </td>
       
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>
    </div>
    </div>      
          
          
          
    </div>
          
    <?php } ?>
        </div>
      </div>
</div>


<div class="show_right_cond">
<div style="background:#fff;height:auto;border-radius: 1px;border: 1px solid #0000007a;box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25); width:30%;
 float:right;height:700px; overflow-x: hidden;">

  
      <div class="row">
        <div class="col-md-12">
    <div class="allitm">
    <div class="topctg" > 
    <ul>
      <?php 
      if(isset($timelineid)) {
      $selectper="SELECT view, edit, change_status from user_set_permission WHERE pid='$pid' AND uid=$user";

      $rowchkpm=$cudb->query($selectper) or die(mysqli_error());
      $perdata=mysqli_fetch_object($rowchkpm);  
      $viewper=$perdata->view;
      //$listuserview=explode(",",$viewper);
      $editper=$perdata->edit;
      //$listuseredit=explode(",",$editper);
      $statusper=$perdata->change_status;
      //$listuserstatus=explode(",",$statusper);
       }
      ?>
<?php if($viewper=='1') { ?>
  <?php } ?>
<?php if(($editper=='1') || ($statusper=='1')) { ?>
    <li> <a class="tablinks" href="javascript:;" onClick="opensaForm(event, 'a_Suggestion')">Suggestion</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="opensaForm(event, 'a_Remark')">Remark</a></li>
    <li> <a class="tablinks" href="javascript:;" onClick="opensaForm(event, 'a_Action')">Action </a></li>
  <?php } ?>
<?php if($statusper=='1') { ?>
<li> <a class="tablinks" href="javascript:;" onClick="opensaForm(event, 'a_Status')">Status</a></li>     
<?php } ?>
</ul>
    </div>  
  <div id="a_Suggestion" class="tabcontent">
  <form method="post" name="action_suggestion_additional" id="action_suggestion_additional" enctype="multipart/form-data">
    <label>Suggestion</label>
    <textarea class="form-control" name="action_content" id="action_content" required></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
     <div id="suggestbox_additional" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#suggestbox_additional').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    
    <input type="hidden" name="m_type" id="m_type" value="suggestion">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
        <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $qrylastidadditional->id; ?>">
    <div class="submit btn btn-primary action_suggestion_additional">Add Suggestion</div>
  </form>
</div>

<div id="a_Remark" class="tabcontent">
  <form method="post" name="action_remark_additional" id="action_remark_additional" enctype="multipart/form-data">
    <label>Remark</label>
    <textarea class="form-control" name="action_content" id="action_content"></textarea>
    <label>Tag User</label>
    <select class="form-control" multiple  name="tag_user[]" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    
     <div id="remarkbox_additional" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#remarkbox_additional').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    <input type="hidden" name="m_type" id="m_type" value="remark">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $qrylastidadditional->id; ?>">
    <div class="submit btn btn-primary action_remark_additional">Add Remark</div>
  </form>
</div>

<div id="a_Action" class="tabcontent">
  <form method="post" name="action_data_additional" id="action_data_additional">
    <label>Action</label>
    <textarea class="form-control" name="action_content" id="action_content"></textarea>
    <label>Tag User</label>

    <select class="form-control" multiple  name="tag_user" id="tag_user" required>
  <?php
           $selp="SELECT * FROM admin WHERE user_type='user'";
                $rowpr=$cudb->query($selp) or die(mysqli_error());  
                while($rowp=mysqli_fetch_object($rowpr))
                { ?>
          <option value="<?php echo $rowp->id; ?>"><?php echo $rowp->fullname ?></option>
          <?php } ?>
</select>
    
    
    <div id="actionbox_additional" style="margin-bottom: 20px;">
       <label>Attachment</label>
       <input type="file" name="docupload[]" id="docupload">
    </div>
    <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#actionbox_additional').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>
    
    
    <input type="hidden" name="m_type" id="m_type" value="action">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo GetName('admin','id','id',$user); ?>">
     <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid" id="rcid" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid" id="rpid" value="<?php echo $pid; ?>">
          <input type="hidden" name="lcid" id="lcid" value="<?php echo $qrylastidadditional->id; ?>">

    <div class="submit btn btn-primary action_data_additional">Add Action</div>
  </form>
  
</div>
<div id="a_Status" class="tabcontent">
  <form method="post" name="status_data_additional" id="status_data_additional" enctype="multipart/form-data">
          <p>
            <label>Status</label>
            <select class="form-control complied" name="complied_r_additional" id="complied_r_additional" required>
                    <option value="">Select Option</option>
                      <option value="Complied">Complied</option>
                      <option value="Not Complied">Not Complied</option>
                      <option value="Partially Complied">Partially Complied</option>
                    </select></p>
      <div id="hideres">
             <label>Responsibility</label>  
             <select class="form-control responsibility" name="responsibility_r_additional" id="responsibility_r_additional" required>
                    <option value="">Select Option</option>
                      <option value="Consultant">Consultant</option>
                      <option value="OMC">OMC</option>
                      <option value="BOTH">BOTH</option>
                    </select> 
</div>
                    
                    <div id="hidetim">
              <label>Timeline</label> 
              <select class="form-control" name="timeline_r_additional" id="timeline_r_additional" required>
                      <option value="">Select TimeLine</option>
                      <?php for($j = 1; $j<=30; $j++) { ?>
                      <option value="<?php echo $j; ?>"><?php echo $j; ?> Week</option>
                      <?php } ?>
                    </select>
                    </div>
              <label>Remark</label> 
              <textarea class="form-control" name="s_remark" id="s_remark"> </textarea>
              
             <div id="statusbox_additional" style="margin-bottom: 20px;">
                <label>Attachment</label>
                <input type="file" name="docupload[]" id="docupload">
              </div>
              <div class="btn btn-primary" style="background:#9ecb2d;float: right;cursor: pointer;" onclick="$('#statusbox_additional').append('<input type=&#34;file&#34; name=&#34;docupload[]&#34; id=&#34;docupload&#34; style=&#34;margin-top:5px&#34;/>');">Add More</div>

              <input type="hidden" name="r_user_id_additional" id="r_user_id_additional" value="<?php echo GetName('admin','id','id',$user); ?>">
              <input type="hidden" name="ctid" id="ctid" value="<?php echo $timelineid; ?>">
              <input type="hidden" name="timeline_id_r_additional" id="timeline_id_r_additional" value="<?php echo $timelineid; ?>">
          <input type="hidden" name="rcid_additional" id="rcid_additional" value="<?php echo $cid; ?>">
          <input type="hidden" name="rpid_additional" id="rpid_additional" value="<?php echo $pid; ?>">
<br>
              <div class="submit btn btn-primary status_data_additional">Add Status</div>
              </form>
</div>
    
    <div class="topcomment-right"> 
    <div class="comment">
    <?php
    $timelinequeryright="SELECT * FROM condition_message WHERE ctid='$timelineid' ORDER BY id DESC";
    $querytimelineright=$cudb->query($timelinequeryright) or die(mysqli_error());
     ?>
        <?php
        $k=0;
    while($timelineresultright=mysqli_fetch_object($querytimelineright))
                              {
                                $k=$k+1;
                                ?>
        
    <div class="commentdetails1">
    
    
    <div style="margin-bottom:20px;">
    
     
     <?php if($timelineresultright->complied) { ?>

         <?php if($timelineresultright->complied=='Complied') { ?> 
         <?php $color='4caf50'; ?>  
         <?php } else if ($timelineresultright->complied=='Not Complied') { ?>               
         <?php $color='ff0000'; ?> 
         <?php } else { ?> 
         <?php $color='efefef'; ?>  
         <?php } ?>                     
    <table class="table1" style="background:#<?php echo $color; ?>" >
    <span class="msgby"> Updated by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <?php if($timelineresultright->complied=='Complied') { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Remark</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><p style="text-align: justify;"><?php echo $timelineresultright->s_remark; ?></p></td>
        <td style="display:none;">
<?php if($timelineresultright->docupload !="") { ?>
<span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
        	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
<?php } else { ?>
	No Attachments
<?php } ?>
        </td>

      </tr>
    
    </tbody>
    <? } else { ?>
    <tbody>
      <tr>
       
        <td>Status</td>
        <td>Responsibility</td>
        <td>Timeline</td>
      <td style="display:none;">Attachment </td>
      </tr>
      
      <tr>
        
        <td><?php echo $timelineresultright->complied; ?></td>
        <td><?php echo $timelineresultright->responsibility; ?></td>
        <td><?php echo $timelineresultright->timeline; ?>Week</td>
    <td style="display:none;">
    	<?php if($timelineresultright->docupload !="") { ?>
      <span onclick="openpopup('<?=$timelineresultright->docupload;?>')" style="cursor: pointer;">View file</span>
    	<a href="uploads/docupload/<?php echo $timelineresultright->docupload; ?>" style="display:none;">View File</a>
<?php } else {?>
	No Attachments
<?php } ?>
    </td>
       
       
      </tr>
    
    </tbody>
    <? } ?>
  </table>
    
     <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
     
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    <!--attachment-->
    
    
  <?php } else { ?>
  <?php if($timelineresultright->m_type=='action') { ?>
      <div class="btn-circle btn-xla"> A </div>
    <?php } elseif ($timelineresultright->m_type=='suggestion') { ?>
      <div class="btn-circle btn-xl">S</div>
    <?php } elseif($timelineresultright->m_type=='remark') { ?>
      <div class="btn-circle btn-xlb"> R </div>
    <? } ?>
    
    <p class="dsc1">
    <span class="msgby"> Message by <?php echo GetName('admin','fullname','id',$timelineresultright->user_id); ?> <?php echo $timelineresultright->submit_date; ?></span>
    <br />
    <?php echo $timelineresultright->m_content; ?>
</p>
    <?php 
  $tag_user=$timelineresultright->tag_user; 
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
    
    <br/><br/>
    <!--attachment-->
     <?php
     $condtnmsg=$timelineresultright->id;
     $seldocfile=$cudb->query("select * from `DocumentUpload` where `ConditionMessageId`='$condtnmsg' and `IsDelete`=0");
     $count=mysqli_num_rows($seldocfile);
     if($count>0)
     {
      while($rowimg=mysqli_fetch_object($seldocfile))
      {
     ?>
     
       <table class="table1" style="background:#efefef;-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;margin-top:5px;">
        <tbody>
          <tr>
            <td>Attachment</td>
          </tr>
          <tr>
            <td>
              <span onclick="openpopup('<?=$rowimg->Document;?>')" style="cursor: pointer;">View file</span>
              <a href="uploads/docupload/<?=$rowimg->Document;?>" style="display:none;">View File</a>
            </td>
          </tr>
        </tbody>
      </table>
     
     <?php
      }
     }
     ?>
    <!--attachment-->
    
    
     </div>
  <?php } } ?>
  
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

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  $(document ).ready(function() {
    function applyMCE() {
      tinyMCE.init({
        mode : "textareas",
        editor_selector : "tinymce-enabled-message", 
        theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    
      });        
    }
    function AddRemoveTinyMce(editorId) {
      if(tinyMCE.get(editorId)) 
      {
        tinyMCE.EditorManager.execCommand('mceFocus', false, editorId);                    
        tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, editorId);

      } else {
        tinymce.EditorManager.execCommand('mceAddEditor', false, editorId);       
      }
    }
    applyMCE();
    $('a.toggle-tinymce').die('click').live('click', function(e) {
      AddRemoveTinyMce('description1');
      var lbl = $(this).text() == 'Off' ? 'On' : 'Off';
      $(this).text(lbl);
    });
    $('a.add-type').die('click').live('click', function(e) {
      e.preventDefault(); 
      var content = jQuery('#type-container .type-row'),
      element = null;
      for(var i = 0; i<1; i++){
        element = content.clone();
        var divId = 'id_'+jQuery.now();
        element.attr('id', divId);
        element.find('.remove-type').attr('targetDiv', divId);
        element.find('.tinymce-enabled-message-new').attr('id', 'txt_'+divId);
        element.appendTo('#type_container');
        AddRemoveTinyMce('txt_'+divId);

      }
    });

    jQuery(".remove-type").die('click').live('click', function (e) {
      var didConfirm = confirm("Are you sure You want to delete");
      if (didConfirm == true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#' + targetDiv).remove();
      // }
      return true;
      } else {
        return false;
      }
    });
  });
</script>


<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>

<script src="dist/js/parsley.js"></script>

<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion').find('.dtl').click(function(){
      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');
      $('.allitm').css('background','none');
      $(this).parent().css('background','#c6dede');  
    });
    <?php
    if(isset($_GET['note']) || isset($_GET['status']))
    {
    ?>
    var id=<?=$_GET['timelineid']?>;
    $('#'+id).parent().css('background','#c6dede');
    <?php
    }
    ?>
  });
</script>
<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion_spcial').find('.dtl').click(function(){

      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');
      $('.allitm').css('background','none');
      $(this).parent().css('background','#c6dede'); 
    });
    <?php
    if(isset($_GET['note']) || isset($_GET['status']))
    {
    ?>
    var id=<?=$_GET['timelineid']?>;
    $('#'+id).parent().css('background','#c6dede');
    <?php
    }
    ?>
  });
</script>

<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion_additional').find('.dtl').click(function(){

      //Expand or collapse this panel
      $(this).next().next().slideToggle('fast');
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');
      $('.allitm').css('background','none');
      $(this).parent().css('background','#c6dede'); 
    });
    <?php
    if(isset($_GET['note']) || isset($_GET['status']))
    {
    ?>
    var id=<?=$_GET['timelineid']?>;
    $('#'+id).parent().css('background','#c6dede');
    <?php
    }
    ?>
  });
</script>

<!-- <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
function openForm(evt, formName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(formName).style.display = "block";
    evt.currentTarget.className += " active";
}
function opensForm(evt, formName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(formName).style.display = "block";
    evt.currentTarget.className += " active";
}
function opensaForm(evt, formName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(formName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<script>
$(document).ready(function(){
$("#status_data").click(function () {
    var postData = new FormData();
    postData.append("complied_r", $("#status_data select[name=complied_r]").val()); 
    postData.append("responsibility_r", $("#status_data select[name=responsibility_r]").val());
    postData.append("timeline_r", $("#status_data select[name=timeline_r]").val()); 
    postData.append("r_user_id", $("#status_data input[name=r_user_id]").val());
    postData.append("s_remark", $("#status_data textarea[name=s_remark]").val());
    postData.append("timeline_id_r", $("#status_data input[name=timeline_id_r]").val());
    postData.append("rcid", $("#status_data input[name=rcid]").val());
    postData.append("ctid", $("#status_data input[name=ctid]").val());
    postData.append("rpid", $("#status_data input[name=rpid]").val());
    alert("postData");
    
    var file_data = $('#status_data input[type=file]').length;
    print(postData);
    for (var i = 0; i < file_data; i++)
    {
      postData.append('docupload[]', $('#status_data input[type=file]')[i].files[0]); 
    }
    //postData.append('docupload', $('input[type=file]')[0].files[0]);
   //alert(postData);
   var st=$("select[name=complied_r]").val();
   if(confirm("Are you sure you want to "+st+" this condition for the General category?")) 
   {
    $("#wait").css("display", "block");
        $.ajax({
            url: "update_status.php",
            type:'POST',
            data:postData,
            success: function(response) {
            	console.log(response)
          alert("Status Updated Successfully to This Condition");
          // location.reload();
        },
        processData: false,
        contentType: false
        });
        }
      else
      {
        return false;
      }
});
$(".status_data_special").click(function () {  
    var postData = new FormData();
    postData.append("complied_r", $("#status_data_special select[name=complied_r_special]").val()); 
    postData.append("responsibility_r", $("#status_data_special select[name=responsibility_r_special]").val());
    postData.append("timeline_r", $("#status_data_special select[name=timeline_r_special]").val()); 
    postData.append("s_remark", $("#status_data_special textarea[name=s_remark]").val());
    postData.append("r_user_id", $("#status_data_special input[name=r_user_id_special]").val());
    postData.append("timeline_id_r", $("#status_data_special input[name=timeline_id_r_special]").val());
    postData.append("rcid", $("#status_data_special input[name=rcid_special]").val());
    postData.append("rpid", $("#status_data_special input[name=rpid_special]").val());
    postData.append("ctid", $("#status_data_special input[name=ctid]").val());
    
    var file_data = $('#status_data_special input[type=file]').length;
    for (var i = 0; i < file_data; i++)
    {
      postData.append('docupload[]', $('#status_data_special input[type=file]')[i].files[0]); 
    }
    
   // postData.append('docupload', $('input[name=docupload_special]')[0].files[0]); 
   // alert(postData);
   var st=$("select[name=complied_r_special]").val();
   if(confirm("Are you sure you want to "+st+" this condition for the special category?")) 
   {
    $("#wait").css("display", "block");
        $.ajax({
            url: "update_status.php",
            type:'POST',
            data:postData,
            success: function(response) {
          alert("Status Updated Successfully to This Condition");
          location.reload();
        },
        processData: false,
        contentType: false
        });
        }
      else
      {
        return false;
      }
});
$(".status_data_additional").click(function () {  
    var postData = new FormData();
    postData.append("complied_r", $("#status_data_additional select[name=complied_r_additional]").val()); 
    postData.append("responsibility_r", $("#status_data_additional select[name=responsibility_r_additional]").val());
    postData.append("timeline_r", $("#status_data_additional select[name=timeline_r_additional]").val()); 
    postData.append("s_remark", $("#status_data_additional textarea[name=s_remark]").val());
    postData.append("r_user_id", $("#status_data_additional input[name=r_user_id_additional]").val());
    postData.append("timeline_id_r", $("#status_data_additional input[name=timeline_id_r_additional]").val());
    postData.append("rcid", $("#status_data_additional input[name=rcid_additional]").val());
    postData.append("rpid", $("#status_data_additional input[name=rpid_additional]").val());
    postData.append("ctid", $("#status_data_additional input[name=ctid]").val());
    
    var file_data = $('#status_data_additional input[type=file]').length;
    for (var i = 0; i < file_data; i++)
    {
      postData.append('docupload[]', $('#status_data_additional input[type=file]')[i].files[0]); 
    }
    
    
   // postData.append('docupload', $('input[name=docupload_additional]')[0].files[0]); 
   // alert(postData);
   var st=$("select[name=complied_r_additional]").val();
   if(confirm("Are you sure you want to "+st+" this condition for the additional category?")) 
   {
    $("#wait").css("display", "block");
        $.ajax({
            url: "update_status.php",
            type:'POST',
            data:postData,
            success: function(response) {
          alert("Status Updated Successfully to This Condition");
          location.reload();
        },
        processData: false,
        contentType: false
        });
        }
      else
    {
      return false;
    }
});
});
</script>

<script>
$(document).ready(function(){
$(".action_data").click(function () {   
var form = $("#action_data"); 
form.parsley().validate();  
if (form.parsley().isValid()){
  
      var selectval = [];
        $.each($("#action_data").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_data textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_data input[name=m_type]").val());
        postData.append("user_id", $("#action_data input[name=user_id]").val());
        postData.append("rcid", $("#action_data input[name=rcid]").val());
        postData.append("ctid", $("#action_data input[name=ctid]").val());
        postData.append("rpid", $("#action_data input[name=rpid]").val());
        
        var file_data = $('#action_data input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_data input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Action Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
  
  // var actdata=$("#action_data").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Action Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
      }
});
$(".action_data_special").click(function () { 
var form = $("#action_data_special"); 
form.parsley().validate();  
if (form.parsley().isValid()){
  
  
     var selectval = [];
        $.each($("#action_data_special").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_data_special textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_data_special input[name=m_type]").val());
        postData.append("user_id", $("#action_data_special input[name=user_id]").val());
        postData.append("rcid", $("#action_data_special input[name=rcid]").val());
        postData.append("ctid", $("#action_data_special input[name=ctid]").val());
        postData.append("rpid", $("#action_data_special input[name=rpid]").val());
        
        var file_data = $('#action_data_special input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_data_special input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Action Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
  
  
  
  // var actdata=$("#action_data_special").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Action Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
      }
});
$(".action_data_additional").click(function () { 
var form = $("#action_data_additional"); 
form.parsley().validate();  
if (form.parsley().isValid()){
  
   var selectval = [];
        $.each($("#action_data_additional").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_data_additional textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_data_additional input[name=m_type]").val());
        postData.append("user_id", $("#action_data_additional input[name=user_id]").val());
        postData.append("rcid", $("#action_data_additional input[name=rcid]").val());
        postData.append("ctid", $("#action_data_additional input[name=ctid]").val());
        postData.append("rpid", $("#action_data_additional input[name=rpid]").val());
        
        var file_data = $('#action_data_additional input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_data_additional input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Action Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
    
  
  // var actdata=$("#action_data_additional").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Action Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //
  //      
  //});

      }
});
});
</script>
<script>
$(document).ready(function(){
$(".action_remark").click(function () {  
var form = $("#action_remark"); 
form.parsley().validate();  
if (form.parsley().isValid()){
  
  
    var selectval = [];
        $.each($("#action_remark").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_remark textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_remark input[name=m_type]").val());
        postData.append("user_id", $("#action_remark input[name=user_id]").val());
        postData.append("rcid", $("#action_remark input[name=rcid]").val());
        postData.append("ctid", $("#action_remark input[name=ctid]").val());
        postData.append("rpid", $("#action_remark input[name=rpid]").val());
        postData.append("lcid", $("#action_remark input[name=lcid]").val());
       
        var file_data = $('#action_remark input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_remark input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Remark Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
  
  // var actdata=$("#action_remark").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Remark Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
}
});
$(".action_remark_special").click(function () {    
var form = $("#action_remark_special"); 
form.parsley().validate(); 
if (form.parsley().isValid()){
  
  
      var selectval = [];
        $.each($("#action_remark_special").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_remark_special textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_remark_special input[name=m_type]").val());
        postData.append("user_id", $("#action_remark_special input[name=user_id]").val());
        postData.append("rcid", $("#action_remark_special input[name=rcid]").val());
        postData.append("ctid", $("#action_remark_special input[name=ctid]").val());
        postData.append("rpid", $("#action_remark_special input[name=rpid]").val());
        postData.append("lcid", $("#action_remark_special input[name=lcid]").val());
       
        var file_data = $('#action_remark_special input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_remark_special input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Remark Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
  
  
  // var actdata=$("#action_remark_special").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Remark Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
      }
});
$(".action_remark_additional").click(function () {  
var form = $("#action_remark_additional"); 
  form.parsley().validate();  
  if (form.parsley().isValid()){
    
    
    var selectval = [];
        $.each($("#action_remark_additional").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });
 

        var postData = new FormData();
        postData.append("action_content", $("#action_remark_additional textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_remark_additional input[name=m_type]").val());
        postData.append("user_id", $("#action_remark_additional input[name=user_id]").val());
        postData.append("rcid", $("#action_remark_additional input[name=rcid]").val());
        postData.append("ctid", $("#action_remark_additional input[name=ctid]").val());
        postData.append("rpid", $("#action_remark_additional input[name=rpid]").val());
        postData.append("lcid", $("#action_remark_additional input[name=lcid]").val());
       
        var file_data = $('#action_remark_additional input[type=file]').length;
        for (var i = 0; i < file_data; i++)
        {
          postData.append('docupload[]', $('#action_remark_additional input[type=file]')[i].files[0]); 
        }
     $("#wait").css("display", "block");
        $.ajax({
              url: "action_update.php",
              type:'POST',
              data:postData,
              success: function(response) {
                alert("Remark Updated Successfully to This Condition");
                location.reload();
          },
          processData: false,
          contentType: false
          });
    
    
  // var actdata=$("#action_remark_additional").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Remark Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
 }
});
});
</script>

<script type="text/javascript">


    jQuery(".remove-type").die('click').live('click', function (e) {
      var didConfirm = confirm("Are you sure You want to delete");
      if (didConfirm == true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#' + targetDiv).remove();
      // }
      return true;
      } else {
        return false;
      }
    });
  
</script>

<script>
$(document).ready(function(){
$(".action_suggestion").click(function () { 
var form = $("#action_suggestion"); 
form.parsley().validate();
 if (form.parsley().isValid()){
  
  
        var selectval = [];
        $.each($("#action_suggestion").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });

        var postData = new FormData();
        postData.append("action_content", $("#action_suggestion textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_suggestion input[name=m_type]").val());
        postData.append("user_id", $("#action_suggestion input[name=user_id]").val());
        postData.append("rcid", $("#action_suggestion input[name=rcid]").val());
        postData.append("ctid", $("#action_suggestion input[name=ctid]").val());
        postData.append("rpid", $("#action_suggestion input[name=rpid]").val());
       // postData.append('docuploads', $('input[type=file]')[0].files[0]);
       
   
      var file_data = $('#action_suggestion input[type=file]').length;
      for (var i = 0; i < file_data; i++)
      {
        postData.append('docupload[]', $('#action_suggestion input[type=file]')[i].files[0]); 
      }
  
       $("#wait").css("display", "block");
       $.ajax({
            url: "action_update.php",
            type:'POST',
            data:postData,
            success: function(response) {
         alert("Suggestion Updated Successfully to This Condition");
          location.reload();
        },
        processData: false,
        contentType: false
        });
  
  // var actdata=$("#action_suggestion").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Suggestion Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },  
  //});
  };
});
$(".action_suggestion_special").click(function () { 
var form = $("#action_suggestion_special"); 
form.parsley().validate(); 
if (form.parsley().isValid()){
  
     var selectval = [];
        $.each($("#action_suggestion_special").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });

    var postData = new FormData();
    postData.append("action_content", $("#action_suggestion_special textarea[name=action_content]").val());
    postData.append("tag_user[]", selectval);
    postData.append("m_type", $("#action_suggestion_special input[name=m_type]").val());
    postData.append("user_id", $("#action_suggestion_special input[name=user_id]").val());
    postData.append("rcid", $("#action_suggestion_special input[name=rcid]").val());
    postData.append("ctid", $("#action_suggestion_special input[name=ctid]").val());
    postData.append("rpid", $("#action_suggestion_special input[name=rpid]").val());
    postData.append("lcid", $("#action_suggestion_special input[name=lcid]").val());
   // postData.append('docuploads', $('input[type=file]')[0].files[0]);
   
   
    var file_data = $('#action_suggestion_special input[type=file]').length;
    for (var i = 0; i < file_data; i++)
    {
      postData.append('docupload[]', $('#action_suggestion_special input[type=file]')[i].files[0]); 
    }
     $("#wait").css("display", "block");
     $.ajax({
            url: "action_update.php",
            type:'POST',
            data:postData,
            success: function(response) {
            alert("Suggestion Updated Successfully to This Condition");
            location.reload();
        },
        processData: false,
        contentType: false
        });
  
     
  
  // var actdata=$("#action_suggestion_special").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Suggestion Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
}
});
$(".action_suggestion_additional").click(function () {  
var form = $("#action_suggestion_additional"); 
form.parsley().validate(); 
if (form.parsley().isValid()){
  
        var selectval = [];
        $.each($("#action_suggestion_additional").find("#tag_user option:selected"), function(){            
            selectval.push($(this).val());
        });

        var postData = new FormData();
        postData.append("action_content", $("#action_suggestion_additional textarea[name=action_content]").val());
        postData.append("tag_user[]", selectval);
        postData.append("m_type", $("#action_suggestion_additional input[name=m_type]").val());
        postData.append("user_id", $("#action_suggestion_additional input[name=user_id]").val());
        postData.append("rcid", $("#action_suggestion_additional input[name=rcid]").val());
        postData.append("ctid", $("#action_suggestion_additional input[name=ctid]").val());
        postData.append("rpid", $("#action_suggestion_additional input[name=rpid]").val());
       // postData.append('docuploads', $('input[type=file]')[0].files[0]);
       
   
      var file_data = $('#action_suggestion_additional input[type=file]').length;
      for (var i = 0; i < file_data; i++)
      {
        postData.append('docupload[]', $('#action_suggestion_additional input[type=file]')[i].files[0]); 
      }
       $("#wait").css("display", "block");
       $.ajax({
            url: "action_update.php",
            type:'POST',
            data:postData,
            success: function(response) {
         alert("Suggestion Updated Successfully to This Condition");
          location.reload();
        },
        processData: false,
        contentType: false
        });
  
  
  // var actdata=$("#action_suggestion_additional").serialize();
  //      $.ajax({
  //          url: "action_update.php",
  //          type:'POST',
  //          data:actdata,
  //          success: function(response) {
  //        alert("Suggestion Updated Successfully to This Condition");
  //        location.reload();  //Refresh page
  //      },
  //      
  //});
}
});
});
</script>
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

<script type="text/javascript">
                  $(document).ready(function() {
                  $(".complied").change(function () {                             
                  if ($(this).val() == "Complied") {
                    $(this).closest('div').find('#hideres').hide();
                    $(this).closest('div').find('#hidetim').hide();
                    }
                    else
                     {
                    $(this).closest('div').find('#hideres').show();
                    $(this).closest('div').find('#hidetim').show();
                      }
              }); 
                  
                });
                </script>

<script type="text/javascript">
$(document).ready(function(){
    $(document).ajaxStart(function(){
       // $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
});
function openpopup(docfile)
{
  $('#docfile').attr('src','uploads/docupload/'+docfile);
  $('.cancellation_box').toggle();
}
</script>
<script src="dist/js/custom.js"></script>
</body>
</html>
