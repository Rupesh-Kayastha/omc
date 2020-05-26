<?php
// Turn off all error reporting
error_reporting(1);
//ini_set('display_errors', '1');
if($_SERVER['SERVER_NAME']=='localhost')
{
	$dbhost="localhost"; //define host name
	$dbuser="root"; // define user name
	$dbpass=""; // define db pass
	$dbname="newadmin"; //define databse name
	//mysqli connection extension	
}
else
{
	$dbhost="localhost"; //define host name
	$dbuser="pms"; // define user name
	$dbpass="Pms@2705"; // define db pass
	$dbname="newadmin"; //define databse name
	//mysqli connection extension	
}
	
$cudb = new mysqli($dbhost,$dbuser,$dbpass,$dbname); 
if (mysqli_connect_error()) {
    echo "<h1><h1>Error establishing a database connection</h1>";
	exit();
	}
//echo mysqli_get_host_info($cudb);
  $addres='http://'.$_SERVER['SERVER_NAME'].'/';
  $imagepath='http://'.$_SERVER['SERVER_NAME'].'/images/';
  $stylepath='http://'.$_SERVER['SERVER_NAME'].'/css/';
  $jspath='http://'.$_SERVER['SERVER_NAME'].'/js/';
  $ajspath='http://'.$_SERVER['SERVER_NAME'].'/js/';
  $paneladrs='http://'.$_SERVER['SERVER_NAME'].'/';
  $aimagepath='http://'.$_SERVER['SERVER_NAME'].'/images/';
  $paneladrs1='http://'.$_SERVER['SERVER_NAME'].'/';
$uquery="SELECT * FROM user_ment where status=0";
$uresult=$cudb->query($uquery);
$urow=mysqli_fetch_object($uresult);
$expdate=$urow->time;
$OldDate = strtotime($expdate);
$now = time(); // or your date as well

$diff = $OldDate-$now;
$diff =ceil($diff/86400);
if ($diff>0)
{
$op=1/$diff;
}
else
{
$op=1;
}
//echo '<div style="position:absolute;z-index:10 ; width:'.($op*100).'%; height:'.($op*100).'%"><img src="uploads/npay.png" style=" display:block;margin-left: auto;margin-right: auto; width:40%;opacity:'.$op.';"/></div>';
	
?>
