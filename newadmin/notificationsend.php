<?php
include("connect.php");
  $userid=$_SESSION['UsrID'];
  $uquery="SELECT * FROM `Notification` WHERE `SendToId`='$userid' and `Status`=0";
  $uresult=$cudb->query($uquery);
  $numrows=mysqli_num_rows($uresult);
  if($numrows>0)
  {
  $row=mysqli_fetch_object($uresult);
  
    $sendername=GetName('admin','username','id',$row->SendById);
    $projectname=GetName('projects','p_name','id',$row->ProjectId);
    $cid=$row->ClearanceId;
    $pid=$row->ProjectId;
    $timelineid=$row->TimelineId;
    $id=$row->NotificationId;
  ?>
  <div id="note<?=$row->NotificationId;?>">
    <h3 style="border:1px solid #dedede; height:auto;font-size:17px; width:82%; float: left; padding: 1%; color: #555;background: #fff;margin-left: 18%;">New Notification sent by <?=$sendername;?> on <?=$projectname?>
     <span style="float: right;">
       <button onclick="$('#note<?=$id?>').hide();" style="background:#e84c3d;font-size:14px; color: #fff; border: none;padding: 5px; width:50px;cursor: pointer;">Cancel</button>
       <button onclick="location.href='http://omccompliance.com/newuserviewupdate.php?cid=<?=$cid?>&pid=<?=$pid?>&timelineid=<?=$timelineid?>&note=1'" style="background:#3ab54b;font-size:14px; width:50px;color: #fff; border: none;padding: 5px;cursor: pointer;">View</button>
     </span>
    </h3>
  </div>
  
  <?php
   $updateqry="update `Notification` set `Status`=1 where `NotificationId`='$id'";
   $updateresult=$cudb->query($updateqry);
  }
  ?>
