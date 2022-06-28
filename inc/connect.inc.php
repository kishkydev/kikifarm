<?php
	$db_host = 'kikifarmdbserver.mysql.database.azure.com';
	$db_user = 'kiki';
	$db_pass = '4h5MbZsfrS9ixup';
	$db_name = 'kiki';
	$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
	echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
	}
	
?>
