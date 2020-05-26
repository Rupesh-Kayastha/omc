<?php 
include("connect.php");
$ccid=$_POST['id'];
 $sql = "DELETE FROM EnviornmentalManagement WHERE EnvManagementId=$ccid"; 
 $query=$cudb->query($sql) or die(mysql_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}
