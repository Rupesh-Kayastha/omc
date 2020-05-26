<?php
  include("connect.php");
  $id=$_REQUEST['id'];
  $uquery="SELECT * FROM `Notification` WHERE `NotificationId`='$id'";
  $uresult=$cudb->query($uquery);
  $numrows=mysqli_num_rows($uresult);
  if($numrows>0)
  {
    $updateqry="update `Notification` set `ViewStatus`=1 where `NotificationId`='$id'";
    $updateresult=$cudb->query($updateqry);
    echo 1;
  }
?>
