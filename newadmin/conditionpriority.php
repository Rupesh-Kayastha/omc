<?php
include("connect.php");
$slvalue=$_GET['slvalue'];

$expl=explode(',',$slvalue);
        foreach($expl as $key=>$value)
        {
            $val=1;
            $vall=$key+$val;
            
            $sql="update clerance_list set `Priority`=$vall where id=$value";
            $query=$cudb->query($sql) or die(mysqli_error());
        }
        
        $rest=1;
        echo json_encode($rest);
?>