<?php 
include("connect.php");
if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      //print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      $$var = addslashes($valu);
    }
  }

  $date = date('Y-m-d');
   echo $update_reply="INSERT INTO condition_message SET ctid=$ctid1, user_id='$user_id1', m_type='$m_type1', tag_user='$tag_user1', m_content='$action_content1', submit_date='$date'";
   die();  
  $upres=$cudb->query($update_reply) or die(mysqli_error());
  $tagusermobile=$tag_user1;
  $taguserexpmob = explode(',', $tagusermobile);
  $mob=array();
  foreach ($variable as $taguserexpmob) {
    $mob[]=GetName('admin','phone','id', $value);
  }
  $sendsmsmob=implode(',', $mob);
//for sms intigration
$mobilenos=GetName('clerance','mobileno','id',$rcid);
$clrns=GetName('clerance','c_name','id',$rcid1);
$prj=GetName('projects','p_name','id',$rpid1);
$prjnumber=GetName('projects','phone','id',$rpid1);
$usrreply=GetName('admin','username','id',$_SESSION["UsrID"]);
$allmobileno=$sendsmsmob;
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
$sender = "OMCCOM"; //Your senderid
$username = urlencode($username);
$password = urlencode($password);
$sender = urlencode($sender);
$messagecontent = $msgcontent; //Type Of Your Message
$message = urlencode($messagecontent);
//$url="http://smsodisha.in/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
$url="http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=$username&password=$password&msisdn=$contactno&sid=$sender&msg=$message&fl=0&gwid=2";
$response = curl($url);
print_r($response);

if($upres)
{
  echo "1";
}
else
{
  echo "0";
}
