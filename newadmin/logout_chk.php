<?php
$ref='http://'.$_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$ref=urlencode($ref);
//check login if you check it anywhere
if(!$_SESSION['AdmID'] && !$_COOKIE['adm'])
{
	echo "<script>location.href='index.php?redirect_to=$ref'</script>";
	exit;
}
?>