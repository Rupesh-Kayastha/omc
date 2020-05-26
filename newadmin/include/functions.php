<?php



// Get Name from Any Table GetName(tablename,return field name,where clause, id);
//include('config.php');


function GetName($tablename,$field,$where,$id)

{
	global $cudb;
	$uquery="SELECT * FROM $tablename WHERE $where='$id'";
	$uresult=$cudb->query($uquery);

	//echo mysqli_connect_error();
	

	$urow=mysqli_fetch_object($uresult);

	$newval=stripslashes( $urow->$field);

	

	return $newval;

}
function GetNamewS($tablename,$field,$where,$id)

{
	global $cudb;
	$uquery="SELECT * FROM $tablename WHERE $where='$id'";

	$uresult=$cudb->query($uquery);

	//echo mysqli_connect_error();
	

	$urow=mysqli_fetch_object($uresult);

	$newval=$urow->$field;

	

	return $newval;

}
function Getlat()

{
$uquery="SELECT latitude,longitude FROM property ORDER BY RAND() LIMIT 0,1";
$uresult=$cudb->query($uquery);

	echo mysql_error();

	$urow=mysqli_fetch_object($uresult);

	$newval1=stripslashes($urow->latitude);
	$newval2=stripslashes($urow->longitude);
	$newval=$newval1. ' , '.$newval2;
	return $newval;

}

function GetOneRAnd($tablename,$field)

{
	global $cudb;
	$uqueryr="SELECT * FROM $tablename ORDER BY RAND() LIMIT 0,1";
	$uresult=$cudb->query($uqueryr);
	$urowr=mysqli_fetch_object($uresult);
	$newvalr=stripslashes( $urowr->$field);
	return $newvalr;
}

function GetTotal($tablename,$where,$name)

{

	$uquery="SELECT * FROM $tablename WHERE $where='$name'";

	$uresult=mysql_query($uquery);

	echo mysql_error();

	$row_total= mysql_affected_rows();	

	return $row_total;

}

function GetImg($tablename,$field,$where,$id,$ord,$nm)

{

	$uquery="SELECT * FROM $tablename WHERE $where='$id' and $ord='$nm'";

	$uresult=mysql_query($uquery);

	$urow=mysql_fetch_object($uresult);

	echo mysql_error();

	$newval=stripslashes($urow->$field);

	return $newval;

}

// Get Value in combo box from any table GetCombo(select one, tablename,value field name,display field name,where clause optional,orderby,selected value optional)



function GetCombo($display,$tablename,$fieldname,$disfieldname,$where,$orderby,$selected)

{	

	$hrquery="SELECT * FROM $tablename";

	

	if($where)

	{

		$hrquery.=" WHERE $where";

	}

	$hrquery.=" ORDER BY $orderby";

	

	$hrresult=mysql_query($hrquery);

	$hrtotalrow=mysql_affected_rows();

	

	if($display)

		$Getval="<option value=''>Select $display</option>";

	

	

	for($hr=0;$hr<$hrtotalrow;$hr++)

	{

		$hrrow=mysql_fetch_object($hrresult);

		$newval=stripslashes(ucfirst($hrrow->$disfieldname));

		$val=$hrrow->$fieldname;



		if($val==$selected)

			$sel="selected";

		else

			$sel="";

		

		$Getval.="<option value='$val' $sel>$newval</option>";

	}

	return $Getval;

}

function generateHash()

{

	$pre_hash=time().rand().$GLOBALS['REMOTE_ADDR'].microtime();



	$session_hash = md5($pre_hash);

     	$hash = substr(md5($session_hash.time()),0,16);



	return $hash;

}

function getCountry($cid="")

{	

	$cntQuery="select * from country ORDER BY name";

	$cntResult=mysql_query($cntQuery);

	if($cntResult)

	{

		while($cntRow=mysql_fetch_object($cntResult))

		{

			if($cid == $cntRow->name)

				$cntOption.="<option value='$cntRow->name' selected>$cntRow->name</option>";

			else

				$cntOption.="<option value='$cntRow->name'>$cntRow->name</option>";

		}

		return $cntOption;

	}

	else

		echo mysql_error();

}



function selchk($val,$nsel)

{

for($es=0;$es<count($nsel);$es++)

		{

			if($val==$nsel[$es])

			{

				$sel="checked";

				break;

			}

			else

			{

				$sel="";

			}

		}

	

	return $sel;

}

// Return Array of Checkbox



// GetCheckBox(tablename,valuefield,displayfield,where clause,order by,selected)



function GetCheckBox($name,$tablename,$valfield,$disfield,$where,$orderby,$selected)

{

	$fcquery="SELECT * FROM $tablename";

	

	if($where)

		$fcquery.=" WHERE $where";

	

	if($order)

		$fcquery.=" ORDER BY $orderby";

	

	$fcresult=mysql_query($fcquery);

	$fctotalrow=mysql_affected_rows();

	

	$nsel=explode(",",$selected);

	

	for($fc=0;$fc<$fctotalrow;$fc++)

	{

		$fcrow=mysql_fetch_object($fcresult);

		

		$val=$fcrow->$valfield;

		$disval=" ".ucfirst($fcrow->$disfield);

		

		for($es=0;$es<count($nsel);$es++)

		{

			if($val==$nsel[$es])

			{

				$sel="checked";

				break;

			}

			else

			{

				$sel="";

			}

		}

		

		if($fc%2==0)

			$GetVal.="</tr><tr>";

		

		$GetVal.="<td width=45%><input type=checkbox class=noborder name=$name value='$val' $sel>$disval</td>";

	}

	return $GetVal;

}



/*Code for Encryption and Decryption password*/



function encrypt($string, $key) { 

$result = ''; 

for($i=0; $i<strlen($string); $i++) { 

$char = substr($string, $i, 1); 

$keychar = substr($key, ($i % strlen($key))-1, 1); 

$char = chr(ord($char)+ord($keychar)); 

$result.=$char; 

} 



return base64_encode($result); 

} 



function decrypt($string, $key) { 

$result = ''; 

$string = base64_decode($string); 



for($i=0; $i<strlen($string); $i++) { 

$char = substr($string, $i, 1); 

$keychar = substr($key, ($i % strlen($key))-1, 1); 

$char = chr(ord($char)-ord($keychar)); 

$result.=$char; 

} 



return $result; 

} 

/*encryption Decryption cose ends here*/



/*encryption Decryption1 cose starts here*/

/** Class for encryption and decryption of the text. This is a simple class which returns the numeric encryption of the text. 

**It can be further optimised to give better encryption output. 

**Saji Nair 

**/ 

    class Encryption{ 

    var $key; 

    var $text; 

    

    function Encryption(){ 

        $this->key="JSInfowayKey"; /// key to encrypt with 

    } 

    

/**Function to encrypt the text using the key. 

** Returns numeric values for each character concatinated togather. 

**Saji Nair 

**/ 

   function encrypt(){ 

       $lenText=strlen($this->text); 

       $lenKey=strlen($this->key); 

       $str=""; 

       $j=0; 

       for($i=0;$i<$lenText;$i++,$j++){ 

           if($j==$lenKey){ 

               $j=0; 

           }    

           $val=(ord($this->text[$i])*2)+ord($this->key[$j]); 

        $str.=$val;    

       } 

       return $str; 

   } 





/**Function to encrypt the text using the key. 

** Returns the text from the encrypted numeric value. 

**Saji Nair 

**/ 

   function decrypt(){ 

   //    $this->text=explode("##",$this->text); 

   $temp=$this->text; 

   $temptext=array(); 

   $templen=strlen($temp); 

   for($i=0,$j=0;$i<$templen;$i=$i+3,$j++){ 

       $temptext[$j]=substr($this->text,$i,3); 

   } 

       $lenText=count($temptext); 

       $lenKey=strlen($this->key); 

       $str=""; 

        

       for($i=0,$j=0;$i<$lenText;$i++,$j++){ 

           if($j==$lenKey){ 

               $j=0; 

           }    

           $val=$temptext[$i]-ord($this->key[$j]); 

           $val=$val/2; 

           $str.=chr($val); 

       } 

       return $str; 

   } 

} 



/*encryption Decryption1 cose ends here*/
//Fetch Field fron table
function fetchfield($field,$table,$wfield,$id,$extra="")
{
global $cudb;	
	$sql="select $field from $table where $wfield='".mysqli_real_escape_string($cudb,$id)."' ".$extra;
	$run=$cudb->query($sql);
	if(mysqli_affected_rows($cudb)>0)
	{
		$row=mysqli_fetch_array($run);
		$output=stripslashes($row[$field]);
	}
	return $output;
}

function seoUrl($string) {
	$string = rtrim($string);
	$string = ltrim($string);
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    
    return $string;
}
function Get_Timthumb($src,$w,$h,$zc=0) {
	//$addres='http://'.$_SERVER['SERVER_NAME'].'/idx/';
	global $addres;
	if($w && $h)
	{
		return $addres.'timthumb.php?src='.$src.'&w='.$w.'&h='.$h.'&q=50&zc='.$zc;
	}
	else
	{
		if($w)
		{
			return $addres.'timthumb.php?src='.$src.'&w='.$w.'&q=50&zc='.$zc;
		}
		else
		{
			return $addres.'timthumb.php?src='.$src.'&h='.$h.'&q=50&zc='.$zc;
		}
	}
}
function Get_t($src, $w=0, $h=0) {
	//include_once('../tpic/phpThumb.config.php');
	global $addres;
	#$GLOBALS[$PHPTHUMB_CONFIG['high_security_url_separator']];
	#$GLOBALS[$PHPTHUMB_CONFIG['high_security_password']];
	global $PHPTHUMB_CONFIG;
	
	
	if($w && $h)
	{
		$ParameterString = 'src='.urlencode($src).'&w='.$w.'&h='.$h;
		$hh=md5($ParameterString.$PHPTHUMB_CONFIG['high_security_password']);
		return htmlentities($addres.'tpic/phpThumb.php?'.$ParameterString.$PHPTHUMB_CONFIG['high_security_url_separator'].'hash='.$hh, ENT_QUOTES);
	}
	else
	{
		if($w)
		{
			$ParameterString = 'src='.urlencode($src).'&w='.$w;
			$hh=md5($ParameterString.$PHPTHUMB_CONFIG['high_security_password']);
			return htmlentities($addres.'tpic/phpThumb.php?'.$ParameterString.$PHPTHUMB_CONFIG['high_security_url_separator'].'hash='.$hh, ENT_QUOTES);
			#return $PHPTHUMB_CONFIG['high_security_url_separator'];
		}
		else
		{
			$ParameterString = 'src='.urlencode($src).'&h='.$h;
			$hh=md5($ParameterString.$PHPTHUMB_CONFIG['high_security_password']);
			return htmlentities($addres.'tpic/phpThumb.php?'.$ParameterString.$PHPTHUMB_CONFIG['high_security_url_separator'].'hash='.$hh, ENT_QUOTES);
		}
	}
}
function remove_querystring_var($url, $key) { 
	$url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'); 
	$url = substr($url, 0, -1); 
	return $url; 
}

function GetCountOne($tablename) {
	$uquery="SELECT COUNT(*) AS countnum1 FROM $tablename";
	$uresult=mysql_query($uquery);
	echo mysql_error();
	$totalrowcount=mysqli_fetch_object($uresult);
	return $totalrowcount->countnum1;
}
function GetCount($tablename,$where,$name) {
	echo $uquery="SELECT COUNT(*) AS counttotal FROM $tablename WHERE $where='$name'";
	$uresult=$cudb->query($uquery);
	echo mysqli_error();
	$totalrowcount=mysqli_fetch_object($uresult);
	$totalval=stripslashes( $totalrowcount->counttotal);
	return $totalval;
}
function GetCountToday($tablename,$where2) {
	global $cudb;
	$uquery="SELECT COUNT(*) AS today FROM $tablename WHERE $where2 = CURDATE()";
	//$uresult=mysql_query($uquery);
	$uresult=$cudb->query($uquery);
	//echo mysqli_connect_error();
	//$urow=mysqli_fetch_object($uresult);
	//$newval=stripslashes( $urow->$field);
	echo mysql_error();
	$tott=mysqli_fetch_array($uresult);
	return $tott['today'];
}
function GetCountYesterday($tablename,$where1,$name1,$where2) {
	$uquery="SELECT COUNT(*) AS tomorrow FROM $tablename WHERE $where1='$name1' AND $where2 = CURDATE()-1";
	$uresult=mysql_query($uquery);
	echo mysql_error();
	$toty=mysql_fetch_array($uresult);
	return $toty['tomorrow'];
}
function GetCountb4yes($tablename,$where1,$name1,$where2) {
	$uquery="SELECT COUNT(*) AS lastall FROM $tablename WHERE $where1='$name1' AND $where2 < CURDATE()-1";
	$uresult=mysql_query($uquery);
	echo mysql_error();
	$tota=mysql_fetch_array($uresult);
	return $tota['lastall'];
}
/*function GetTotal($tablename,$where,$name)
{
	$uquery="SELECT * FROM $tablename WHERE $where='$name'";
	$uresult=mysql_query($uquery);
	echo mysql_error();
	$row_total= mysql_affected_rows();	
	return $row_total;
}
function GetImg($tablename,$field,$where,$id,$ord,$nm)
{
	$uquery="SELECT * FROM $tablename WHERE $where='$id' and $ord='$nm'";
	$uresult=mysql_query($uquery);
	$urow=mysql_fetch_object($uresult);
	echo mysql_error();
	$newval=stripslashes($urow->$field);
	return $newval;
}*/
?>