<?php 
include("connect.php");
$lid=$_POST['id'];
 $sql = "DELETE FROM location WHERE id=$lid"; 
 $query=$cudb->query($sql) or die(mysql_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}