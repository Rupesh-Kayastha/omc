<?php
  include('connect.php');
  session_start();
  unset($_SESSION['AdmID']);
  $AdmID="";
  session_destroy();
  echo "<script>location.href='index.php?log=out'</script>";
?>