<?php   
session_start(); 
$filename120 = "wpilife_".$_SESSION['id'].".jpg"; 
//$filename48 =  "wpilife_".$_SESSION['id']."_48.jpg"; 

$somecontent1=base64_decode($_POST['png1']);   
//$somecontent2=base64_decode($_POST['png2']);  

if($handle=fopen($filename120,"w+")) 
{   
	if(!fwrite($handle,$somecontent1)==FALSE)
	{   
		fclose($handle);
	}
}  
/*
if($handle=fopen($filename48,"w+"))
{   
	if(!fwrite($handle,$somecontent2)==FALSE) 
	{   
		fclose($handle);  
	}
} 
*/
echo "success=Upload Succeed!";
?>