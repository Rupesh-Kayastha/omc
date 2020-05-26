<?php 
include("connect.php");
$pid=$_POST['id'];
 $sql = "DELETE FROM projects WHERE id=$pid"; 
 $query=$cudb->query($sql) or die(mysql_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}