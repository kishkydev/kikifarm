<?php
	$db_host = 'kikiserver2.mysql.database.azure.com';
	$db_user = 'kikiadmin';
	$db_pass = 'Incorrect9@';
	$db_name = 'kikifarm';
	$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
	echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
	}
	
?>
