<?php 
include("connect.php");

$sqlcl="SELECT * FROM clerance_list WHERE p1 IS NOT NULL";
$querycl=$cudb->query($sqlcl) or die(mysqli_error());
function curl($url)
	{
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	 $data = curl_exec($ch);
	 curl_close($ch);
	 return $data;
	}
while ($rowcl=mysqli_fetch_object($querycl))
{
	$allusers=explode(',', $rowcl->p1);
	$clname=GetName('clerance','c_name','id', $rowcl->cid);
	$prjname=GetName('projects','p_name','id', $rowcl->pid);
	$mobilelist=array();
	foreach ($allusers as $listofmobiles) {
		$mobilelist[]=GetName('admin','phone','id', $listofmobiles);
	}
	$sendsmsmob=implode(',', $mobilelist);

	$selectstatus="SELECT * FROM condition_message WHERE ctid=$rowcl->id";
	$querystatus=$cudb->query($selectstatus) or die(mysqli_error());
	$rowstatus= mysqli_fetch_object($querystatus);
	$numrows=mysqli_num_rows($querystatus);
	$status=$rowstatus->complied;
	if($status != "Complied" || $numrows==0)
	   {
	 $msgcontent="You have new notification of the condition Serial No ".$rowcl->id." for the project name ".$prjname." and clerance ".$clname." is Pending.";
	
	$mobile = $sendsmsmob; //enter Mobile numbers comma seperated
	$username = "krititech"; //your username
	$password = "kriti@2705"; //your password
	$sender = "KSALES"; //Your senderid
	$username = urlencode($username);
	$password = urlencode($password);
	$sender = urlencode($sender);
	$messagecontent = $msgcontent; //Type Of Your Message
	$message = urlencode($messagecontent);
	$url="http://smsodisha.in/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
	$response = curl($url);

	   }
}
?>