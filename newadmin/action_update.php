<?php 
include("connect.php");
if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      $$var = addslashes($valu);
    }
  }
      // if (isset($_REQUEST['submit']))
      // {
  $tag_users=implode(',',$_REQUEST['tag_user']);
  $date = date('Y-m-d H:i:s');
  $target_dir = "uploads/docupload/";
  $target_file = $target_dir . basename($_FILES["docupload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if (move_uploaded_file($_FILES["docupload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["File"]["name"]). " has been uploaded.";
   } else {
        echo "Sorry, there was an error uploading your file.";
   }
   $docupload=basename( $_FILES["docupload"]["name"]); // used to store the filename in a variable
  $update_reply="INSERT INTO condition_message SET ctid=$ctid, user_id='$user_id', m_type='$m_type', docupload='$docupload', tag_user='$tag_users', m_content='$action_content'";
  $upres=$cudb->query($update_reply) or die(mysqli_error());
  $tagusermobile=implode(',',$_REQUEST['tag_user']);
  $taguserexpmob = explode(',', $tagusermobile);
  $mob=array();
  $last_id = mysqli_insert_id($cudb);
  
   $doc='';
  $target_dir = "uploads/docupload/";
  foreach($_FILES["docupload"]["name"] as $k=>$v)
  {
       //echo $v;
       $target_file = $target_dir .time().basename($_FILES["docupload"]["name"][$k]);
       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
       if (move_uploaded_file($_FILES["docupload"]["tmp_name"][$k], $target_file))
       {
            $docupload=time().basename( $_FILES["docupload"]["name"][$k]);
       }
       else
       {
           $docupload='';
       }
     
       $uploadfiles=$cudb->query("INSERT INTO `DocumentUpload` SET `ConditionMessageId`='$last_id', `Document`='$docupload',`OnDate`='$date'");
  }
// }
  
  if($m_type=='suggestion')
  {
   $type=0;
  }
  else if($m_type=='remark')
  {
   $type=1;
  }
  else
  {
   $type=2;
  }

  $notification=urlencode($action_content);
 
  foreach ($taguserexpmob as $value)
  {
    $mob[]=GetName('admin','phone','id', $value);
    $insertnote="INSERT INTO Notification SET SendById=$user_id, SendToId='$value', Type='$type', ProjectId='$rpid', ClearanceId='$rcid',TimelineId='$ctid',OnDate='$date',Notification='$notification'";
    $addnote=$cudb->query($insertnote);
  }
  $sendsmsmob=implode(',', $mob);
//for sms intigration
$mobilenos=GetName('clerance','mobileno','id',$rcid);
$clrns=GetName('clerance','c_name','id',$rcid);
$prj=GetName('projects','p_name','id',$rpid);
$prjnumber=GetName('projects','phone','id',$rpid);
$usrreply=GetName('admin','username','id',$_SESSION["UsrID"]);
$allmobileno=$sendsmsmob;
//$msgcontent="A New Reply To ".$clrns." by User ".$usrreply." for the project ".$prj."";
$msgcontent="A New Update is available for  ".$clrns." by User ".$usrreply." for the project ".$prj."";
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
$username = "krititech"; //your username
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
