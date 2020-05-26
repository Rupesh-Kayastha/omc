<?php 
include("connect.php");
if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      // $$var = addslashes($valu);
    }
  }
      // if (isset($_REQUEST['submit']))
      // {
  // ini_set('display_errors',1);
  // error_reporting(E_ALL);
  
   $date = date('Y-m-d');
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
   echo $update_reply="INSERT INTO condition_message SET complied='$complied_r', user_id='$r_user_id', ctid='$ctid', timeline='$timeline_r',docupload='$docupload', responsibility='$responsibility_r', s_remark='$s_remark'";  
	$upres=$cudb->query($update_reply) or die(mysqli_error());
 
 
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
 
//for sms intigration
$mobilenos=GetName('clerance','mobileno','id',$rcid);
$clrns=GetName('clerance','c_name','id',$rcid);
$prj=GetName('projects','p_name','id',$rpid);
$prjnumber=GetName('projects','phone','id',$rpid);
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
