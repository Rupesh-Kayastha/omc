<?php
  include('connect.php');
  session_start();
  unset($_SESSION['UsrID']);
  $AdmID="";
  session_destroy();
  echo "<script>location.href='index.php?log=out'</script>";
?>