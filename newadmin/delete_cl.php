<?php 
include("connect.php");
$cid=$_POST['id'];
 $sql = "DELETE FROM clerance WHERE id=$cid"; 
 $query=$cudb->query($sql) or die(mysql_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}