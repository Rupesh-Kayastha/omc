<?php
if($_SESSION['AdmID'])
{
	echo "<script>location.href='home.php'</script>";
	exit;
}
elseif($_SESSION['UsrID'])
{
	echo "<script>location.href='userhome.php'</script>";
	exit;

}
elseif($_COOKIE['adm'] && !$log)
{
	$cokid=$_COOKIE['adm'];
	session_register("AdmID");
	$rrr=$_SESSION["AdmID"]=$cokid;
	echo "<script>location.href='home.php'</script>";
}
else
{
	
}
?>