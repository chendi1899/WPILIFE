<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>avatar_face,avatar_test</title>
<style> 
*{line-height:30px;font-family:verdana;color:#333;}
h1,h3{margin:15px 0 5px 0;padding:0;font-size:17px;font-family:microsoft yahei;font-weight:normal;border-bottom:1px dashed #ccc;color:000;}
span{color:#f30;margin:0 4px;}
</style>
<script language="JavaScript" type="text/javascript"> 
function avatar_success()
{
	alert("Save Avatar Successfully!"); 
	top.location="http://wpilife.org/manage/user/avatarUpdate";
}
</script>
</head>
 
<body>
<embed src="face.swf" quality="high" wmode="opaque" FlashVars="defaultImg=1_120.jpg?id=<?=create_password(6)?>" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="530" height="480"></embed><br />
<?php

function create_password($pw_length = 8)
{
    $randpwd = '';
    for ($i = 0; $i < $pw_length; $i++) 
    {
        $randpwd .= chr(mt_rand(33, 126));
    }
    return $randpwd;
} 

?>
</body>
</html>

