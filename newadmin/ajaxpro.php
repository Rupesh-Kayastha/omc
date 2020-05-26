 <?php 
include("connect.php");
$pid=$_GET['id'];
 $sql = "SELECT * FROM clerance WHERE pid=$pid"; 
   $query=$cudb->query($sql) or die(mysql_error());


   $json = [];
  while($row = $query->fetch_assoc()){
        $json[$row['id']] = $row['c_name'];
   
   }


   echo json_encode($json);