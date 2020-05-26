<?php
  //connect to database
  include("connect.php");
  $name=$_POST["username"];
  $pass=$_POST["password"];
  $user_type=$_POST["user_type"];
  $signin=$_POST["signin"];
  $ref1=$_POST["redirect_to"];
  $ref=urldecode($ref1);

  $selquery="SELECT id,username,user_type, `password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd,designation FROM admin WHERE username='$name' AND user_type='$user_type'";
 	//$selquery="SELECT id,username,`password` FROM admin WHERE username='$name'";
  $qryresult=$cudb->query($selquery);
  $selrow=mysqli_fetch_object($qryresult);
  
	$ANAME=stripslashes($selrow->username);
 	$APSWD=stripslashes($selrow->passd);
 	$USERTYPE=stripslashes($selrow->user_type);
 $designation=stripslashes($selrow->designation);
	//session_register("designation");
		$_SESSION['designation']=$designation;
	//$APSWD=stripslashes($selrow->password);
	$AID=stripslashes($selrow->id);
	 
	if($name==$ANAME && $pass==$APSWD && $user_type=='admin')
	{
		if($signin=="on")
		{
			setcookie("adm","");
			setcookie("adm", $AID, time()+31536000);
			session_register("AdmID");
			
			$rrr=$_SESSION["AdmID"]=$AID;
		
			if($ref)
			{
				echo "<script>location.href='$ref'</script>";
			}
			else
			{
				echo "<script>location.href='dashboard.php'</script>";			
			}
		}
		else
		{
			
			setcookie("adm","");
		
			$rrr=$_SESSION["AdmID"]=$AID;
			if($ref)
			{
				echo "<script>location.href='$ref'</script>";
			}
			else
			{
				echo "<script>location.href='dashboard.php'</script>";			
			}	
		}
  	}

  	if($name==$ANAME && $pass==$APSWD && $user_type=='user')
	{
		if($signin=="on")
		{
			setcookie("usr","");
			setcookie("usr", $AID, time()+31536000);
			session_register("UsrID");
			$rrr=$_SESSION["UsrID"]=$AID;
			if($ref)
			{
				echo "<script>location.href='$ref'</script>";
			}
			else
			{
				echo "<script>location.href='userhome.php'</script>";			
			}
		}
		else
		{
			setcookie("usr","");
			//session_register("AdmID");
			$rrr=$_SESSION["UsrID"]=$AID;
			if($ref)
			{
				echo "<script>location.href='$ref'</script>";
			}
			else
			{
				echo "<script>location.href='userhome.php'</script>";			
			}	
		}
  	}
  else
  {   	 
	 if($ref)
	{
		echo "<script>location.href='index.php?pas=1&redirect_to=$ref1'</script>";
	}
	else
	{
		echo "<script>location.href='index.php?pas=1'</script>";			
	}	
  }  
?>