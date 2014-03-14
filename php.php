<?php
	$message = file_get_contents('http://wpilife.org/api/user/id/2');
	var_dump(json_decode($message));
?>