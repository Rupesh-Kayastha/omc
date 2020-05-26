<?php 
include("connect.php");
$uid=$_POST['id'];
 $sql = "DELETE FROM admin WHERE id=$uid"; 
 $query=$cudb->query($sql) or die(mysqli_error());
  if(isset($query)) {
   echo "YES";
} else {
   echo "NO";
}