<?php
include("connect.php");
include("logout_chk.php");
$date = date('Y-m-d'); 
$checkid = $_POST['item_id'];
$uid = $_POST['uid'];
$pid = $_POST['pid'];
if ($_POST['setperm']=='addperm') {
		$result = "SELECT * FROM user_set_permission WHERE pid=$pid AND uid=$uid";
		$qryresultpost=$cudb->query($result);
		$count=mysqli_num_rows($qryresultpost);
		if($count==1)
		{
			$updatepermision="UPDATE  user_set_permission SET pid=$pid, uid=$uid, edit=$checkid WHERE pid=$pid AND uid=$uid";
		$qrylike=$cudb->query($updatepermision);	
		exit();

		}
		else
		{
			$insertperm="INSERT INTO user_set_permission SET pid=$pid, uid=$uid, edit=$checkid";
		$qrylike=$cudb->query($insertperm);	
		exit();

		}	
	}

	$response = array("uid" => $uid, "pid" => $pid);
	echo json_encode($response);


?>