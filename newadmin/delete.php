<?php
include("connect.php");
if (isset($_POST['submit'])) {


	$sql="DELETE FROM `GroundWaterQuality` WHERE SamplingDate='2019-08-08'";
	$res=$cudb->query($sql);
}
?>
<form action="" method="post">
	<input type="submit" name="submit" value="DELETE">
</form>