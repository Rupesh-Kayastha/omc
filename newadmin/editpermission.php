<?php
include("connect.php");
include("logout_chk.php");
$date = date('Y-m-d'); 
if ($_POST['setperm']=='addperm') {
		$checkid = $_POST['item_id'];
		$uid = $_POST['uid'];
		$pid = $_POST['pid'];

		$result = "SELECT * FROM user_restrict WHERE pid=$pid AND uid=$uid";
		$qryresultpost=$cudb->query($result);
		$count=mysqli_num_rows($qryresultpost);
		if($count==1)
		{
			echo $updatepermision="UPDATE  user_restrict SET pid=$pid, uid=$uid, restrict_edit=$checkid WHERE pid=$pid AND uid=$uid";
		$qrylike=$cudb->query($updatepermision);	
		exit();

		}
		else
		{
			$insertperm="INSERT INTO user_restrict SET pid=$pid, uid=$uid, restrict_edit=$checkid";
		$qrylike=$cudb->query($insertperm);	
		exit();

		}


		
	}
	

?>