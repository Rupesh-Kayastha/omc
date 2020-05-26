<?php 
include("connect.php");
$csid=$_POST['id'];
 $sql = "DELETE FROM certificates WHERE id=$csid"; 
 $query=$cudb->query($sql) or die(mysql_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}